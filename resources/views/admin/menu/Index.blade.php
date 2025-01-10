@extends('admin.layouts.app')
@section('title')
 {{ $title }}
@endsection
@section('content')
 
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#tambahMenu">Tambah Menu Utama</button>
                <table id="tableMenu" class="table table-hover display" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Tanggal Di Buat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahMenu" tabindex="-1" aria-hidden="true">
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
                <form method="POST" class="form" action="{{route('menu.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-13 text-center">

                        <h1 class="mb-3">Tambah Menu Utama</h1>

                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Kategori</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Menu Utama"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Masukkan Menu Utama" 
                        name="name" id="name"/>
                        @error('name')
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
                <form action="{{ route('menu.update')}} " method="POST" class="form" >
                    @csrf
                    @method('PUT')
                     <div class="mb-13 text-center">
                    <h1 class="mb-3">Edit Menu Utama</h1>
                    </div>
                    <input type="hidden" class="form-control form-control-solid"  name="id"  id="idMenu"/>                       
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
@endsection 

@section('js')
<script>
  $(document).ready(function() {
        load_data();

        function load_data(unit = '') {
            $('#tableMenu').DataTable({
                "pageLength": 10,
                "processing": true,
                "serverside": true,
                "scrollX": true,
                "language": {
                    "processing": 'Memuat...'
                },
                "serverSide": true,
                "ajax": {
                    url: "{{route('menu.index')}}",
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

    function editMenu(id) {
      
        console.log(id);
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{ route('menu.edit') }}",
            method: "POST",
            data: {
                _token: _token,
                id: id
            },
            success: function(data) {
                console.log(data);
                var date = new Date(data.created_at);
                var formattedDate = date.toISOString().split('T')[0];
               
                $('#idMenu').val(data.id);
                // console.log($('$idCategory').val(data.id));
                $('#nameEdit').val(data.name);
              
                $('#nameCreated_at').val(formattedDate);

            },
            error: function() {}
        })
    }

    function hapusMenu(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan Menu Utama",
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
            url: "{{ route('menu.destroy') }}",
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