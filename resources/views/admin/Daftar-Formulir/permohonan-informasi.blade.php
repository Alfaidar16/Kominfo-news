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
                    <h3 class="mb-0">Daftar Permohonan Informasi</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar Permohonan Informasi
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
                            {{-- <button class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal"
                                data-bs-target="#tambahUser">Tambah Banner</button> --}}
                            <table id="tablePermohonan" class="table table-bordered display" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Nama</th>
                                        <th>No Ktp</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No Pengesahan</th>
                                        <th class="text-center">Rincian Informasi</th>
                                        <th class="text-center">Tujuan Permohonan</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Pekerjaan</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permohonanInformasi as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->nama_permohonan }}</td>
                                            <td>{{ $d->no_ktp }}</td>
                                            <td>
                                                {{ $d->email }}
                                            </td>
                                            <td>{{ $d->nomor_pengesahan }}</td>
                                            <td>{{ $d->rincian_informasi }}</td>
                                            <td>{{ $d->tujuan_permohonan }}</td>
                                            <td>{{ $d->alamat }}</td>
                                            <td>{{ $d->pekerjaan }}</td>
                                            <td>
                                                @if ($d->status == 0)
                                                    <div style="display: flex;">
                                                       
                                                            <button type="button" class="btn btn-warning btn-sm mx-3"
                                                                onclick="Verifikasi({{ $d->id }})">Belum
                                                                Disetujui</button>
                                                      
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="TolakPermohonan({{ $d->id }})">Tolak</button>
                                                      
                                                    </div>
                                                @elseif($d->status == 1)
                                                    <a href="#" class="btn btn-success"
                                                        style="text-decoration: none;">Disetujui</a>
                                                @elseif($d->status == 2)
                                                    <a href="#" class="btn btn-danger"
                                                        style="text-decoration: none;">Di Tolak</a>
                                                @endif



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
                $('#tablePermohonan').DataTable({
                    "pageLength": 10,
                    "processing": true,
                });
            }

        });

          function Verifikasi(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan Menyetujui Permohonan Ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    setuju(id);
                }
            })
        }

        function setuju(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('permohonan.isSetuju') }}",
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


          function TolakPermohonan(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan Menolak Permohonan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    tolak(id);
                }
            })
        }

        function tolak(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('permohonan.isTolak') }}",
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
