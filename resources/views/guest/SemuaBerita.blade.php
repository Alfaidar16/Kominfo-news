@extends('guest.layouts.Guest')
@section('title',ucfirst('Semua Berita'))
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
                    <h1 class="text-white">Semua Berita</h1>
                    <h4 class="sub-title text-white"><a href="index.html">Home </a><a href="#" class="inner-page">/Semua Berita</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-section pt-100 pb-100">
    <div class="container">
        <div class="section-heading text-center">
            <h4 class="sub-heading">Berita</h4>
            <h2 class="section-title">Semua Berita</h2>
        </div>
        <div class="sidebar-widget search">
            <div class="search-box">
                <form action="{{ route('search')}}" method="Get" class="search-form">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <button class="search-btn" type="submit">
                        <i class="fa-light fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
        @php
            $satuData = DB::table('posts')->orderBy('created_at','desc')->take(2)->get();
        @endphp
        <div class="row gy-4 ">
          @foreach ($satuData as $satuData )
          <div class="col-lg-6 col-md-6">
            <div class="post-card">
                <div class="post-thumb">
                    <img src="{{asset('storage/'.$satuData->image)}}" alt="post">
                    <a href="#" class="category">Kategori</a>
                </div>
                <div class="post-content-wrap">
                    <div class="post-content">
                        <ul class="post-meta">
                            <li>By: <a href="#">Admin, </a>{{date('d M Y',strtotime($satuData->created_at))}}</li>
                            {{-- <li>Comments (02)</li> --}}
                        </ul>
                        <h5 class="">
                            <a href="#"
                                >  {{$satuData->title}}</a
                            >
                        </h5>
                        <p class="desc">
                            {{ $satuData->excerpt }}
                        </p>
                    </div>
                    <div class="post-review-wrap">
                        
                        <a href="{{route('post.slug',$satuData->slug)}}"
                            >Baca Selengkapnya  <i class="fa-solid fa-circle-chevron-right"></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
          @endforeach
         
           @foreach ($model as $key)
           <div class="col-lg-3 col-md-6">
            <div class="post-card">
                <div class="post-thumb">
                    <img src="{{asset('storage/'.$key->image)}}" alt="post">
                    <a href="#" class="category">Kategori</a>
                </div>
                <div class="post-content-wrap">
                    <div class="post-content">
                        <ul class="post-meta">
                            <li>By: <a href="#">Admin, </a>{{date('d M Y',strtotime($key->created_at))}}</li>
                            {{-- <li>Comments (02)</li> --}}
                        </ul>
                        <h5 class="">
                            <a href="#"
                                >{{$key->title}}</a
                            >
                        </h5>
                        <p class="desc">
                            {{ $key->excerpt }}
                        </p>
                    </div>
                    <div class="post-review-wrap">
                        
                        <a href="#"
                            >Baca Selengkapnya  <i class="fa-solid fa-circle-chevron-right"></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
       
           @endforeach
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item"><a class="page-link" href="#">6</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>
    </div>
</section>

<section class="blog-details pt-40 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @include('guest.Html.BeritaPopular')
            </div>
            
            <div class="col-lg-6">
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