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
                    <h3 class="mb-0">Daftar Permohonan Informasi</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Daftar Permohonan Informasi
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
                            
                            <table id="tablePermohonan" class="table table-bordered display" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Nama</th>
                                        <th>No Ktp</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No Pengesahan</th>
                                        <th class="text-center">Rincian Informasi</th>
                                        <th class="text-center">Tujuan Permohonan</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Pekerjaan</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $permohonanInformasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($d->nama_permohonan); ?></td>
                                            <td><?php echo e($d->no_ktp); ?></td>
                                            <td>
                                                <?php echo e($d->email); ?>

                                            </td>
                                            <td><?php echo e($d->nomor_pengesahan); ?></td>
                                            <td><?php echo e($d->rincian_informasi); ?></td>
                                            <td><?php echo e($d->tujuan_permohonan); ?></td>
                                            <td><?php echo e($d->alamat); ?></td>
                                            <td><?php echo e($d->pekerjaan); ?></td>
                                            <td>
                                                <?php if($d->status == 0): ?>
                                                    <div style="display: flex;">
                                                       
                                                            <button type="button" class="btn btn-warning btn-sm mx-3"
                                                                onclick="Verifikasi(<?php echo e($d->id); ?>)">Belum
                                                                Disetujui</button>
                                                      
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="TolakPermohonan(<?php echo e($d->id); ?>)">Tolak</button>
                                                      
                                                    </div>
                                                <?php elseif($d->status == 1): ?>
                                                    <a href="#" class="btn btn-success"
                                                        style="text-decoration: none;">Disetujui</a>
                                                <?php elseif($d->status == 2): ?>
                                                    <a href="#" class="btn btn-danger"
                                                        style="text-decoration: none;">Di Tolak</a>
                                                <?php endif; ?>



                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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
                $('#tablePermohonan').DataTable({
                    "pageLength": 10,
                    "processing": true,
                });
            }

        });

          function Verifikasi(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan Menyetujui Permohonan Ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    setuju(id);
                }
            })
        }

        function setuju(id) {
            var _token = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                url: "<?php echo e(route('permohonan.isSetuju')); ?>",
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


          function TolakPermohonan(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan Menolak Permohonan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    tolak(id);
                }
            })
        }

        function tolak(id) {
            var _token = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                url: "<?php echo e(route('permohonan.isTolak')); ?>",
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/admin/Daftar-Formulir/permohonan-informasi.blade.php ENDPATH**/ ?>