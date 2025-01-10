<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Regulasi</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Regulasi
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
                            <button class="btn btn-primary btn-sm mb-5" data-bs-toggle="modal"
                                data-bs-target="#tambahUser">Tambah Regulasi</button>
                            <table id="tableRegulasi" class="table table-bordered display" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-left">Title</th>
                                        <th class="text-left">Kategori File</th>
                                        <th class="text-left">Tahun</th>
                                        <th class="text-left">Dokumen</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $regulasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($key->judul); ?></td>
                                            <td><?php echo e($key->title); ?></td>
                                            <td><?php echo e($key->tahun); ?></td>
                                            <td><a href=" <?php echo e(asset('storage/' . $key->dokumen)); ?>"
                                                    class="text-decoration-none">
                                                    lihat
                                                </a>
                                            </td>
                                            <td class="d-flex">
                                                 <button  onclick="konfirmasiEdit(<?php echo e($key->id); ?>)" class="btn waves-effect waves-light btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i></button>
                                         <button  onclick="hapusRegulasi(<?php echo e($key->id); ?>)" class="btn waves-effect waves-light btn-danger btn-sm">
                                                    <i
                                                            class="bi bi-trash"></i></button>
                                               
                                                
                                                
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="tambahUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" style="margin-width: 750px;">
                    <div class="modal-content rounded">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                            fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.5"
                                                transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                x="0" y="7" width="16" height="2" rx="1" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <form action="<?php echo e(route('regulasi.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">New Regulasi</h1>
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul Regulasi:</label>
                                    <input type="text" name="judul"
                                        class="form-control <?php echo e($errors->has('judul') ? 'is-invalid' : ''); ?>">
                                    <?php if($errors->has('judul')): ?>
                                        <div class="invalid-feedback text-danger">
                                            <?php echo e($errors->first('judul')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="body">Kategori File:</label>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_dok_regulasis">
                                        <option selected disabled>Pilih Kategori File</option>
                                        <?php $__currentLoopData = $kategoriFile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->id); ?>"><?php echo e($key->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Tahun:</label>
                                    <input type="number" name="tahun" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="body">Upload Dokumen:</label>

                                    <input type="file" name="dokumen" id="dokumen" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editCategory" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered mw-650px">
                    <div class="modal-content rounded">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                            fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16" height="2"
                                                rx="1" />
                                            <rect fill="#000000" opacity="0.5"
                                                transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                x="0" y="7" width="16" height="2" rx="1" />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                          <form action="<?php echo e(route('regulasi.update')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="id" id="idRegulasi">
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">New Edit Regulasi</h1>
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul Regulasi:</label>
                                    <input type="text" name="judul" id="judulEdit"
                                        class="form-control <?php echo e($errors->has('judul') ? 'is-invalid' : ''); ?>">
                                    <?php if($errors->has('judul')): ?>
                                        <div class="invalid-feedback text-danger">
                                            <?php echo e($errors->first('judul')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="body">Kategori File:</label>
                                    <select class="form-control" aria-label="Default select example"
                                        name="id_dok_regulasis" id="id_dok_regulasiEdit">
                                        
                                        <?php $__currentLoopData = $kategoriFile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key->id); ?>"><?php echo e($key->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="title">Tahun:</label>
                                    <input type="number" name="tahun" id="tahunEdit" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <a href="" id="dokumenLama">lihat Dokumen Lama</a>
                                    <label for="body">Upload Dokumen:</label>

                                    <input type="file" name="dokumen" id="dokumenEdit" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
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
            load_data();

            function load_data(unit = '') {
                $('#tableRegulasi').DataTable({
                    "pageLength": 10,
                    "processing": true,
                });
            }

        });
        function konfirmasiEdit(id) {
            Swal.fire({
                title: 'Edit Data?',
                text: "Anda akan Edit data Ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    editRegulasi(id);
                }
            })
        }

        function editRegulasi(id) {

            console.log(id);
            var _token = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                url: "<?php echo e(route('regulasi.edit')); ?>",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    
                    $('#idRegulasi').val(data.id);
                    $('#judulEdit').val(data.judul);
                     $('#tahunEdit').val(data.tahun);
                      $('#id_dok_regulasiEdit option').filter(function() {
        return $(this).text() === data.title;
    }).prop('selected', true);
                     $('#dokumenLama').attr('href', '/storage/' + data.dokumen);
                    // $('#dokumenEdit').val(data.dokumen);
                    
                    

                     $('#editCategory').modal('show');
                },
                error: function(e) {
                    console.log('Error:', e);
                }
            })
        }



        function hapusRegulasi(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus Banner",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    hapus(id);
                }
            })
        }

        function hapus(id) {
            var _token = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                url: "<?php echo e(route('regulasi.destroy')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/admin/regulasi/index.blade.php ENDPATH**/ ?>