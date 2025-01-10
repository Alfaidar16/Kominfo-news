@extends('admin.layouts.app')
@section('content')
  <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="mb-0">Halaman Baru</h3>
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
                                        Halaman Baru
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
                         <div class="row">
    
</div>
<div class="row mt-5 d-flex">
    <div class="col -lg-12">
        <div class="card">
           <div class="card-body">
            <form action="{{ route('halaman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" 
                oninput="generateSlug()" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
               </div>
               <div class="form-group mb-2">
                <label class="form-label">Excerpt</label>
                <textarea class="form-control" name="excerpt"  rows="2"> {{ old('excerpt') }}</textarea>
            </div>
            <div class="form-group">
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">Body (id)</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Isi Halaman"></i>
                </label>
               
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body">{{ old('body') }}</textarea>
                @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" disabled>
               </div>
               <div class="form-group my-3">
                <label for="">meta_description</label>
                <input type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ old('meta_description') }}">
               </div>
               <div class="form-group my-3">
                <label for="">meta_keywords</label>
                <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{ old('meta_keywords') }}" >
               </div>
           
               <div class="form-group mb-2 p-1">
                <label for="" class="mb-2">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected disabled>Status</option>
                    <option value="INACTIVE">INACTIVE</option>
                    <option value="ACTIVE">ACTIVE</option>      
                  </select>
            </div>
            <div class="form-group">
                <img id="preview" alt="" class="img-fluid mb-2" width="300px">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('gambar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
             <div class="row mt-3">
              <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">Create Halaman</button>
              </div>
             </div>
                </form>
           </div>
        </div>
    </div>
</div>
                        {{-- end row --}}

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
        CKEDITOR.replace('body');
    });
    $('#created_at').daterangepicker({
	singleDatePicker: true,
  startDate: moment().startOf('hour'),
  endDate: moment().startOf('hour').add(32, 'hour'),
  locale: {
    format: 'YYYY/MM/DD'
  }
});

function generateSlug() {
    var title = document.getElementById('title').value;
    var slug = title.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')  // Remove special characters
                    .replace(/\s+/g, '-')         // Replace spaces with -
                    .replace(/-+/g, '-');         // Replace multiple - with single -
    document.getElementById('slug').value = slug;
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

</script>

@endsection