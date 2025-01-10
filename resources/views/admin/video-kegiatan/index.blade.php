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
                    <h3 class="mb-0">Video Kegiatan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Video Kegiatan
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
                                data-bs-target="#tambahVideo">Tambah Video Kegiatan</button>
                            <table id="tableVideo" class="table table-bordered display" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-left">Judul</th>
                                        <th class="text-left">Video</th>
                                        <th class="text-left">Link</th>
                                        <th class="text-left">Tanggal Di Buat</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $key->judul }}</td>
                                            <td>
                                                @if (!empty($key->video))
                                                    <iframe src="{{ asset('video-kegiatan/' . $key->video) }}" target="_blank"
                                                        title="Lihat Video" style="width: 100px;">
                                                    </iframe> <br> <a href="{{ asset('video-kegiatan/' . $key->video) }}"
                                                        target="_blank" title="Lihat Video">
                                                        Download
                                                    </a>
                                                @else
                                                    <i>Video Tidak Ada</i>
                                                @endif

                                            </td>
                                            <td>
                                                @if (!empty($key->link))
                                                <iframe width="560" height="315" src="{{ $key->link }}"" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                    {{-- <iframe src="{{ $key->link }}" target="_blank" title="Lihat Video"
                                                        style="width: 100px;"> --}}
                                                    </iframe> <br> <a href="{{ $key->link }}" target="_blank"
                                                        title="Lihat Video">
                                                        Lihat Video
                                                    </a>
                                                @else
                                                    <i>Link Tidak Ada</i>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($key->created_at)) }}</td>
                                            <td class="d-flex justify-content-center mt-5">
                                                <button onclick="konfirmasiEdit({{ $key->id }})"
                                                    class="btn waves-effect waves-light btn-warning mx-3 ">
                                                    <i class="bi bi-pencil-square"></i></button>
                                                <button onclick="hapusVideo({{ $key->id }})"
                                                    class="btn waves-effect waves-light btn-danger">
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
       

            <!--end::Row-->
            {{-- Modal Video Tambah --}}
             <div class="modal fade" id="tambahVideo" tabindex="-1" aria-hidden="true">
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
                            <form action="{{ route('video_kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">New Video Kegiatan</h1>
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul Video: <code>* Wajib Di Isi</code></label>
                                    <input type="text" name="judul"
                                        class="form-control @error('judul') is-invalid
                                            
                                        @enderror">
                                    @error('judul')
                                          <div class="invalid-feedback text-danger">
                                            {{ $messsage }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="link">Link Sosmed Video <code>* Optional</code></label>
                                    <input type="text" name="link" id="link" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="body">Upload Dokumen Video: <code>* Optional</code></label>
                                    <input type="file" name="video" id="video" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Row-->
            {{-- Modal Edit --}}
              <div class="modal fade" id="editVideo" tabindex="-1" aria-hidden="true">
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
                            <form action="{{ route('video_kegiatan.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="idVideo">
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">New Video Kegiatan</h1>
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul Video: <code>* Wajib Di Isi</code></label>
                                    <input type="text" name="judul" id="judulEdit"
                                        class="form-control @error('judul') is-invalid
                                            
                                        @enderror">
                                    @error('judul')
                                          <div class="invalid-feedback text-danger">
                                            {{ $messsage }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="link">Link Sosmed Video <code>* Optional</code></label>
                                    <input type="text" name="link" id="linkEdit" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                   
                                    <label for="body">Upload Dokumen Video: <code>* Optional</code></label>
                                    <input type="file" name="video" id="video" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                $('#tableVideo').DataTable({
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
                    editVideo(id);
                }
            })
        }

        function editVideo(id) {

            console.log(id);
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('video_kegiatan.edit') }}",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    console.log(data);

                    $('#idVideo').val(data.id);
                    $('#judulEdit').val(data.judul);
                    $('#linkEdit').val(data.link);
                    $('#editVideo').modal('show');
                },
                error: function(e) {
                    console.log('Error:', e);
                }
            })
        }



        function hapusVideo(id) {
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
                url: "{{ route('video_kegiatan.destroy') }}",
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
