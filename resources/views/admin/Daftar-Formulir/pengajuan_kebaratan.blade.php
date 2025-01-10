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
                                        <th>Nama</th>
                                        <th>Tujuan Permohonan</th>
                                        <th>Alamat</th>
                                        <th>Nama Kuasa Pemohon</th>
                                        <th>No Hp Kuasa Pemohon</th>
                                        <th>Pekerjaan</th>
                                        <th style="text-align: center;">Alasan Pengajuan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuanKeberatan as $d)
                                        <tr style="background-color: #f2f2f2;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->nama_permohonan }}</td>
                                            <td>{{ $d->tujuan_pemohon }}</td>
                                            <td>{{ $d->alamat }}</td>
                                            <td>{{ $d->nama_kuasa_pemohon }}</td>
                                            <td>{{ $d->no_hp_kuasa_pemohon }}</td>
                                            <td>{{ $d->pekerjaan }}</td>
                                            @php
                                                $alasanPengajuan = explode(',', $d->alasan_pengajuan);
                                            @endphp
                                            <td>
                                                @foreach ($alasanPengajuan as $alasan)
                                                    <ul>
                                                        <li>
                                                            {{ $alasan }}
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </td>
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
                url: "{{ route('pengajuan.isSetuju') }}",
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
                url: "{{ route('Pengajuan.isTolak') }}",
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
