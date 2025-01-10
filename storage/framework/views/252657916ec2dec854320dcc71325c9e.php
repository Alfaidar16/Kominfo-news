<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style>
     input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0;
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
                    <h3 class="mb-0">Profil Website</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Profil Website
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

    <form id="kt_project_settings_form" class="form" action="<?php echo e(route('profil.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
        <div class="card-body p-9">
            
                
                
                
                
            
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Nama Website</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" value="<?php echo e($data->nama_website); ?>" name="nama_website" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Deskripsi</div>
                </div>
                <div class="col-xl-9 fv-row">
                     <textarea class="form-control form-control-solid" name="deskripsi" id="" cols="30" rows="10"> <?php echo e($data->deskripsi); ?></textarea>
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-3 mb-3">No Telp</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="number" class="form-control form-control-solid" value="<?php echo e($data->no_telp); ?>" name="no_telp" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Email</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="email" value="<?php echo e($data->email); ?>" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">URL</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="url" value="<?php echo e($data->url); ?>" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Facebook</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="facebook" value="<?php echo e($data->facebook); ?>" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Twitter</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="twitter" value="<?php echo e($data->twitter); ?>" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Instagram</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="instagram" value="<?php echo e($data->instagram); ?>" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Youtube</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="youtube" value="<?php echo e($data->youtube); ?>" />
                </div>
            </div>
            <div class="row mb-8">
                <div class="col-xl-3">
                    <div class="fs-6 fw-bold mt-2 mb-3">Alamat</div>
                </div>
                <div class="col-xl-9 fv-row">
                    <textarea name="alamat" class="form-control form-control-solid h-100px"><?php echo e($data->alamat); ?></textarea>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/admin/identitas/profil_website.blade.php ENDPATH**/ ?>