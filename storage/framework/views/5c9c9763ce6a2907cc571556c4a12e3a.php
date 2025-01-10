<?php $__env->startSection('title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="page-header bg-grey" style="background-image: url('/Diskominfo/template/assets/img/bg-img/footer-bg.jpg')" data-background="">
    <div class="shapes">
        <div class="shape shape-1"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-1.png" alt=""></div>
        <div class="shape shape-2"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-2.png" alt=""></div>
        <div class="shape shape-3"><img src="/Diskominfo/template/assets/img/shapes/page-header-shape-3.png" alt=""></div>
    </div>
    <div class="custom-container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="page-header-content">
                    <h1 class="text-white">Formulir Pengajuan Keberatan</h1>
                    <h4 class="sub-title text-white"><a href="index.html">Home </a><a href="#" class="inner-page">/Formulir Pengajuan Keberatan</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-section pt-100 pb-100">
    <div class="container">
        <div class="section-heading text-center mb-5">
            <h4 class="sub-heading">Formulir Pengajuan Keberatan </h4>
            <h2 class="section-title">isi dan lengkapi formulir dibawah ini</h2>
        </div>
      
    </div>
    <div class="container">
      <div class="row">
        <form action="<?php echo e(route('Permohonan.keberatan.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

             <div class="card p-3">
               <div class="row">
                    <div class="col-md-6">
                      <h3>Pengajuan Keberatan</h3>
                 </div>
                <div class="row ">
                    <div class="col-lg-12 mb-3">
                           <div class="form-group">
                <label for="no_daftar">No. Pendaftaran Permohonan Informasi <code>*</code></label>
                <input type="text" class="form-control" id="no_daftar" name="no_daftar" placeholder="Masukkan No Pendaftaran" required>
            </div>
                    </div>
                      <div class="col-lg-12">
                           <div class="form-group">
                <label for="tujuan_pemohon">Tujuan Pengunaan Informasi <code>*</code> </label>
                <input type="text" class="form-control" id="tujuan_pemohon" name="tujuan_pemohon" placeholder="Masukkan Tujuan" required>
            </div>
                    </div>
                </div>
            </div>
             </div>

               <div class="card p-3 mt-3">
               <div class="row">
                    <div class="col-md-6">
                      <h3>Indentitas Pemohon</h3>
                 </div>
                <div class="row">
                    <div class="col-lg-12 mb-3">
                           <div class="form-group">
                <label for="nama_permohonan">Nama Pemohon Informasi <code>*</code></label>
                <input type="text" class="form-control" id="nama_permohonan" name="nama_permohonan" placeholder="Masukkan Nama Pemohon" required>
            </div>
                    </div>
                      <div class="col-lg-12">
                           <div class="form-group">
                <label for="alamat">Alamat <code>*</code> </label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
            </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                           <div class="form-group">
                <label for="street_address">Street Address <code>*</code></label>
                <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Masukkan Street Address" required>
            </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 mb-3">
                <label for="apertemen">Apt, Suite, Bldg. (optional)</label>
                <input type="text" class="form-control" id="apertemen" name="apertemen">
                </div>
                  <div class="col-lg-6">
                      <label for="provinsi">State / Province / Region <code>*</code></label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi">
                   
                </div>
            </div>

              <div class="row">
                <div class="col-lg-6 mb-3">
                <label for="city">City <code>*</code></label>
                <input type="text" class="form-control" id="city" name="city">
                </div>
                  <div class="col-lg-6">
                     <label for="negara">Country <code>*</code></label>
                     <input type="text" class="form-control" id="negara" name="negara">
                </div>
            </div>
            <hr class="mt-3 mb-3">
            <div class="row">
                <div class="col-lg-6 mb-3">
                     <label for="pekerjaan">Pekerjaan <code>*</code></label>
                     <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan">
                </div>
                  <div class="col-lg-6">
                     <label for="no_hp">Nomor Telepon/HP <code>*</code></label>
                     <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Hp">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="email">Email <code>*</code></label>
                    <input type="email" name="email" placeholder="Masukkan Email" class="form-control" id="email" required>
                </div>
            </div>
             </div>

             
             <div class="card p-3 mt-3">
               <div class="row">
                    <div class="col-md-6">
                      <h3>Indentitas Kuasa Pemohon</h3>
                 </div>
                <div class="row">
                    <div class="col-lg-12 mb-3">
                           <div class="form-group">
                <label for="nama_kuasa_pemohon">Nama <code>*</code></label>
                <input type="text" class="form-control" id="nama_kuasa_pemohon" name="nama_kuasa_pemohon" placeholder="Masukkan Nama" required>
            </div>
                    </div>
                      <div class="col-lg-12">
                           <div class="form-group">
                <label for="alamat_kuasa_pemohon">Alamat <code>*</code></label>
                <input type="text" class="form-control" id="alamat_kuasa_pemohon" name="alamat_kuasa_pemohon" placeholder="Masukkan Alamat" required>
            </div>
                    </div>

                    <div class="col-lg-12 mt-3">
                           <div class="form-group">
                <label for="street_address_kuasa_pemohon">Street Address <code>*</code></label>
                <input type="text" class="form-control" id="street_address_kuasa_pemohon" name="street_address_kuasa_pemohon" placeholder="Masukkan Street Address" required>
            </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 mb-3">
                <label for="apertemen_kuasa_pemohon">Apt, Suite, Bldg. (optional)</label>
                <input type="text" class="form-control" id="apertemen_kuasa_pemohon" name="apertemen_kuasa_pemohon">
                </div>
                  <div class="col-lg-6">
                      <label for="provinsi_kuasa_pemohon">State / Province / Region <code>*</code></label>
                    <input type="text" class="form-control" id="provinsi_kuasa_pemohon" name="provinsi_kuasa_pemohon">
                   
                </div>
            </div>

              <div class="row">
                <div class="col-lg-6 mb-3">
                <label for="city_kuasa_pemohon">City <code>*</code></label>
                <input type="text" class="form-control" id="city_kuasa_pemohon" name="city_kuasa_pemohon">
                </div>
                  <div class="col-lg-6">
                     <label for="negara_kuasa_pemohon">Country <code>*</code></label>
                     <input type="text" class="form-control" id="negara_kuasa_pemohon" name="negara_kuasa_pemohon">
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                     <label for="no_hp_kuasa_pemohon">Nomor Telepon/HP <code>*</code></label>
                     <input type="number" class="form-control" id="no_hp_kuasa_pemohon" name="no_hp_kuasa_pemohon" placeholder="Masukkan Nomor Hp">
                
            </div>
             </div>
             
             
              <div class="card p-3 mt-3">
               <div class="row">
                    <div class="col-md-6">
                      <h3>Alasan Pengajuan Keberatan <code>*</code></h3>
                 </div>
                 <div class="form-group">
                    <p>Sesuai dengan Pasal 25 UU KIP, dipilih oleh pengaju keberatan sesuai dengan alasan keberatan yang diajukan</p>
                 </div>
               </div>
               <div class="row">
                 <table class="mt-4">
                                                  
                                                    <tr>
                                                        <td><label style="text-align: left;font-size: 14px; ">a</label></td>
                                                        <td><label style="text-align: left;font-size: 14px; margin-left: 20px;">Permohonan Informasi Ditolak </label></td>
                                                        
                                                        <td><input type="checkbox" id="getInfo"  name="alasan_pengajuan[]"  value="Permohonan Informasi Ditolak" style="margin-left: 50px; width:340px;" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label style="text-align: left;font-size: 14px; ">b</label></td>
                                                        <td><label style="text-align: left;font-size: 14px; margin-left: 20px;">Informasi Berkala TIdak disediakan </label></td>
                                                        
                                                        <td><input type="checkbox" id="alasan_pengajuan[]"  name="alasan_pengajuan[]"  value="Informasi Berkala TIdak disediakan" style="margin-left: 50px; width:340px;" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label style="text-align: left;font-size: 14px; ">c</label></td>
                                                        <td><label style="text-align: left;font-size: 14px; margin-left: 20px;">Permohonan Informasi Ditolak </label></td>
                                                        
                                                        <td><input type="checkbox" id="alasan_pengajuan[]"  name="alasan_pengajuan[]"  value="Informasi Tidak Ditanggapi" style="margin-left: 50px; width:340px;" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label style="text-align: left;font-size: 14px; ">d</label></td>
                                                        <td><label style="text-align: left;font-size: 14px; margin-left: 20px;">Permintaan Informasi Dianggap Tidak Sebagaimana Yang Diminta </label></td>
                                                        
                                                        <td><input type="checkbox" id="alasan_pengajuan[]"  name="alasan_pengajuan[]"  value="Permintaan Informasi Dianggap Tidak Sebagaimana Yang Diminta" style="margin-left: 50px; width:340px;" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label style="text-align: left;font-size: 14px; ">e</label></td>
                                                        <td><label style="text-align: left;font-size: 14px; margin-left: 20px;">Permintaan Informasi Tidak Dipenuhi </label></td>
                                                        
                                                        <td><input type="checkbox" id="alasan_pengajuan[]"  name="alasan_pengajuan[]"  value="Permintaan Informasi Tidak Dipenuhi" style="margin-left: 50px; width:340px;" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label style="text-align: left;font-size: 14px; ">f</label></td>
                                                        <td><label style="text-align: left;font-size: 14px; margin-left: 20px;">Biaya Yang Dikenakan Tidak Wajar </label></td>
                                                        
                                                        <td><input type="checkbox" id="alasan_pengajuan[]"  name="alasan_pengajuan[]"  value="Biaya Yang Dikenakan Tidak Wajar" style="margin-left: 50px; width:340px;" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label style="text-align: left;font-size: 14px; ">g</label></td>
                                                        <td><label style="text-align: left;font-size: 14px; margin-left: 20px;">Informasi Disampaikan Melebihi Jangka Waktu Yang Ditentukan </label></td>
                                                        
                                                        <td><input type="checkbox" id="alasan_pengajuan[]"  name="alasan_pengajuan[]"  value="Informasi Disampaikan Melebihi Jangka Waktu Yang Ditentukan" style="margin-left: 50px; width:340px;" ></td>
                                                    </tr>
                                                   
                                                </table>
                                          <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="kasus_posisi">Kasus Posisi <code>*</code></label>
                                                    <textarea class="form-control" id="kasus_posisi" name="kasus_posisi"></textarea>
                                                </div>
                                            </div>
                                            </div> 
                <div class="row mt-3 text-end">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary p-3">Kirim Permohonan</button>
                    </div>
            </div>     
               </div>
             
           
         
        </form>
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


<?php echo $__env->make('guest.layouts.Guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/guest/formulir_keberatan.blade.php ENDPATH**/ ?>