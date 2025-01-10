@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
<style>
     input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0;
  }
</style>
@endsection
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Sambutan Kepala Dinas</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Sambutan Kepala Dinas
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
    <form id="kt_project_settings_form" class="form" action="{{route('sambutan.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id" value="{{ $data->id }}">
        <div class="card-body p-9">
            <div class="row mb-5">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Image</div>
                </div>
                <div class="col-lg-2">
                    <img src="{{asset('uploads/foto_pimpinan/'. $data->foto_kepala)}}" class="img-fluid" width="100px">
                </div>
                <div class="col-lg-6">
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/avatars/blank.png')">
                        <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('assets/media/svg/brand-logos/volicity-9.svg')"></div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <input type="file" name="foto_kepala" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                        </label>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                    </div>
                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Nama Lengkap</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" value="{{$data->nama_kepala}}" name="nama_kepala" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Jabatan</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" value="{{$data->jabatan_kepala}}" name="jabatan_kepala" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Sambutan </div>
                </div>
                <div class="col-xl-9 fv-row">
                    <textarea name="sambutan" class="form-control form-control-solid h-100px">{{$data->sambutan}}</textarea>
                </div>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Reset</button>
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Submit</button>
        </div>
    </form>
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
