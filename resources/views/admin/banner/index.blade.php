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
                                <h3 class="mb-0">Banner Baru</h3>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-end">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li
                                        class="breadcrumb-item active"
                                        aria-current="page"
                                    >
                                        Banner Baru
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
                <button class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah Banner</button>
                <table id="tableBanner" class="table table-bordered display" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Gambar</th>
                            <th class="text-left">Active</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
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
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                </div>
            </div> 
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form method="POST" class="form" action="{{route('banner.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-13 text-center">

                        <h1 class="mb-3">Tambah Data Banner/h1>

                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Masukkan Gambar 820x820</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Tambah Gambar"></i>
                        </label>
                        <img id="preview" alt="" class="img-fluid mb-2" width="400px">
                        <input type="file" class="form-control form-control-solid @error('image') is-invalid @enderror" placeholder="Masukkan Nama Kategori" 
                        name="image"  id="image"/>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class=" mb-8 fv-row">
                        <label class="d-flex  fs-6 fw-bold mb-2">
                            <span class="required">Tanggal Di Buat</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Email"></i>
                        </label>
                        <input type="date" class="form-control form-control-solid @error('created_at') is-invalid @enderror" placeholder="Masukkan Nama Kategori" 
                        name="created_at"  id="created_at"/>
                       
                     
                    </div>

                   
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                </div>
            </div>

            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form action="{{ route('banner.update')}} " method="POST" class="form" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                     <div class="mb-13 text-center">
                    <h1 class="mb-3">Edit Data Banner</h1>
                    </div>
                    <input type="hidden" class="form-control form-control-solid"  name="id"  id="idBanner"/>                       
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Masukkan Gambar 820x820</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Tambah Gambar"></i>
                        </label>
                        <img id="Imgpreview"  alt="" class="img-fluid mb-2" width="400px">
                        <input type="file" class="form-control form-control-solid" placeholder="Masukkan Nama Kategori" 
                        name="image"  id="imageEdit"/>
                    </div>
                    <div class=" mb-8 fv-row">
                        <label class="d-flex  fs-6 fw-bold mb-2">
                            <span class="required">Tanggal Di Buat</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Email"></i>
                        </label>
                        <input type="date" class="form-control form-control-solid"
                        name="created_at"  id="nameCreated_at"/>
                       
                     
                    </div>
                 
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit
                        </button>
                    </div>
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
            $('#tableBanner').DataTable({
                "pageLength": 10,
                "processing": true,
                "serverside": true,
                "scrollX": true,
                "language": {
                    "processing": 'Memuat...'
                },
                "serverSide": true,
                "ajax": {
                    url: "{{route('banner.index')}}",
                    data: {
                        unit: unit,
                    }
                },
                "columns": [{
                        "data": "DT_RowIndex",
                        "orderable": false,
                        "searchable": false
                    },
                    {
                        "data": "image"
                    },
                    {
                        "data": "active"
                    },
                   
                    {
                        "data": "aksi",
                        "orderable": false,
                        "searchable": false
                    },
                ],
                "bAutoWidth": false,
                "columnDefs": [{
                    targets: [0, 1, 2, 3],
                    className: 'text-center'
                }],
                "bDestroy": true,
            });
        }

    });

    function editBanner(id) {
      
        console.log(id);
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{ route('banner.edit') }}",
            method: "POST",
            data: {
                _token: _token,
                id: id
            },
            success: function(data) {
                console.log(data);
                var date = new Date(data.created_at);
                var formattedDate = date.toISOString().split('T')[0];
                 $('#idBanner').val(data.id);
                 $('#imageEdit').val(data.image);
                 $('#Imgpreview').attr('src', '/storage/' + data.image);
                 $('#nameCreated_at').val(formattedDate);
            },
            error: function(e) {
                console.log('Error:', e);
            }
        })
    }

    function hapusBanner(id) {
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
            url: "{{ route('banner.destroy') }}",
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



    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#Imgpreview').attr('src', e.target.result);
                $('#Imgpreview').show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageEdit").change(function() {
        readURL(this);
    });
</script>
@endsection