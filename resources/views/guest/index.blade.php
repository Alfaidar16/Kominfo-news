@extends('guest.layouts.Guest')
{{-- @section('title',Voyager::setting('title')) --}}
@section('content')
{{-- <section>
    <div class="">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('header/' . $banner->image)}}" alt="" width="100%">
            </div>
        </div>
        <div class="hero-shapes">
            <img class="hero-shape shape-1" src="/Diskominfo/template/assets/img/shapes/hero-anim-3.png" alt="shapes">
            <img class="hero-shape shape-2" src="/Diskominfo/template/assets/img/shapes/hero-anim-2.png" alt="shapes" style="width: 150px;">
            <img class="hero-shape shape-3" src="/Diskominfo/template/assets/img/shapes/hero-anim-3.png" alt="shapes">
        </div>
        
    </div>
 </section> --}}
 {{-- <div class="embedsocial-hashtag" data-ref="1da6d4f7f5a6f0e6c5b312db08be66a8cd4dad43"> <a class="feed-powered-by-es feed-powered-by-es-feed-img es-widget-branding" href="https://embedsocial.com/social-media-aggregator/" target="_blank" title="Instagram widget"> <img src="https://embedsocial.com/cdn/icon/embedsocial-logo.webp" alt="EmbedSocial"> <div class="es-widget-branding-text">Instagram widget</div> </a> </div><script>(function(d, s, id){var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js);}(document, "script", "EmbedSocialHashtagScript"));</script> --}}
 {{-- <div class="embedsocial-hashtag" data-ref="a22d22920a45368ee72120cf4a490e754465ec26"> <a class="feed-powered-by-es feed-powered-by-es-feed-img es-widget-branding" href="https://embedsocial.com/" target="_blank" title="Widget by EmbedSocial"> <img src="https://embedsocial.com/cdn/icon/embedsocial-logo.webp" alt="EmbedSocial"> <div class="es-widget-branding-text">Widget by EmbedSocial</div> </a> </div><script>(function(d, s, id){var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js);}(document, "script", "EmbedSocialHashtagScript"));</script><div class="embedsocial-hashtag" data-ref="4aa09803cf660d6daf86c2d636311519a3bdebd1"> <a class="feed-powered-by-es feed-powered-by-es-feed-img es-widget-branding" href="https://embedsocial.com/social-media-aggregator/" target="_blank" title="Instagram widget"> <img src="https://embedsocial.com/cdn/icon/embedsocial-logo.webp" alt="EmbedSocial"> <div class="es-widget-branding-text">Instagram widget</div> </a> </div><script>(function(d, s, id){var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js);}(document, "script", "EmbedSocialHashtagScript"));</script><div class="embedsocial-hashtag" data-ref="a22d22920a45368ee72120cf4a490e754465ec26"> <a class="feed-powered-by-es feed-powered-by-es-feed-img es-widget-branding" href="https://embedsocial.com/" target="_blank" title="Widget by EmbedSocial"> <img src="https://embedsocial.com/cdn/icon/embedsocial-logo.webp" alt="EmbedSocial"> <div class="es-widget-branding-text">Widget by EmbedSocial</div> </a> </div><script>(function(d, s, id){var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js);}(document, "script", "EmbedSocialHashtagScript"));</script> --}}
  <!-- ./ hero-section -->
 {{-- <div class="sponser-section pt-100 pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4">
                <div class="sponsor-item">
                    <a href="https://ppid.sulselprov.go.id/"  target="_blank"><img src="/Diskominfo/template/assets/img/sponsor/sponsor-1.png" alt="ppid"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="sponsor-item">
                    <a href="https://www.lapor.go.id/"  target="_blank"><img src="/Diskominfo/template/assets/img/sponsor/lapor1.png" class="mb-3" alt="lapor" style="width: 100px;"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="sponsor-item">
                    <a href="https://sulselprov.go.id/"  target="_blank"><img src="/Diskominfo/template/assets/img/sponsor/logo-sulsel.png" class="mb-3" alt="sulselprov" style="width: 70px;"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="sponsor-item">
                    <a href="https://satudata.sulselprov.go.id/"  target="_blank"><img src="/Diskominfo/template/assets/img/sponsor/logo-opendata.png" class="mb-3" alt="sulselprov" style="width: 70px;"></a>
                </div>
            </div>
        </div>
    </div>
 </div> --}}
{{-- <div class="sponsor-section pt-100 pb-100">
    <div class="container">
        <div class="sponsor-carousel swiper">
            <div class="swiper-wrapper swiper-container">
                <div class="swiper-slide">
                    <div class="sponsor-item">
                        <a href="#"><img src="/Diskominfo/template/assets/img/sponsor/sponsor-1.png" alt="sulselprov"></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="sponsor-item">
                        <a href="https://ppid.sulselprov.go.id/"><img src="/Diskominfo/template/assets/img/sponsor/lapor1.png" alt="ppid"></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="sponsor-item">
                        <a href="#"><img src="/Diskominfo/template/assets/img/sponsor/sponsor-2.png" alt="sponsor"></a>
                    </div>
                </div> --}}
                {{-- <div class="swiper-slide">
                    <div class="sponsor-item">
                        <a href="#"><img src="/Diskominfo/template/assets/img/sponsor/sponsor-3.png" alt="sponsor"></a>
                    </div>
                </div> --}}
                {{-- <div class="swiper-slide">
                    <div class="sponsor-item">
                        <a href="#"><img src="/Diskominfo/template/assets/img/sponsor/sponsor-4.png" alt="sponsor"></a>
                    </div>
                </div> --}}
            {{-- </div>
        </div>
    </div>
</div> --}}
<section class="about-section pb-100 d-none">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-heading mb-30">
                        <h4 class="sub-heading wow fade-in-right" data-wow-delay="300ms">Sambutan </h4>
                        <h3 class="section-title wow fade-in-right" data-wow-delay="400ms">Kepala Diskominfo-SP Sulsel </h3>
                        
                        <p class="wow fade-in-right" data-wow-delay="500ms">
                            Assalamualaikum Wr. Wb. Puji syukur kami panjatkan kehadirat Allah SWT atas diluncurkannya situs resmi Website ini. Kami harap website ini dapat bermanfaat dalam memberikan data dan informasi terkait dengan Pembangunan Perumahan, Kawasan Permukiman dan Pertanahan yang dapat digunakan tidak hanya oleh tenaga, namun juga dapat dimanfaatkan oleh masyarakat luas.Pengguna website dapat mengakses dan mengunduh langsung publikasi data dan informasi, yang dapat digunakan sesuai dengan kebutuhan. Kami berusaha untuk menyajikan informasi yang terkini sehingga dapat memenuhi keinginan dan kebutuhan para stakeholder pada khususnya dan masyarakat Indonesia pada umumnya, dan khususnya masyarakat provinsi Sulawesi Selatan untuk memberikan informasi. 
                        </p>
                    </div>
                 
                    <div class="about-author wow fade-in-right" data-wow-delay="700ms">
                        <div class="author-info">
                            
                            <h3 class="name">A. Winarno Eka Putra, S.STP., M.H. <span >Kepala Diskominfo-SP Sulsel</span></h3>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none">
                
                <div class="about-img wow slide-in-left  " data-wow-delay="500ms" >
                    <img src="/Diskominfo/template/assets/img/images/about-img-1.jpg" alt="about" class="rounded-5 img-thumbnail">
                </div>
                <div class="about-author wow fade-in-right" data-wow-delay="700ms">
                    <div class="author-info">
                        
                        <h3 class="name">A. Winarno Eka Putra, S.STP., M.H. <span >Kepala Diskominfo-SP Sulsel</span></h3>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./ pengunjung website-section -->
