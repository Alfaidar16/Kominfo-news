@extends('guest.layouts.Guest')
@section('title')
{{ $title }}
@endsection
@section('content')
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
                    <h2 class="text-white">{{$model->title}}</h2>
                    <h4 class="sub-title text-white"><a href="#">Home </a><a href="#" class="inner-page">/Judul Artikel</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content md-pb-40">
                    <div class="blog-details-thumb">
                        <img class=" rounded-4" src="{{asset('storage/'.$model->image)}}" alt="blog">
                    </div>
                    <div class="details-meta">
                        <span class="category">Diskominfo-SP Sulsel</span>
                        <p>Admin / <span>{{date('d M Y',strtotime($model->created_at))}}</span></p>
                    </div>
                    <h2 class="details-title">{{$model->title}}</h2>
                    <p>{!! $model->body !!}</p>
                    
                    
                    <div class="blog-form pt-90 beritaborder">
                        <h3 class="form-header">Informasi Lebih Lanjut</h3>
                        <div class="contact-form">
                            <form action="contact.php" method="post" id="ajax_contact" class="form-horizontal">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Your Phone">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="pets" id="pet-select">
                                            <option value="">Select Category</option>
                                            <option value="dog">IT Solution</option>
                                            <option value="cat">Digital Marketing</option>
                                            <option value="hamster">Business Solution</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-md-6">
                                        <input type="text" id="adress" name="subject" class="form-control" placeholder="Office address">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="daterange" placeholder="Date">
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button id="submit" class="mt-primary-btn primary-2" type="submit">Kirim Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget search">
                    <div class="search-box">
                        <form action="" class="search-form">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="search-btn" type="button">
                                <i class="fa-light fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="sidebar-widget">
                    <h3 class="widget-title">Kategori</h3>
                    <ul class="category-list">
                        <li><a href="#"><i class="fa-solid fa-arrow-right-long"></i>OPD</a><span>(03)</span></li>
                        <li><a href="#"><i class="fa-solid fa-arrow-right-long"></i>Humas</a><span>(01)</span></li>
                        <li><a href="#"><i class="fa-solid fa-arrow-right-long"></i>APTIKA</a><span>(02)</span></li>
                        <li><a href="#"><i class="fa-solid fa-arrow-right-long"></i>Pemprov Sulsel</a><span>(03)</span></li>
                        <li><a href="#"><i class="fa-solid fa-arrow-right-long"></i>Diskominfo-SP </a><span>(04)</span></li>
                        
                    </ul>
                </div>
                
                @include('guest.Html.BeritaPopular')
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

{{-- @include('guest.Html.Footer') --}}
@endsection