<?php $__env->startSection('title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="blog-details pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <?php $__empty_1 = true; $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            $serialize = json_decode($galeri->images);
            $image = collect($serialize)->first();
        ?>
            <div class="blog-details-content md-pb-40">
                <img src="<?php echo e(asset('storage/'.$image)); ?>">
                <a href="<?php echo e(route('galeri.slug',$galeri->slug)); ?>">
                    <h3 class="details-title"><?php echo e($galeri->title); ?></h3>
                </a>
               
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>Tidak ada Kegiatan</p>
            <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <?php echo $__env->make('guest.Html.BeritaPopular', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('guest.layouts.Guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/guest/galeri-kegiatan.blade.php ENDPATH**/ ?>