<section class="blog-section bg-grey pb-10 ">
    <div class="container">
        
        <div class="row gy-6">
            <div class="col-lg-6 col-md-2 text-center pt-0">
                <div class=" text-center " data-wow-delay="400ms" >
                    <div class="shape">
                    </div>
                    
            <div style="justify-content: center; margin-top:180px; display:flex;"data-wow-delay="400ms">
             <div class="col-lg-3 col-md-4">
               
                    <a href="https://ppid.sulselprov.go.id/"  target="_blank">
                        <img src="/Diskominfo/template/assets/img/sponsor/sponsor-1.png" alt="ppid" style="width: 170px; height:75px; border:1px solid black; "></a>
               
            </div>

             <div class="col-lg-3 col-md-4 ">
             
                    <a href="https://www.lapor.go.id/"  target="_blank">
                        <img src="/Diskominfo/template/assets/img/sponsor/lapor1.png" class="mb-3 mx-5 mt-1" alt="lapor" style="width: 170px; height:75px; border:1px solid black; "></a>
               
            </div>
                        
                    {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/158926fa-c543-43a6-a42a-dc1238616484/SqGkM3kPUA.json" background="##FFFFFF" speed="0.8" style="width: 620px; height: 690px" loop  autoplay direction="1" mode="normal" ></lottie-player> --}}
                    </div>

             <div style="justify-content: center; display:flex;"data-wow-delay="400ms">
             <div class="col-lg-3 col-md-4" style="margin-top: 40px;">
                {{-- <div class="sponsor-item mx-4"> --}}
                    <a href="https://sulselprov.go.id/"  target="_blank"><img src="/Diskominfo/template/assets/img/sponsor/logo-sulsel.png" class="mb-3 mt-3" alt="sulselprov" style="width: 150px; height:100px; border:1px solid black; padding: 5px; background-size:cover; background-repeat: no-repeat; background-postion:center;"></a>
                {{-- </div> --}}
            </div>

             <div class="col-lg-3 col-md-4" style="margin-top: 40px;">
               {{-- <div class="sponsor-item"> --}}
                    <a href="https://satudata.sulselprov.go.id/"  target="_blank"><img src="/Diskominfo/template/assets/img/sponsor/logo-opendata.png" class="mb-3 mx-5 mt-3" alt="sulselprov" style="width: 170px; height:75px; border:1px solid black; padding: 10px; "></a>
                {{-- </div> --}}
            </div>
                        
                    {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/158926fa-c543-43a6-a42a-dc1238616484/SqGkM3kPUA.json" background="##FFFFFF" speed="0.8" style="width: 620px; height: 690px" loop  autoplay direction="1" mode="normal" ></lottie-player> --}}
                    </div>
                    
                </div>
            </div>
            
                <div class="col-lg-6" style="margin-bottom: 20px">
                <div class=" item-2 text-center fade-in-bottom" data-wow-delay="500ms">
                   
                    <div class="section-heading text-center section1">
                        {{-- <h2 class="sub-heading bg-white wow fade-in-bottom " data-wow-delay="400ms" style="font-size: x-large;">Permohonan Informasi</h2> --}}
                        
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-6 ">
                        <div class="service-item item-2 text-center wow fade-in-bottom" data-wow-delay="500ms">
                            
                            <div class="">
                                <img src="/Diskominfo/template/assets/img/info1.svg" alt="Permohonan Informasi" style= "width: 100em;">
                            </div>
                            <h4 class="pt-4"><a href="/front/formulir_permohonan/informasi" >Form Permohonan Informasi</a></h4>
                            
                            <a href="/front/formulir_permohonan/informasi"  class="read-more"
                                >Selangkapnya<i class="fa-solid fa-circle-chevron-right"></i
                            ></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="service-item text-center wow fade-in-bottom" data-wow-delay="600ms" style="--mt-color-theme-primary: #ff8c91">
                            
                            <div class="service">
                                <img src="/Diskominfo/template/assets/img/info2.svg" alt="service">
                            </div>
                            <h4 class="pt-4"><a href="/front/formulir_pengajuan/keberatan" >Form Pengajuan Keberatan</a></h4>
                            
                            <a href="/front/formulir_pengajuan/keberatan"  class="read-more"
                                >Selengkapnya<i class="fa-solid fa-circle-chevron-right"></i
                            ></a>
                        </div>
                    </div>
                </div>
                    
                </div>
            </div>
            
           
            
        </div>
    </div>
</section>

<!-- ./ counter-section -->

<section class="service-section bg-grey pt-100 pb-100 d-none">
    <div class="container">
        <div class="section-heading text-center">
            <h4 class="sub-heading bg-white wow fade-in-bottom" data-wow-delay="400ms">Kegiatan</h4>
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="500ms">Kegiatan Terbaru Kami</h2>
        </div>
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-item text-center wow fade-in-bottom" data-wow-delay="400ms" style="--mt-color-theme-primary: #ffc330">
                    <div class="shape">
                        <svg
                            style="
                                shape-rendering: geometricPrecision;
                                text-rendering: geometricPrecision;
                                image-rendering: optimizeQuality;
                                fill-rule: evenodd;
                                clip-rule: evenodd;
                            "
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g>
                                <path
                                    d="M 30.5,-0.5 C 35.8333,-0.5 41.1667,-0.5 46.5,-0.5C 46.5,4.5 46.5,9.5 46.5,14.5C 51.8333,14.5 57.1667,14.5 62.5,14.5C 62.5,19.8333 62.5,25.1667 62.5,30.5C 67.5,30.5 72.5,30.5 77.5,30.5C 77.5,35.8333 77.5,41.1667 77.5,46.5C 72.5,46.5 67.5,46.5 62.5,46.5C 62.5,51.8333 62.5,57.1667 62.5,62.5C 57.1667,62.5 51.8333,62.5 46.5,62.5C 46.5,67.5 46.5,72.5 46.5,77.5C 41.1667,77.5 35.8333,77.5 30.5,77.5C 30.5,72.5 30.5,67.5 30.5,62.5C 25.1667,62.5 19.8333,62.5 14.5,62.5C 14.5,57.1667 14.5,51.8333 14.5,46.5C 9.5,46.5 4.5,46.5 -0.5,46.5C -0.5,41.1667 -0.5,35.8333 -0.5,30.5C 4.5,30.5 9.5,30.5 14.5,30.5C 14.5,25.1667 14.5,19.8333 14.5,14.5C 19.8333,14.5 25.1667,14.5 30.5,14.5C 30.5,9.5 30.5,4.5 30.5,-0.5 Z M 33.5,1.5 C 36.8333,1.5 40.1667,1.5 43.5,1.5C 43.5,5.16667 43.5,8.83333 43.5,12.5C 40.1667,12.5 36.8333,12.5 33.5,12.5C 33.5,8.83333 33.5,5.16667 33.5,1.5 Z M 31.5,15.5 C 36.1667,15.5 40.8333,15.5 45.5,15.5C 45.5,20.5 45.5,25.5 45.5,30.5C 40.8333,30.5 36.1667,30.5 31.5,30.5C 31.5,25.5 31.5,20.5 31.5,15.5 Z M 17.5,17.5 C 21.1667,17.5 24.8333,17.5 28.5,17.5C 28.5,21.1667 28.5,24.8333 28.5,28.5C 24.8333,28.5 21.1667,28.5 17.5,28.5C 17.5,24.8333 17.5,21.1667 17.5,17.5 Z M 48.5,17.5 C 52.1667,17.5 55.8333,17.5 59.5,17.5C 59.5,21.1667 59.5,24.8333 59.5,28.5C 55.8333,28.5 52.1667,28.5 48.5,28.5C 48.5,24.8333 48.5,21.1667 48.5,17.5 Z M 15.5,31.5 C 20.5,31.5 25.5,31.5 30.5,31.5C 30.5,36.1667 30.5,40.8333 30.5,45.5C 25.5,45.5 20.5,45.5 15.5,45.5C 15.5,40.8333 15.5,36.1667 15.5,31.5 Z M 46.5,31.5 C 51.5,31.5 56.5,31.5 61.5,31.5C 61.5,36.1667 61.5,40.8333 61.5,45.5C 56.5,45.5 51.5,45.5 46.5,45.5C 46.5,40.8333 46.5,36.1667 46.5,31.5 Z M 1.5,33.5 C 5.16667,33.5 8.83333,33.5 12.5,33.5C 12.5,36.8333 12.5,40.1667 12.5,43.5C 8.83333,43.5 5.16667,43.5 1.5,43.5C 1.5,40.1667 1.5,36.8333 1.5,33.5 Z M 33.5,33.5 C 36.8333,33.5 40.1667,33.5 43.5,33.5C 43.5,36.8333 43.5,40.1667 43.5,43.5C 40.1667,43.5 36.8333,43.5 33.5,43.5C 33.5,40.1667 33.5,36.8333 33.5,33.5 Z M 64.5,33.5 C 68.1667,33.5 71.8333,33.5 75.5,33.5C 75.5,36.8333 75.5,40.1667 75.5,43.5C 71.8333,43.5 68.1667,43.5 64.5,43.5C 64.5,40.1667 64.5,36.8333 64.5,33.5 Z M 31.5,46.5 C 36.1667,46.5 40.8333,46.5 45.5,46.5C 45.5,51.5 45.5,56.5 45.5,61.5C 40.8333,61.5 36.1667,61.5 31.5,61.5C 31.5,56.5 31.5,51.5 31.5,46.5 Z M 17.5,48.5 C 21.1667,48.5 24.8333,48.5 28.5,48.5C 28.5,52.1667 28.5,55.8333 28.5,59.5C 24.8333,59.5 21.1667,59.5 17.5,59.5C 17.5,55.8333 17.5,52.1667 17.5,48.5 Z M 48.5,48.5 C 52.1667,48.5 55.8333,48.5 59.5,48.5C 59.5,52.1667 59.5,55.8333 59.5,59.5C 55.8333,59.5 52.1667,59.5 48.5,59.5C 48.5,55.8333 48.5,52.1667 48.5,48.5 Z M 33.5,64.5 C 36.8333,64.5 40.1667,64.5 43.5,64.5C 43.5,68.1667 43.5,71.8333 43.5,75.5C 40.1667,75.5 36.8333,75.5 33.5,75.5C 33.5,71.8333 33.5,68.1667 33.5,64.5 Z">
                               </path>
                            </g>
                        </svg>
                       
                    </div>
                    <div class="service-icon">
                        <img src="/Diskominfo/template/assets/img/icon/service-1.png" alt="service">
                    </div>
                    <h3 class="title"><a href="#">Sistem Informasi Online Smart Office</a></h3>
                    <p>
                        Solusi Memudahkan dalam bertukar informasi  Humas di dinas komuniasi, Informatika, statistika dan persandian provinsi sulawesi selatan
                    </p>
                    <a href="#" class="read-more"
                        >Read More<i class="fa-solid fa-circle-chevron-right"></i
                    ></a>
                    
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item item-2 text-center wow fade-in-bottom" data-wow-delay="500ms">
                    <div class="shape">
                        <svg
                            style="
                                shape-rendering: geometricPrecision;
                                text-rendering: geometricPrecision;
                                image-rendering: optimizeQuality;
                                fill-rule: evenodd;
                                clip-rule: evenodd;
                            "
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                        >
                            <g>
                                <path
                                    d="M 30.5,-0.5 C 35.8333,-0.5 41.1667,-0.5 46.5,-0.5C 46.5,4.5 46.5,9.5 46.5,14.5C 51.8333,14.5 57.1667,14.5 62.5,14.5C 62.5,19.8333 62.5,25.1667 62.5,30.5C 67.5,30.5 72.5,30.5 77.5,30.5C 77.5,35.8333 77.5,41.1667 77.5,46.5C 72.5,46.5 67.5,46.5 62.5,46.5C 62.5,51.8333 62.5,57.1667 62.5,62.5C 57.1667,62.5 51.8333,62.5 46.5,62.5C 46.5,67.5 46.5,72.5 46.5,77.5C 41.1667,77.5 35.8333,77.5 30.5,77.5C 30.5,72.5 30.5,67.5 30.5,62.5C 25.1667,62.5 19.8333,62.5 14.5,62.5C 14.5,57.1667 14.5,51.8333 14.5,46.5C 9.5,46.5 4.5,46.5 -0.5,46.5C -0.5,41.1667 -0.5,35.8333 -0.5,30.5C 4.5,30.5 9.5,30.5 14.5,30.5C 14.5,25.1667 14.5,19.8333 14.5,14.5C 19.8333,14.5 25.1667,14.5 30.5,14.5C 30.5,9.5 30.5,4.5 30.5,-0.5 Z M 33.5,1.5 C 36.8333,1.5 40.1667,1.5 43.5,1.5C 43.5,5.16667 43.5,8.83333 43.5,12.5C 40.1667,12.5 36.8333,12.5 33.5,12.5C 33.5,8.83333 33.5,5.16667 33.5,1.5 Z M 31.5,15.5 C 36.1667,15.5 40.8333,15.5 45.5,15.5C 45.5,20.5 45.5,25.5 45.5,30.5C 40.8333,30.5 36.1667,30.5 31.5,30.5C 31.5,25.5 31.5,20.5 31.5,15.5 Z M 17.5,17.5 C 21.1667,17.5 24.8333,17.5 28.5,17.5C 28.5,21.1667 28.5,24.8333 28.5,28.5C 24.8333,28.5 21.1667,28.5 17.5,28.5C 17.5,24.8333 17.5,21.1667 17.5,17.5 Z M 48.5,17.5 C 52.1667,17.5 55.8333,17.5 59.5,17.5C 59.5,21.1667 59.5,24.8333 59.5,28.5C 55.8333,28.5 52.1667,28.5 48.5,28.5C 48.5,24.8333 48.5,21.1667 48.5,17.5 Z M 15.5,31.5 C 20.5,31.5 25.5,31.5 30.5,31.5C 30.5,36.1667 30.5,40.8333 30.5,45.5C 25.5,45.5 20.5,45.5 15.5,45.5C 15.5,40.8333 15.5,36.1667 15.5,31.5 Z M 46.5,31.5 C 51.5,31.5 56.5,31.5 61.5,31.5C 61.5,36.1667 61.5,40.8333 61.5,45.5C 56.5,45.5 51.5,45.5 46.5,45.5C 46.5,40.8333 46.5,36.1667 46.5,31.5 Z M 1.5,33.5 C 5.16667,33.5 8.83333,33.5 12.5,33.5C 12.5,36.8333 12.5,40.1667 12.5,43.5C 8.83333,43.5 5.16667,43.5 1.5,43.5C 1.5,40.1667 1.5,36.8333 1.5,33.5 Z M 33.5,33.5 C 36.8333,33.5 40.1667,33.5 43.5,33.5C 43.5,36.8333 43.5,40.1667 43.5,43.5C 40.1667,43.5 36.8333,43.5 33.5,43.5C 33.5,40.1667 33.5,36.8333 33.5,33.5 Z M 64.5,33.5 C 68.1667,33.5 71.8333,33.5 75.5,33.5C 75.5,36.8333 75.5,40.1667 75.5,43.5C 71.8333,43.5 68.1667,43.5 64.5,43.5C 64.5,40.1667 64.5,36.8333 64.5,33.5 Z M 31.5,46.5 C 36.1667,46.5 40.8333,46.5 45.5,46.5C 45.5,51.5 45.5,56.5 45.5,61.5C 40.8333,61.5 36.1667,61.5 31.5,61.5C 31.5,56.5 31.5,51.5 31.5,46.5 Z M 17.5,48.5 C 21.1667,48.5 24.8333,48.5 28.5,48.5C 28.5,52.1667 28.5,55.8333 28.5,59.5C 24.8333,59.5 21.1667,59.5 17.5,59.5C 17.5,55.8333 17.5,52.1667 17.5,48.5 Z M 48.5,48.5 C 52.1667,48.5 55.8333,48.5 59.5,48.5C 59.5,52.1667 59.5,55.8333 59.5,59.5C 55.8333,59.5 52.1667,59.5 48.5,59.5C 48.5,55.8333 48.5,52.1667 48.5,48.5 Z M 33.5,64.5 C 36.8333,64.5 40.1667,64.5 43.5,64.5C 43.5,68.1667 43.5,71.8333 43.5,75.5C 40.1667,75.5 36.8333,75.5 33.5,75.5C 33.5,71.8333 33.5,68.1667 33.5,64.5 Z">
                               </path>
                            </g>
                        </svg>
                    </div>
                    <div class="service-icon">
                        <img src="/Diskominfo/template/assets/img/icon/service-2.png" alt="service">
                    </div>
                    <h3 class="title"><a href="#">Pengembangan SDM Kominfo</a></h3>
                    <p>
                        Pelatihan pengembangan SDM Humas di dinas komuniasi, Informatika, statistika dan persandian provinsi sulawesi selatan 
                    </p>
                    <a href="#" class="read-more"
                        >Read More<i class="fa-solid fa-circle-chevron-right"></i
                    ></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item text-center wow fade-in-bottom" data-wow-delay="600ms" style="--mt-color-theme-primary: #ff8c91">
                    <div class="shape">
                        <svg
                            style="
                                shape-rendering: geometricPrecision;
                                text-rendering: geometricPrecision;
                                image-rendering: optimizeQuality;
                                fill-rule: evenodd;
                                clip-rule: evenodd;
                            "
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                        >
                            <g>
                                <path
                                    d="M 30.5,-0.5 C 35.8333,-0.5 41.1667,-0.5 46.5,-0.5C 46.5,4.5 46.5,9.5 46.5,14.5C 51.8333,14.5 57.1667,14.5 62.5,14.5C 62.5,19.8333 62.5,25.1667 62.5,30.5C 67.5,30.5 72.5,30.5 77.5,30.5C 77.5,35.8333 77.5,41.1667 77.5,46.5C 72.5,46.5 67.5,46.5 62.5,46.5C 62.5,51.8333 62.5,57.1667 62.5,62.5C 57.1667,62.5 51.8333,62.5 46.5,62.5C 46.5,67.5 46.5,72.5 46.5,77.5C 41.1667,77.5 35.8333,77.5 30.5,77.5C 30.5,72.5 30.5,67.5 30.5,62.5C 25.1667,62.5 19.8333,62.5 14.5,62.5C 14.5,57.1667 14.5,51.8333 14.5,46.5C 9.5,46.5 4.5,46.5 -0.5,46.5C -0.5,41.1667 -0.5,35.8333 -0.5,30.5C 4.5,30.5 9.5,30.5 14.5,30.5C 14.5,25.1667 14.5,19.8333 14.5,14.5C 19.8333,14.5 25.1667,14.5 30.5,14.5C 30.5,9.5 30.5,4.5 30.5,-0.5 Z M 33.5,1.5 C 36.8333,1.5 40.1667,1.5 43.5,1.5C 43.5,5.16667 43.5,8.83333 43.5,12.5C 40.1667,12.5 36.8333,12.5 33.5,12.5C 33.5,8.83333 33.5,5.16667 33.5,1.5 Z M 31.5,15.5 C 36.1667,15.5 40.8333,15.5 45.5,15.5C 45.5,20.5 45.5,25.5 45.5,30.5C 40.8333,30.5 36.1667,30.5 31.5,30.5C 31.5,25.5 31.5,20.5 31.5,15.5 Z M 17.5,17.5 C 21.1667,17.5 24.8333,17.5 28.5,17.5C 28.5,21.1667 28.5,24.8333 28.5,28.5C 24.8333,28.5 21.1667,28.5 17.5,28.5C 17.5,24.8333 17.5,21.1667 17.5,17.5 Z M 48.5,17.5 C 52.1667,17.5 55.8333,17.5 59.5,17.5C 59.5,21.1667 59.5,24.8333 59.5,28.5C 55.8333,28.5 52.1667,28.5 48.5,28.5C 48.5,24.8333 48.5,21.1667 48.5,17.5 Z M 15.5,31.5 C 20.5,31.5 25.5,31.5 30.5,31.5C 30.5,36.1667 30.5,40.8333 30.5,45.5C 25.5,45.5 20.5,45.5 15.5,45.5C 15.5,40.8333 15.5,36.1667 15.5,31.5 Z M 46.5,31.5 C 51.5,31.5 56.5,31.5 61.5,31.5C 61.5,36.1667 61.5,40.8333 61.5,45.5C 56.5,45.5 51.5,45.5 46.5,45.5C 46.5,40.8333 46.5,36.1667 46.5,31.5 Z M 1.5,33.5 C 5.16667,33.5 8.83333,33.5 12.5,33.5C 12.5,36.8333 12.5,40.1667 12.5,43.5C 8.83333,43.5 5.16667,43.5 1.5,43.5C 1.5,40.1667 1.5,36.8333 1.5,33.5 Z M 33.5,33.5 C 36.8333,33.5 40.1667,33.5 43.5,33.5C 43.5,36.8333 43.5,40.1667 43.5,43.5C 40.1667,43.5 36.8333,43.5 33.5,43.5C 33.5,40.1667 33.5,36.8333 33.5,33.5 Z M 64.5,33.5 C 68.1667,33.5 71.8333,33.5 75.5,33.5C 75.5,36.8333 75.5,40.1667 75.5,43.5C 71.8333,43.5 68.1667,43.5 64.5,43.5C 64.5,40.1667 64.5,36.8333 64.5,33.5 Z M 31.5,46.5 C 36.1667,46.5 40.8333,46.5 45.5,46.5C 45.5,51.5 45.5,56.5 45.5,61.5C 40.8333,61.5 36.1667,61.5 31.5,61.5C 31.5,56.5 31.5,51.5 31.5,46.5 Z M 17.5,48.5 C 21.1667,48.5 24.8333,48.5 28.5,48.5C 28.5,52.1667 28.5,55.8333 28.5,59.5C 24.8333,59.5 21.1667,59.5 17.5,59.5C 17.5,55.8333 17.5,52.1667 17.5,48.5 Z M 48.5,48.5 C 52.1667,48.5 55.8333,48.5 59.5,48.5C 59.5,52.1667 59.5,55.8333 59.5,59.5C 55.8333,59.5 52.1667,59.5 48.5,59.5C 48.5,55.8333 48.5,52.1667 48.5,48.5 Z M 33.5,64.5 C 36.8333,64.5 40.1667,64.5 43.5,64.5C 43.5,68.1667 43.5,71.8333 43.5,75.5C 40.1667,75.5 36.8333,75.5 33.5,75.5C 33.5,71.8333 33.5,68.1667 33.5,64.5 Z">
                               </path>
                            </g>
                        </svg>
                    </div>
                    <div class="service-icon">
                        <img src="/Diskominfo/template/assets/img/icon/service-3.png" alt="service">
                    </div>
                    <h3 class="title"><a href="#">Pengelolaan Website Berita OPD</a></h3>
                    <p>
                        Pelatihan pengembangan Website di dinas komuniasi, Informatika, statistika dan persandian provinsi sulawesi selatan
                    </p>
                    <a href="service-details.html" class="read-more"
                        >Read More<i class="fa-solid fa-circle-chevron-right"></i
                    ></a>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- ./ service-section -->


<!-- ./ skill-section -->
<section class="blog-section pt-70 pb-100">
    <div class="container">
        
        <div class="section-heading text-center ">
            <div class="text-center">
                <h4 class="sub-heading wow fade-in-bottom " data-wow-delay="400ms">Berita</h4>
            </div>
            <div class="row">
                <div class="col-lg-12" >
                    <h2 class="section-title wow fade-in-bottom align-baseline  " data-wow-delay="600ms">Berita Terbaru Kami</h2>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 beritaborder">
                <div class="blog-carousel-wrap">
                    <div class="blog-carousel swiper">
                        <div class="swiper-wrapper swiper-container">
                            @foreach (getPost('berita-utama', 0,6) as $post )                       
                            <div class="swiper-slide">
                                <div class="post-card">
                                    <div class="post-thumb">
                                        {{-- <img src="{{asset('storage/'. $post->image)}}" alt="{{ $post->title}}"> --}}
                                         <img src="{{ asset('storage/'. $post->image)}}" alt="{{ $post->title}}" style="width: 225px; height:150px;">
                                        {{-- <a href="#" class="category">Solution</a> --}}
                                        
                                    </div>
                                    <div class="post-content-wrap">
                                        <div class="post-content">
                                            <ul class="post-meta">
                                                <li><i class="fa-light fa-calendar px-2"></i>{{date('d M Y',strtotime($post->created_at))}}</li>
                                                {{-- <li>Comments (02)</li> --}}
                                            </ul>
                                            <h5 class="">
                                                <a href="{{route('post.slug',$post->slug)}}"
                                                    >{!! \Illuminate\Support\Str::limit($post->title , 100) !!}</a
                                                >
                                            </h5>
                                            {{-- <p class="desc">
                                                Komisi Informasi (KI) Pusat Republik Indonesia (RI) melaksanakan kegiatan visitasi Apresiasi Keterbukaan Informasi Publik Desa...
                                            </p> --}}
                                        </div>
                                        <div class="post-review-wrap">
                                            
                                            <a href="{{route('post.slug',$post->slug)}}"
                                                >Baca Selengkapnya  <i class="fa-solid fa-circle-chevron-right"></i
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            @endforeach
                          
                         
                        </div>
                        
                        <!-- Carousel Dots -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
             
                <div class="sidebar-widget sticky-widget">
                    <h3 class="widget-title">Berita Terpopuler</h3>
                     @foreach (getPost('berita-utama',0,3) as $key )
                     <div class="sidebar-post">
                        <img src="{{asset('storage/'.$key->image)}}" alt="post">
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-light fa-calendar"></i>{{date('d M Y',strtotime($key->created_at))}}</li>
                            </ul>
                            <h3 class="title"><a href="{{route('post.slug',$key->slug)}}">{!! substr(strip_tags(explode('<!--more-->', $key->title)[0]), 0, 72) !!}...</a></h3>
                            
                        </div>
                    </div>
                     @endforeach
                   
                    <div class="col-lg-12 pt-4" >
                        <button class="btn btn-primary "> <a href="/semua-berita" target="_blank">Lihat Semua Berita ></a> </button>
                    </div>
                   
                </div>

            
           

             
            {{-- @include('Html.BeritaPopuler') --}}
                
            </div>
            {{-- <div class="row mt-2" style="overflow:hidden;">
                <div class="col-lg-4 ms-auto">
                    <div class="sidebar-widget sticky-widget">
                        <h3 class="widget-title">Opini</h3>
                         @foreach ($opini as $key )
                         <div class="sidebar-post">
                            <img src="{{asset('storage/'.$key->image)}}" alt="post">
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><i class="fa-light fa-calendar"></i>{{date('d M Y',strtotime($key->created_at))}}</li>
                                </ul>
                                <h3 class="title"><a href="{{route('post.slug',$key->slug)}}">{!! substr(strip_tags(explode('<!--more-->', $key->title)[0]), 0, 72) !!}...</a></h3>
                                
                            </div>
                        </div>
                         @endforeach
                       
                        <div class="col-lg-12 pt-4 d-none" >
                            <button class="btn btn-primary"> <a href="/semua-berita" target="_blank">Lihat Semua Berita ></a> </button>
                        </div>
                       
                    </div>
                </div>
            </div> --}}
        </div>
         {{-- Bidang Humass --}}
        <div class="row mt-25">
            <div class="col-lg-12 mb-30" style="background-color: rgb(240, 252, 255);">
                <div class="sidebar-widget sticky-widget ">
        
                
               
                <div class="col-lg-12 col-md-6 pt-20">
                    <div class="judul-berita text-center" style="border-bottom: 2px solid #1f3ce3;">
                        <h4 class="taging">Kegiatan</h4>
                    </div>
                    <div class="row side-bar-widget mt-20">
                        @foreach ($beritaUtama as $key )
                        <div class="col-md-4 widget-popular-post p-2">
                            <div class="sidebar-post">
                                <img src="{{asset('storage/'.$key->image)}}" alt="post">
                                <div class="post-content">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <span><i class="fa-light fa-calendar"></i>{{ \Carbon\Carbon::parse($key->created_at)->format('d-m-Y') }}</span> 
                                        </div>
                                        <div class="col">
                                            <span class="category rounded-3 p-1 text-white" style="background-color: blue;">{{ $key->name }}</span>
                                        </div>
                                    </div>
                                    {{-- <ul class="post-meta">
                                        <li><i class="fa-light fa-calendar"></i>{{ \Carbon\Carbon::parse($key->created_at)->format('d-m-Y') }}
                                        
                                        </li>
                                      
                                    </ul> --}}
                                    <h3 class="title text-justify pt-4"><a href="{{ route('post.slug', $key->slug)}}"> {{ $key->title }}</a></h3>
                                    <div class="post-review-wrap mt-2">
                                            
                                        <a href="{{route('post.slug',$post->slug)}}"
                                            >Baca Selengkapnya  <i class="fa-solid fa-circle-chevron-right"></i
                                        ></a>
                                    </div>

                                  
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                        <div class="row text-center">
                            <div class="col-lg-12 pt-4" >
                                <button class="btn btn-primary "> <a href="/semua-berita">Lihat Semua Kegiatan></a> </button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            </div>
        </div>
        

        <div class="row mt-25">
            <div class="col-lg-12 mb-30" style="background-color: rgb(240, 252, 255);">
                <div class="sidebar-widget sticky-widget ">
        
                
               
                <div class="col-lg-12 col-md-6 pt-20">
                    <div class="judul-berita text-center" style="border-bottom: 2px solid #1f3ce3;">
                        <h4 class="taging">Opini</h4>
                    </div>
                    <div class="row side-bar-widget mt-20">
                        @foreach ($opini as $key )
                        <div class="col-md-4 widget-popular-post p-2">
                            <div class="sidebar-post">
                                <img src="{{asset('storage/'.$key->image)}}" alt="post" style="height: 100px;">
                                <div class="post-content">
                                    <div class="row d-flex">
                                        <div class="col">
                                            <span><i class="fa-light fa-calendar"></i>{{ \Carbon\Carbon::parse($key->created_at)->format('d-m-Y') }}</span> 
                                        </div>
                                        {{-- <div class="col">
                                            <span class="category rounded-3 p-1 text-white" style="background-color: blue;">{{ $key->name }}</span>
                                        </div> --}}
                                    </div>
                                    {{-- <ul class="post-meta">
                                        <li><i class="fa-light fa-calendar"></i>{{ \Carbon\Carbon::parse($key->created_at)->format('d-m-Y') }}
                                        
                                        </li>
                                      
                                    </ul> --}}
                                    <h3 class="title text-justify pt-4"><a href="{{ route('post.slug', $key->slug)}}">{{$key->title}}</a></h3>
                                    <div class="post-review-wrap mt-2">
                                            
                                        <a href="{{route('post.slug',$post->slug)}}"
                                            >Baca Selengkapnya  <i class="fa-solid fa-circle-chevron-right"></i
                                        ></a>
                                    </div>

                                  
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                        <div class="row text-center">
                            <div class="col-lg-12 pt-4" >
                                <button class="btn btn-primary "> <a href="/opini/all">Lihat Semua Opini></a> </button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            </div>
        </div>


    </div>
</section>

{{-- <div class='sk-ww-instagram-hashtag-feed' data-embed-id='25504153'></div> --}}



<section class="cta-section pt-70">
    <div class="cta-wrap" data-background="/Diskominfo/template/assets/img/bg-img/cta-bg.jpg">
        <div class="overlay"></div>
        <div class=""></div>
        <div class="cta-content wow fade-in-bottom" data-wow-delay="300ms">
            <a
                class="video-popup video-btn"
                data-autoplay="true"
                data-vbtype="video"
                href="https://www.youtube.com/watch?v=BwaHh8QXwlA"
                ><i class="fa-light fa-circle-play"></i>
                <div class="ripple"></div>
            </a>
            <h3 class="title wow fade-in-bottom" data-wow-delay="400ms">Mengenal Lebih Dekat Diskominfo-SP Sulsel</h3>
            <p class="wow fade-in-bottom" data-wow-delay="500ms">
                Dinas Komunikasi Informatika Statistik dan Persandian Provinsi Sulawesi Selatan
            </p>
            <!-- <a href="about.html" class="mt-primary-btn primary-2 wow fade-in-bottom" data-wow-delay="600ms">Video More</a> -->
        </div>
    </div>
</section>
<!-- ./ cta-section -->

{{-- Galeri video --}}
<section class="gallery-video blog-section py-4 pt-70" >
    <div class="section-heading text-center pt-50">
            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="400ms">Galeri Video</h4>
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="600ms">Galeri Video Kegiatan Kami</h2>
        </div>
  <div class="card  p-5" style="background-color: #ebf4ff; opacity:1.0;">
    <div class="container">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          @foreach ($featuredVideos as $video)
        
          <div class="swiper-slide">
             
            <div class="video-item">
              @if(!empty($video->video))
              <a href="{{ asset('video-kegiatan/'. $video->video) }}">
                <iframe src="{{ asset('video-kegiatan/'. $video->video) }}" 
              title="{{ $video->judul }}" frameborder="0"
               allow="accelerometer; autoplay; off; encrypted-media; gyroscope; picture-in-picture; web-share" 
               referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="width: 600px; height:300px;"></iframe>
              </a>
              @endif
              <h6 class="mt-2 fw-bold text-center">{{ $video->judul }}</h6>
              <p class="text-muted text-center">{{ date('d-m-Y', strtotime($video->created_at)) }}</p>
            </div>
              
          </div>
         
          @endforeach
        </div>

        <!-- Navigasi Slider (Tombol Prev dan Next) -->
       
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination" style="padding-top: 40px"></div>
      </div>
      {{-- @endif --}}
    </div>
  </div>
</section>



{{-- end galeri --}}

<section class="project-section pt-5 pb-100">
    <div class="project-container">
        <div class="section-heading text-center">
            <h4 class="sub-heading wow fade-in-bottom" data-wow-delay="400ms">Galeri </h4>
            <h2 class="section-title wow fade-in-bottom" data-wow-delay="600ms">Galeri Foto Kegiatan Kami</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="photo-gallery mb-40">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
                            @foreach (getGaleriKegiatan() as $galleri)
                            <div class="col">
                                @php
                                $images = json_decode($galleri->images);
                                $firstImage = collect($images)->first(); // Mengambil gambar pertama
                                @endphp
                                <a class="gallery-item bg-color bg-white" href="{{asset('storage/'.$firstImage)}}" data-images="{{json_encode($images)}}" data-bs-toggle="modal" data-bs-target="#lightbox-modal">
                                    <div class="raflicakep"> 
                                        <img src="{{asset('storage/'.$firstImage)}}" class="img-fluid rounded-4" alt="Gallery Image">
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                
                
                <div class="modal fade lightbox-modal" id="lightbox-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="lightbox-content">
                                    <!-- Carousel content will be injected here by JS -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
              <div class="col-lg-12 text-center mt-3" >
                <button class="btn btn-light btn-lg "><a href="{{route('galeri.all')}}">Lihat Semua Galeri ></a> </button>
            </div>
        </div>

    </div>
</section>
<section class="counter-section mb-40 pt-">
    <div class="bg-color"></div>
    <div class="container">
        <div class="section-heading text-center" style="margin-bottom: 20px;">
            <div class="text-center">
                <h4 class="sub-heading wow fade-in-bottom " data-wow-delay="400ms">Pengunjung Website </h4>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item wow fade-in-bottom" data-wow-delay="300ms">
                    <div class="shape"><img src="/Diskominfo/template/assets/img/shapes/counter-shape.png" alt="shape"></div>
                    <!-- <div class="counter-icon"><img src="/Diskominfo/template/assets/img/icon/counter-1.png" alt="counter"></div> -->
                    <h3 class="title"><span class="odometer" data-count="{{ $hitstat['total'] }}">{{ $hitstat['total'] }}</span></h3>
                    <p>Total Keseluruhan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item wow fade-in-bottom" data-wow-delay="400ms" style="--mt-color-theme-secondary: #f792ff">
                    <div class="shape"><img src="/Diskominfo/template/assets/img/shapes/counter-shape.png" alt="shape"></div>
                    <!-- <div class="counter-icon"><img src="/Diskominfo/template/assets/img/icon/counter-2.png" alt="counter"></div> -->
                    <h3 class="title"><span class="odometer" data-count="{{ $hitstat['month'] }}">{{ $hitstat['month'] }}</span></h3>
                    <p>Bulan Ini</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item wow fade-in-bottom" data-wow-delay="500ms" style="--mt-color-theme-secondary: #ff8c91">
                    <div class="shape"><img src="/Diskominfo/template/assets/img/shapes/counter-shape.png" alt="shape"></div>
                    <!-- <div class="counter-icon"><img src="/Diskominfo/template/assets/img/icon/counter-3.png" alt="counter"></div> -->
                    <h3 class="title"><span class="odometer" data-count="{{ $hitstat['today'] }}">{{ $hitstat['today'] }}</span></h3>
                    <p>Minggu Ini</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fade-in-bottom" data-wow-delay="600ms">
                <div class="counter-item" style="--mt-color-theme-secondary: #a6e155">
                    <div class="shape"><img src="/Diskominfo/template/assets/img/shapes/counter-shape.png" alt="shape"></div>
                    <!-- <div class="counter-icon"><img src="/Diskominfo/template/assets/img/icon/counter-4.png" alt="counter"></div> -->
                    <h3 class="title"><span class="odometer" data-count="{{ number_format($hitstat['today']) }}">{{ number_format($hitstat['today']) }}</span></h3>
                    <p>Hari ini</p>
                </div>
            </div>
        </div>
    <br>
    <br>
    </div>
</section>

{{-- @include('Html.Footer') --}}
<!-- ./ project-section -->
@endsection

@section('js')
<script>
  const swiper = new Swiper('.mySwiper', {
    loop: true,
    slidesPerView: 2,  // Menampilkan 3 video per slide
    spaceBetween: 130,   // Jarak antar slide
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
</script>
@endsection