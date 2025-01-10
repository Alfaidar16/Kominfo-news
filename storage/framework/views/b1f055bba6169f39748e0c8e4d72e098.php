<div class="sidebar-widget sticky-widget">
    <h3 class="widget-title">Berita Terpopuler</h3>
     <?php $__currentLoopData = getPost('berita-utama',0,5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="sidebar-post">
        <img src="<?php echo e(asset('storage/'.$key->image)); ?>" alt="post">
        <div class="post-content">
            <ul class="post-meta">
                <li><i class="fa-light fa-calendar"></i><?php echo e(date('d M Y',strtotime($key->created_at))); ?></li>
            </ul>
            <h3 class="title"><a href="<?php echo e(route('post.slug', $key->slug)); ?>"><?php echo substr(strip_tags(explode('<!--more-->', $key->title)[0]), 0, 72); ?>...</a></h3>
            
        </div>
    </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
    <div class="col-lg-12 pt-4" >
        <button class="btn btn-primary "> <a href="<?php echo e(route('post.all')); ?>" target="_blank">Lihat Semua Berita ></a> </button>
    </div>
</div><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/guest/Html/BeritaPopular.blade.php ENDPATH**/ ?>