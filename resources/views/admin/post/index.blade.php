@extends('admin.layouts.app')
@section('content')
  <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="mb-0">Post</h3>
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
                                        Post
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
                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm mb-5">New Post Berita</a>
                <table id="tableUsers" class="table table-bordered display" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Judul</th>
                            <th class="text-left">Image</th>
                            <th class="text-left">Status</th>
                            <th class="text-center">Tanggal Di Buat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                </table>
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
            $('#tableUsers').DataTable({
                "pageLength": 10,
                "processing": true,
                "serverside": true,
                "scrollX": true,
                "language": {
                    "processing": 'Memuat...'
                },
                "serverSide": true,
                "ajax": {
                    url: "{{route('post.index')}}",
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
                        "data": "title"
                    },
                    {
                        "data": "image"
                    },
                    {
                        "data": "status"
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
                    targets: [0, 1, 2, 3, 4],
                    className: 'text-center'
                }],
                "bDestroy": true,
            });
        }

    });

 

    function alertHapus(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan menghapus User",
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
            url: "{{ route('post.destroy' ) }}",
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