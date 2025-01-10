@extends('admin.layouts.app')
@section('title')
{{ $title }}
@endsection
@section('content')
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Informasi Publik</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Informasi Publik
                    </li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal"
                            data-bs-target="#tambahUser">Tambah Informasi Publik</button>
                        <table id="tableInformasi" class="table table-bordered display" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Title</th>
                                    <th class="text-left">Kategori File</th>

                                    <th class="text-left">Dokumen</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokumen as $key)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->title }}</td>

                                    <td><a href="{{ $key->dokumen ? asset('storage/' . $key->dokumen) : $key->link }}"
                                            class="text-decoration-none">
                                            lihat
                                        </a>
                                    </td>
                                    <td class="d-flex">
                                        <button onclick="konfirmasiEdit({{ $key->id }})"
                                            class="btn waves-effect waves-light btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i></button>
                                        <button onclick="hapusInformasi({{ $key->id }})"
                                            class="btn waves-effect waves-light btn-danger btn-sm">
                                            <i class="bi bi-trash"></i></button>


                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambahUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" style="margin-width: 750px;">
                <div class="modal-content rounded">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                        fill="#000000">
                                        <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                        <rect fill="#000000" opacity="0.5"
                                            transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                            x="0" y="7" width="16" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <form action="{{ route('informasi_publik.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-13 text-center">
                                <h1 class="mb-3">New Informasi Publik</h1>
                            </div>

                            <div class="form-group">
                                <label for="title">Judul Dokumen:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="body">Kategori File:</label>
                                <select class="form-control" aria-label="Default select example" name="id_file">
                                    <option selected disabled>Pilih Kategori File</option>
                                    @foreach ($kategoriFile as $key)
                                    <option value="{{ $key->id }}">{{ $key->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="body">Dokumen</label>
                                <span>Upload </span>
                                <input type="file" name="dokumen" id="dokumen"
                                    class="form-control {{ $errors->has('dokumen') ? 'is-invalid' : '' }}">
                                @if ($errors->has('dokumen'))
                                <div class="invalid-feedback text-danger">
                                    {{ $errors->first('dokumen') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label for="title">Upload </label>
                                <span>contoh Upload Link : https://kominfo.sulselprov.go.id/</span>
                                <input type="text" name="link" class="form-control" id="link">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editInformasiPublik" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered mw-650px">
                <div class="modal-content rounded">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                        fill="#000000">
                                        <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                        <rect fill="#000000" opacity="0.5"
                                            transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                            x="0" y="7" width="16" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <form action="{{ route('informasi_publik.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="idInformasi">
                            <div class="mb-13 text-center">
                                <h1 class="mb-3">New Edit Informasi Publik</h1>
                            </div>

                            <div class="form-group">
                                <label for="nameEdit">Judul Dokumen:</label>
                                <input type="text" name="name" id="nameEdit" class="form-control"
                                   >
                            </div>
                            <div class="form-group">
                                <label for="body">Kategori File:</label>
                                <select class="form-control" aria-label="Default select example" name="id_file"
                                    id="idFileEdit">
                                    {{-- <option selected disabled>Pilih Kategori File</option> --}}
                                    @foreach ($kategoriFile as $key)
                                    <option value="{{ $key->id }}">{{ $key->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                  <a href="" id="dokumenLama">Lihat Dokumen Lama</a>
                                <label for="body">Dokumen</label>
                                <span>Upload </span>
                                <input type="file" name="dokumen" id="dokumenEdit"
                                    class="form-control {{ $errors->has('dokumen') ? 'is-invalid' : '' }}">
                                @if ($errors->has('dokumen'))
                                <div class="invalid-feedback text-danger">
                                    {{ $errors->first('dokumen') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Upload </label>
                                <span>contoh Upload Link : https://kominfo.sulselprov.go.id/</span>
                              
                                <input type="text" name="link" class="form-control" id="linkEdit"
                                    >
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->
        <!--begin::Row-->

        <!-- /.row (main row) -->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->
@endsection

@section('js')
<script>
    $(document).ready(function() {
            load_data();

            function load_data(unit = '') {
                $('#tableInformasi').DataTable({
                    "pageLength": 10,
                    "processing": true,
                });
            }

        });

        function konfirmasiEdit(id) {
            Swal.fire({
                title: 'Edit Data?',
                text: "Anda akan Edit data Ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    editInformasi(id);
                }
            })
        }

        function editInformasi(id) {

            console.log(id);
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('informasi_publik.edit') }}",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    console.log(data);
 
                    $('#idInformasi').val(data.id);
                    $('#nameEdit').val(data.name);
                    $('#linkEdit').val(data.link);
                    $('#idFileEdit option').filter(function() {
                        return $(this).text() === data.title;
                    }).prop('selected', true);
                    $('#dokumenLama').attr('href', '/storage/' + data.dokumen);
                    // $('#dokumenEdit').val(data.dokumen);

                        $('#editInformasiPublik').modal('show');

                   
                },
                error: function(e) {
                    console.log('Error:', e);
                }
            })
        }



        function hapusInformasi(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus Banner",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    hapus(id);
                }
            })
        }

        function hapus(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('informasi_publik.destroy') }}",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Mohon Tunggu',
                        icon: 'warning',
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: 'Success',
                        text: data.message,
                        icon: 'success',
                    });
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                },
                error: function() {}
            })
        }
</script>
@endsection