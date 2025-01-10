<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                            <form action="<?php echo e(route('kegiatan.update')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($kegiatan->id); ?>">
                                <div class="form-group">
                                    <label for="">Title <code>* Wajib Di Isi</code></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="title" oninput="generateSlug()" id="title"
                                        value="<?php echo e(old('title', $kegiatan->title)); ?>">
                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group my-3">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Body</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Isi Halaman"></i>
                                    </label>

                                    <textarea class="form-control <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="body" id="body"><?php echo e(old('body', $kegiatan->body)); ?></textarea>
                                    <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Slug</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="slug" id="slug" disabled
                                        value="<?php echo e(old('title', Illuminate\Support\Str::slug($kegiatan->title))); ?>">
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Image <span>(Bisa Lebih Dari 1 Gambar)</span></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mt-1">
                                                <?php
                                                    $imagesFiles = json_decode($kegiatan->images, true);
                                                ?>
                                                <div class="previews" style="display: flex; flex-wrap: wrap;">
                                                    <?php if($imagesFiles): ?>
                                                        <?php $__currentLoopData = $imagesFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="image-container"
                                                                style="position: relative; margin: 10px;"
                                                                value="<?php echo e($kegiatan->images); ?>">
                                                                <img src="<?php echo e(asset('storage/' . $file)); ?>"
                                                                    style="max-width: 200px; max-height: 150px; display: block;">
                                                                <button type="button" class="remove-image"
                                                                    data-filename="<?php echo e($file); ?>"
                                                                    style="position: absolute; top: 5px; right: 5px; background-color: red; color: white; border: none; cursor: pointer;">Remove</button>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <p>Tidak Ada gambar</p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file"
                                        class="form-control <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid     
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="images[]" id="images" placeholder="Upload Gambar" multiple>
                                    <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                                <!-- Preview container -->
                                <div class="form-group my-3">
                                    <label for="">Tanggal Di Buat</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['post_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="post_date" id="post_date" value="<?php echo e($kegiatan->post_date); ?>">
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
            

            <!--end::Row-->
            <!--begin::Row-->

            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/admin/kegiatan/edit.blade.php ENDPATH**/ ?>