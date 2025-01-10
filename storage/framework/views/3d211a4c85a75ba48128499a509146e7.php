<?php $__env->startSection('content'); ?>
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
                    <form action="<?php echo e(route('menuList.store')); ?>" method="Post">
                        <?php echo csrf_field(); ?>
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
                                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->id); ?>"><?php echo e($m->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                              
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
                                            <?php echo csrf_field(); ?>
                                            <div class="mb-13 text-center">
                                                <h1 class="mb-3">Edit Data Menu Detail </h1>
                                            </div>
                                            <div class="d-flex flex-column mb-8 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Judul Menu </span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Judul Menu"></i>
                                                </label>
                                                <input type="text" value="fdssdf" class="form-control form-control-solid <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Nama Menu" name="name" required />
                                                <?php $__errorArgs = ['name'];
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

                                            <div class="d-flex flex-column mb-8 fv-row">
                                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                    <span class="required">Link</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Manu"></i>
                                                </label>
                                                <input type="text" value="f" class="form-control form-control-solid <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Link " name="link" required />
                                                <?php $__errorArgs = ['link'];
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
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="list-group list-group-root well">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editMenu<?php echo e($d->id); ?>" class="list-group-item">
                            <h6><?php echo e($d->name); ?> / <?php echo e($d->link); ?></h6> 
                        </a>
                        
                        

                    </div>

                    <div class="modal fade" id="editMenu<?php echo e($d->id); ?>" tabindex="-1" aria-hidden="true">
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
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-13 text-center">

                                            <h1 class="mb-3">Edit Data Menu  </h1>

                                        </div>

                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Judul Menu </span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Manu"></i>
                                            </label>
                                            <input type="text" value="<?php echo e($d->name); ?>" class="form-control form-control-solid <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" name="name" required />
                                            <?php $__errorArgs = ['name'];
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


                                        <div class="d-flex flex-column mb-8 fv-row">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Link</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Manu"></i>
                                            </label>

                                            <input type="text" value="<?php echo e($d->link); ?>" class="form-control form-control-solid <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Link " name="link" required />
                                            <?php $__errorArgs = ['link'];
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/admin/menuList/index.blade.php ENDPATH**/ ?>