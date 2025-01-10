<?php $__env->startSection('title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



<section class="blog-details pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content md-pb-40">
                    <h2 class="details-title"><?php echo e($model->title); ?></h2>
                    <?php if(!empty($model->image)): ?>
                    <img src="<?php echo e(asset('storage/'.$model->image)); ?>" alt="  <?php echo e(asset('storage/'.$model->image)); ?>" class="img-responsive text-center">
                    <?php endif; ?>
                    <?php if(!empty($model->body)): ?>
                    <p><?php echo $model->body; ?></p>
                    <?php endif; ?>
                 
                </div>
            </div>
            <div class="col-lg-4">
                <?php echo $__env->make('guest.Html.BeritaPopular', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
         
        </div>
     
    </div>
</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('guest.layouts.Guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/guest/Pages.blade.php ENDPATH**/ ?>