@extends('admin.layouts.app')
@section('content')
  <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="mb-0">Menu List</h3>
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
                                        Menu List
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
        <div class="col-lg-6">
            <div class="card p-2">
                <div class="card-header">
                    <h3>Tambah Menu</h3>
                </div>
                <hr>
                <div class="card-body">
                    <form action="{{ route('menuList.store') }}" method="Post">
                        @csrf
                        <div class="form-group my-2">
                            <label class="mb-2" for="exampleFormControlInput1">Judul Menu</label>
                            <input type="text" class="form-control" name="title" id="url"
                                placeholder="Masukkan Judul Menu">
                        </div>
                        <div class="form-group my-2">
                            <label class="mb-2" for="exampleFormControlTextarea1">Link</label>
                            <input type="text" class="form-control" name="url" id="url"
                                placeholder="Input Link">
                        </div>
                        <div class="form-group my-2">
                            <label class="mb-2" for="exampleFormControlTextarea1">Parent</label>
                            <select class="form-select" aria-label="Default select example" name="menu_id">
                                <option selected disabled>Pilih Menu</option>
                                @foreach ($menu as $m )
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach                              
                              </select>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card p-3">
                <div class="card-header">
                    <div class="card-title">
                        Menu List
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                          <div class="list-group list-group-root well">
                         <a href="#" data-bs-toggle="modal" data-bs-target="#editMenu" class="list-group-item">
                            <h6>Profil / #</h6> 
                        </a>
                             <div class="list-group">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editMenuDetail" class="list-group-item" style="margin-left: 30px;">sub menu / <span class="text-primary">  link</span>  </a>
                        </div>
                        <div class="modal fade" id="editMenuDetail" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mw-650px">
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
                                        <form method="POST" class="form" action="#">
                                            @csrf
                                            <div class="mb-13 text-center">
                                                <h1 class="mb-3">Edit Data Menu Detail </h1>
                                            </div>
                                            <div class="d-flex flex-column mb-8 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Judul Menu </span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Judul Menu"></i>
                                                </label>
                                                <input type="text" value="fdssdf" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Masukkan Nama Menu" name="name" required />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="d-flex flex-column mb-8 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Link</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Manu"></i>
                                                </label>
                                                <input type="text" value="f" class="form-control form-control-solid @error('link') is-invalid @enderror" placeholder="Masukkan Link " name="link" required />
                                                @error('link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="text-center">
                                                <a href="#" type="submit" class="btn btn-danger me-3">Hapus</a>
                                                <button type="button"  data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                          </div>
                <div class="just-padding">
                    @foreach ($data as $d)
                    {{-- @dd($data); --}}
                    <div class="list-group list-group-root well">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editMenu{{$d->id}}" class="list-group-item">
                            <h6>{{$d->name}} / {{$d->link}}</h6> 
                        </a>
                        
                        {{-- @if ($d->details->isNotEmpty())
                        @foreach ($d->details as $de)
                        <div class="list-group">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editMenuDetail{{$de->id}}" class="list-group-item" style="margin-left: 30px;">{{$de->title}} / <span class="text-primary">  {{$de->link}}</span>  </a>
                        </div>
                        <div class="modal fade" id="editMenuDetail{{$de->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mw-650px">
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
                                        <form method="POST" class="form" action="#">
                                            @csrf
                                            <div class="mb-13 text-center">
                                                <h1 class="mb-3">Edit Data Menu Detail </h1>
                                            </div>
                                            <div class="d-flex flex-column mb-8 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Judul Menu </span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Judul Menu"></i>
                                                </label>
                                                <input type="text" value="{{$de->name}}" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Masukkan Nama Menu" name="name" required />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="d-flex flex-column mb-8 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Link</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Manu"></i>
                                                </label>
                                                <input type="text" value="{{$de->link}}" class="form-control form-control-solid @error('link') is-invalid @enderror" placeholder="Masukkan Link " name="link" required />
                                                @error('link')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="text-center">
                                                <a href="#" type="submit" class="btn btn-danger me-3">Hapus</a>
                                                <button type="button"  data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @endif --}}

                    </div>

                    <div class="modal fade" id="editMenu{{$d->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered mw-650px">
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
                                    <form method="POST" class="form" action="#">
                                        @csrf
                                        <div class="mb-13 text-center">

                                            <h1 class="mb-3">Edit Data Menu  </h1>

                                        </div>

                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Judul Menu </span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Manu"></i>
                                            </label>
                                            <input type="text" value="{{$d->name}}" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="" name="name" required />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Link</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Manu"></i>
                                            </label>

                                            <input type="text" value="{{$d->link}}" class="form-control form-control-solid @error('link') is-invalid @enderror" placeholder="Masukkan Link " name="link" required />
                                            @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <a href="#" type="submit" class="btn btn-danger me-3">Hapus</a>
                                            <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
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

