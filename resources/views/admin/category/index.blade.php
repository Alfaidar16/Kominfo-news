@extends('admin.layouts.app')
@section('content')
  <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="mb-0">Kategori Berita</h3>
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
                                        Kategori Berita
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
                <button class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah Data Kategori</button>
                <table id="tableCategory" class="table table-bordered display" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Slug</th>
                            <th class="text-left">Tanggal Di Buat</th>
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
                <form method="POST" class="form" action="{{route('category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-13 text-center">

                        <h1 class="mb-3">Tambah Data Kategori</h1>

                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Kategori</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Kategoru"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Masukkan Nama Kategori" 
                        name="name" oninput="createSlug()" id="name"/>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Slug</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Email"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid @error('slug') is-invalid
                            
                        @enderror" placeholder="Masukkan slug" name="slug" id="slug"/>
                       @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                       @enderror
                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Tanggal di buat</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Email"></i>
                        </label>
                        <input type="date" class="form-control form-control-solid @error('created_at') is-invalid
                            
                        @enderror" placeholder="Masukkan created_at" name="created_at" id="created_at"/>
                       @error('created_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                       @enderror
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
                <form action="{{ route('category.update')}} " method="POST" class="form" >
                    @csrf
                    @method('PUT')
                     <div class="mb-13 text-center">
                    <h1 class="mb-3">Edit Data Kategori</h1>
                    </div>
                    <input type="hidden" class="form-control form-control-solid"  name="id"  id="idCategory"/>                       
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Kategori</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Kategori"></i>
                        </label>
                         <input type="text" class="form-control form-control-solid @error('name') @enderror" placeholder="Masukkan Nama Kategori" 
                        id="nameEdit" name="name" required oninput="generateSlug()" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Slug</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Slug"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Slug" id="nameSlug" name="slug" required  />
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Tanggal di buat</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Tanggal"></i>
                        </label>
                        <input type="date" class="form-control form-control-solid @error('created_at') is-invalid 
                         @enderror"  name="created_at" id="nameCreated_at"/>
                       @error('created_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                       @enderror
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
            $('#tableCategory').DataTable({
                "pageLength": 10,
                "processing": true,
                "serverside": true,
                "scrollX": true,
                "language": {
                    "processing": 'Memuat...'
                },
                "serverSide": true,
                "ajax": {
                    url: "{{route('category.index')}}",
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
                        "data": "name"
                    },
                    {
                        "data": "slug"
                    },
                    {
                        "data": "created_at"
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

    function editCategory(id) {
      
        console.log(id);
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{ route('category.edit') }}",
            method: "POST",
            data: {
                _token: _token,
                id: id
            },
            success: function(data) {
                console.log(data);
                var date = new Date(data.created_at);
                var formattedDate = date.toISOString().split('T')[0];
               
                $('#idCategory').val(data.id);
                // console.log($('$idCategory').val(data.id));
                $('#nameEdit').val(data.name);
                $('#nameSlug').val(data.slug);
                $('#nameCreated_at').val(formattedDate);

            },
            error: function() {}
        })
    }

    function hapusCategory(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan menghapus Kategori",
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
            url: "{{ route('category.destroy') }}",
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

    function generateSlug() {
    var title = document.getElementById('nameEdit').value;
    var slug = title.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')  // Remove special characters
                    .replace(/\s+/g, '-')         // Replace spaces with -
                    .replace(/-+/g, '-');         // Replace multiple - with single -
    document.getElementById('nameSlug').value = slug;
    
}

function createSlug() {
    var title = document.getElementById('name').value;
    var slug = title.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')  // Remove special characters
                    .replace(/\s+/g, '-')         // Replace spaces with -
                    .replace(/-+/g, '-');         // Replace multiple - with single -
    document.getElementById('slug').value = slug;
}
</script>
@endsection