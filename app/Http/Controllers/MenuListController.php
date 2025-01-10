<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MenuList;
use App\Models\Menu;

class MenuListController extends Controller
{
    public function index()
    {

        // $data = DB::table('menu_items')->get();
        $data = Menu::with(['details' => function ($query) {
            $query->where('is_active', 1); // Pastikan untuk menyertakan foreign key 'menu_id'
        }])->orderBy('id', 'ASC')->get();
        $menu = DB::table('menus')->get();
        $title = 'Halaman Menu List';
        return view('admin.menuList.index', compact('data', 'title', 'menu'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'menu_id' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'url' => $request->url,
            'icon' => $request->icon,
            'menu_id' => $request->menu_id,
        ];
        // dd($data);
        MenuList::create($data);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }
}
