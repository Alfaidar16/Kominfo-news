@extends('guest.layouts.Guest')
@section('title', ucfirst('Formulir Permohonan Informasi'))
@section('content')
    <section class="page-header bg-grey" style="background-image: url('/Diskominfo/template/assets/img/bg-img/footer-bg.jpg')" >
        <div class="shapes">
            <div class="shape shape-1"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-1.png"
                    alt=""></div>
            <div class="shape shape-2"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-2.png"
                    alt=""></div>
            <div class="shape shape-3"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-3.png"
                    alt=""></div>
        </div>
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-header-content" style="justify-content: center;">
                        <h1 class="text-white">Permohonan Informasi</h1>
                        <h4 class="sub-title text-white"><a href="index.html">Home </a><a href="#" class="inner-page">
                                > Permohonan Informasi</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-section pt-100 pb-100">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h4 class="sub-heading">Formulir Permohonan Informasi </h4>
                <h2 class="section-title">isi dan lengkapi formulir dibawah ini</h2>
            </div>

        </div>
        <div class="container">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="card p-3">
                    <form action="{{ route('Permohonan.informasi.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{-- @csrf --}}
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control p-3" id="nama" name="nama_permohonan"
                                        placeholder="Masukkan Nama" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="number" class="form-control p-3" id="no_hp" name="no_hp"
                                        placeholder="Masukkan Nomor Hp" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_ktp">Nomor KTP</label>
                                    <input type="number" class="form-control p-3" id="no_ktp" name="no_ktp"
                                        placeholder="Masukkan Nomor KTP" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input type="email" name="email" placeholder="Masukkan Email"
                                        class="form-control p-3" id="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="foto_ktp">Upload Foto Ktp</label>
                                    <input type="file" class="form-control p-3" name="foto_ktp" id="foto_ktp" required>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-3">
                                            <label for="nomor_pengesahan">nomor pengesahan (badan hukum)</label>
                                            <input type="text" class="form-control p-3" name="nomor_pengesahan"
                                                placeholder="Masukkan Nomor Pengesahan" id="nomor_pengesahan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Rincian Informasi Yang Di Butuhkan</label>
                                    <textarea class="form-control p-3" name="rincian_informasi" placeholder="Rincian Informasi Yang Di Butuhkan"
                                        id="rincian_informasi" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control p-3" name="alamat" placeholder="Masukkan Alamat" id="alamat" rows="3"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control p-3" id="pekerjaan"
                                                name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Tujuan Permohonan Informasi</label>
                                    <textarea class="form-control p-3" name="tujuan_permohonan" placeholder="Tujuan Permohonan Informasi"
                                        id="tujuan_permohonan" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row float-end">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary p-3">Kirim Permohonan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>


    {{-- @include('Html.Footer') --}}
@endsection
@section('js')
    <script>
        $('#search').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $("#informasiRegulasi tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
@endsection
