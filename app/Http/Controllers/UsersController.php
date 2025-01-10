<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        // $data = User::orderBy('id', 'DESC')->get();
        // dd($data);
        if ($request->ajax()) {
            $data = User::orderBy('id', 'DESC')->get();
            // if ($request->has('unit') && !empty($request->unit)) {
            //     $data->where('unit', $request->unit);
            // }

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('role', function ($data) {
                    return '<button class="badge badge-primary bg-primary border-0">' . $data->roles->pluck('name')->first() . '</button>';
                })
                ->editColumn('aksi', function ($data) {
                    $actionButton = '
                   <div class="text-center">
                   <button data-bs-toggle="modal" data-bs-target="#editUser" onclick="editData(&quot;' . $data->id . '&quot;)" class="btn waves-effect waves-light btn-warning btn-sm">
                   <i class="bi bi-pencil-square"></i>
              </button>
               <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="alertHapus(&quot;' . $data->id . '&quot;)">
                   <i class="bi bi-trash"></i>
              </button>
                   </div>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }

        $title = 'User Management';
        return view('admin.user.index', compact('title'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'password' => 'required|string|min:8',
            'role' => 'required'
        ]);
        try {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->assignRole($request->role);

            $data->save();
            Alert::success('Success', 'Tambah User Berhasil');
            return redirect()->route('user.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error('Error', 'Tambah User Gagal');
            return redirect()->back();
        }
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $data = User::findOrFail($id);

        return response()->json($data, 200);
    }


    public function update(Request $request)
    {

        $id = $request->id;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
            'role' => 'nullable'
        ]);
        try {
            $data = User::findOrFail($id);
            $data->name = $request->name;
            $data->email = $request->email;
            if ($request->password) {
                $data->password = bcrypt($request->password);
            }

            // dd($data);
            // $data->assignRole($request->role);
            $data->save();
            Alert::success('success', 'Ubah User Berhasil');
            return redirect()->route('user.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error('Error', 'Ubah User Gagal');
            return redirect()->back();
        }
    }


    public function destroy(Request $request)
    {
        $id = $request->id;

        try {
            $data = User::findOrFail($id)->delete();
            DB::commit();
            if ($data) {
                return response()->json(['message' => 'User Berhasil Di Hapus'], 200);
            } else {
                return response()->json(['message' => 'Error'], 200);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back();
        }
    }
}
