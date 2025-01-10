@extends('admin.layouts.app')
@section('content')
  <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="mb-0">Tambah Post Baru</h3>
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
                                        Tambah Post Baru
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
                  <div class="row mt-5 d-flex">
    
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <div class="form-group">
                            <label for="" class="mb-2 p-1 fs-5">Post Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid
                                 @enderror" placeholder="title" autofocus value="{{ old('title') }}" oninput="generateSlug()">
                              @error('title')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror   
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <div class="form-group">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Isi Berita (id)</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Isi Halaman"></i>
                            </label>
                           
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body"></textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-3">
                        <div class="form-group mb-2">
                            <label class="form-label">Excerpt</label>
                            <textarea class="form-control" name="excerpt"  rows="2"> {{ old('excerpt') }}</textarea>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">Post Detail</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3 p-1">
                                <label for="" class="mb-2">Url Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{ old('slug') }}" disabled>
                            </div>
                            <div class="form-group mb-2 p-1">
                                <label for="" class="mb-2">Post Status</label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected disabled>Status</option>
                                    <option value="PUBLISHED">Published</option>
                                    <option value="DRAFT">Draft</option>
                                    <option value="PENDING">Pending</option>
                                  </select>
                            </div>
                            <div class="form-group mb-2 p-1">
                                <label for="" class="mb-2">Post Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id">
                                    <option selected disabled>Category</option>
                                    @foreach ($categories as $key )
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                   
                                    
                                  </select>
                                  @error('category_id')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                  @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Featured</label>
                                 <input type="checkbox" name="featured">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="text-white">Post Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img id="preview" alt="" class="img-fluid mb-2" width="300px">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 fs-6">Tanggal Di Buat</label>
                                <input type="date" name="created_at" id="created_at" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="text-white">Seo Content</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-2">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description"  rows="2"> {{ old('meta_description')}}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords" rows="1.5"> {{ old('meta_keywords')}}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Seo Title</label>
                                <textarea class="form-control" name="seo_title" rows="1">{{ old('seo_title') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
          <button type="submit" class="btn btn-primary mt-3">Create New Post</button>
        </div>
       </div>
    </form>
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