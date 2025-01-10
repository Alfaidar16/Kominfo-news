<?php $__env->startSection('title',ucfirst('Semua Berita')); ?>
<?php $__env->startSection('content'); ?>
<section class="page-header bg-grey" data-background="/Diskominfo/template/assets/img/bg-img/footer-bg.jpg">
    <div class="shapes">
        <div class="shape shape-1"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-1.png" alt=""></div>
        <div class="shape shape-2"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-2.png" alt=""></div>
        <div class="shape shape-3"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-3.png" alt=""></div>
    </div>
    <div class="custom-container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="page-header-content">
                    <h1 class="text-white"><?php echo e($category->title); ?></h1>
                    <h4 class="sub-title text-white"><a href="index.html">Home </a><a href="#" class="inner-page">/<?php echo e($category->title); ?></a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-section pt-100 pb-100">
    <div class="container">
        <div class="section-heading text-center">
            <h4 class="sub-heading">Dokumen</h4>
            <h2 class="section-title"><?php echo e($category->title); ?></h2>
        </div>
        <div class="row gy-4 text-center mt-3 "> 
          <div class="col-lg-4">
            <input type="text" class="form-control" id="search" placeholder="Masukkan kata Pencarian...">
          </div>  
          <div class="col-lg-12 col-md-12" id="berita-list">
            <table class="table table-striped table-bordered" id="informasiRegulasi">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Dokumen</th>
                  
                    
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                        <td><?php echo e($dok->judul); ?></td>
                        <td><?php echo e($dok->tahun); ?></td>
                      
                        <td class="text-dark"><a href="<?php echo e(asset('storage/' . $dok->dokumen)); ?>" class=" btn btn-primary">Lihat</a></td>
                        
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                
                </tbody>
              </table>
        </div>
        </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <?php echo e($files->links('pagination::bootstrap-4')); ?>

        </div>
      </div>
    </div>
</section>
<!-- ./ cta-section -->

<section class="project-section pt-20 pb-100">
    <div class="project-container">
        
        <div class="row">
            <div class="col-lg-12">
                <section class="photo-gallery mb-0">
                    <div class="container">
                      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid" >

                        </div>
                      </div>
                    </div>
                  </section>
            </div>
            <div class="modal fade lightbox-modal" id="lightbox-modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                  <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                      <div class="lightbox-content">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              
         </div>
    
        </div> 
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
  $('#search').on('keyup', function() {
         var value = $(this).val().toLowerCase();
         $("#informasiRegulasi tbody tr").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
     });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('guest.layouts.Guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/guest/regulasiFile.blade.php ENDPATH**/ ?>