@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <style>
        .previews img {
            padding: 10px;
            max-width: 290px;
        }

        .previews {
            display: flex;
            flex-wrap: wrap;
        }

        .image-container {
            position: relative;
            margin: 10px;
        }

        .image-container img {
            max-width: 100px;
            max-height: 100px;
            display: block;
        }

        .remove-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            padding: 5px;
            font-size: 12px;
            border-radius: 3px;
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
                    <h3 class="mb-0"> EditKegiatan Baru</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Kegiatan Baru
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
                <div class="col -lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('kegiatan.update') }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $kegiatan->id }}">
                                <div class="form-group">
                                    <label for="">Title <code>* Wajib Di Isi</code></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" oninput="generateSlug()" id="title"
                                        value="{{ old('title', $kegiatan->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Body</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Isi Halaman"></i>
                                    </label>

                                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body">{{ old('body', $kegiatan->body) }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                        name="slug" id="slug" disabled
                                        value="{{ old('title', Illuminate\Support\Str::slug($kegiatan->title)) }}">
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Image <span>(Bisa Lebih Dari 1 Gambar)</span></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mt-1">
                                                @php
                                                    $imagesFiles = json_decode($kegiatan->images, true);
                                                @endphp
                                                <div class="previews" style="display: flex; flex-wrap: wrap;">
                                                    @if ($imagesFiles)
                                                        @foreach ($imagesFiles as $file)
                                                            <div class="image-container"
                                                                style="position: relative; margin: 10px;"
                                                                value="{{ $kegiatan->images }}">
                                                                <img src="{{ asset('storage/' . $file) }}"
                                                                    style="max-width: 200px; max-height: 150px; display: block;">
                                                                <button type="button" class="remove-image"
                                                                    data-filename="{{ $file }}"
                                                                    style="position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; cursor: pointer;">Remove</button>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>Tidak Ada gambar</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file"
                                        class="form-control @error('images') is-invalid     
                        @enderror"
                                        name="images[]" id="images" placeholder="Upload Gambar" multiple>
                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <!-- Preview container -->
                                <div class="form-group my-3">
                                    <label for="">Tanggal Di Buat</label>
                                    <input type="text" class="form-control @error('post_date') is-invalid @enderror"
                                        name="post_date" id="post_date" value="{{ $kegiatan->post_date }}">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">Update Kegiatan</button>
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
        $('#post_date').daterangepicker({
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
                .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/-+/g, '-'); // Replace multiple - with single -
            document.getElementById('slug').value = slug;
        }


        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            let imageDiv = $('<div class="image-container">')
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                previewImages(this, 'div.previews');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.remove-image').forEach(function(button) {
                button.addEventListener('click', function() {
                    let filename = this.getAttribute('data-filename');
                    let container = this.closest('.image-container');
                    container.remove();
                    // Perform any additional actions here, like updating a hidden input with the new image list
                });
            });
        });
    </script>
@endsection
