 <!-- header-area-start -->
 <header class="header sticky-active" >
    <div class="header-container">
        <div class="primary-header">
            <div class="primary-header-inner" style="background-color: #ffffff;">
                <div class="header-logo d-lg-block">
                    <a href="/">
                        <img src="/Diskominfo/template/assets/img/logo/logo.png" alt="Logo" style="width:150px;">
                    </a>
                  
                </div>
               
                <div class="header-menu-wrap">    
                    <div class="mobile-menu-items">
                        
                        <ul class="sub-menu" >
                            <li class="menu-item-has-children">
                                <a href="#">Profil</a>
                                <ul>
                                    @php
                                        $subMenuProfil =  DB::table('group_menu_list')->where('menu_id','=', 1)->orderBy('id', 'DESC')->get();
                                        $subMenu2 = DB::table('group_menu_list')->where('sub_menu', '=', 16)->orderBy('id', 'ASC')->get();
                                    @endphp
                                      <li class="dropdown-item dropdown-submenu"><a href="#" >LHKPN/LHKAN</a>
                                         <ul class="idarcakep submenu dropdown-item" aria-labelledby="hom1">
                                        @foreach ($subMenu2 as $key )
                                        <li> 
                                            <a  href="{{ $key->url}}" class="dropdown-item test">{{$key->title}}</a>
                                        </li>
                                     @endforeach
                                     </ul>
                                    </li>
                                     @foreach ($subMenuProfil as $key )
                                     <li><a href="{{ $key->url}}" >{{$key->title}}</a></li>
                                     @endforeach
                                  </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Program</a>
                                <ul>
                                    @php
                                        $subMenuProgram =  DB::table('group_menu_list')->where('menu_id','=', 2)->orderBy('id', 'ASC')->get();
                                        $subMenu2 = DB::table('group_menu_list')->where('sub_menu', '=', 16)->orderBy('id', 'ASC')->get();
                                    @endphp
                                      {{-- <li class="dropdown-item dropdown-submenu"><a href="#" >LHKPN/LHKAN</a>
                                         <ul class="submenu dropdown-item" aria-labelledby="hom1">
                                        @foreach ($subMenu2 as $key )
                                        <li> 
                                            <a  href="{{ $key->url}}" class="dropdown-item test">{{$key->title}}</a>
                                        </li>
                                     @endforeach
                                      
                                     </ul>
                                    </li> --}}
                                     @foreach ($subMenuProgram as $key )
                                     <li><a href="{{ $key->url}}" >{{$key->title}}</a></li>
                                     @endforeach
                                  </ul>
                            </li>
                            {{-- <li class="menu-item-has-children active"  >
                                <a href="#">Program Kegiatan</a>
                                <ul>
                                   @php
                                     $program =  DB::table('menu_items')->where('parent_id',26)->orderBy('id' , 'asc')->get();
                                   @endphp
                                   @foreach ($program as $key)
                                   <li><a href="{{ $key->url }}">{{$key->title}}</a></li>
                                   @endforeach
                                   
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="service.html">Informasi Publik</a>

                                <ul>
                                  @php
                                      $informasi =  DB::table('menu_items')->where('parent_id','=', 56)->orderBy('id', 'asc')->get();
                                  @endphp
                                   @foreach ($informasi as $key )
                                   <li><a href="{{ $key->url}}"target="_blank">{{$key->title}}</a></li>
                                   @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Layanan</a>
                                <ul>
                                  @php
                                      $layanan = DB::table('menu_items')->where('parent_id', '=', 44)->orderBy('id','asc')->get();
                                  @endphp
                                  @foreach ($layanan as $key )
                                  <li><a href="{{ $key->url}}">{{$key->title}}</a></li>
                                  @endforeach
                                  
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="blog-grid.html">Regulasi</a>
                                <ul>
                                  @php
                                      $Regulasi = DB::table('menu_items')->where('parent_id','=', 45)->orderBy('id', 'asc')->get();
                                  @endphp
                                  @foreach ($Regulasi as $key )
                                  <li><a href="{{ $key->url }}" target="_blank">{{$key->title}}</a></li>
                                  @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children active">
                                <a href="index.html">Pelayanan Publik</a>
                                <ul>
                                   @php
                                       $Pelayanan = DB::table('menu_items')->where('parent_id', '=', 64)->orderBy('id', 'asc')->get();
                                   @endphp
                                   @foreach ($Pelayanan as $key )
                                   <li><a href="{{ $key->url }}" target="_blank">{{$key->title}}</a></li>
                                    
                                    
                                   @endforeach
                                    
                                </ul>
                            </li> --}}
                            
                            {{-- <li class="menu-item-has-children">
                                <a href="blog-grid.html">PPID</a>
                                <ul>
                                    <li><a href="https://ppid.sulselprov.go.id/layanan/permohonan-informasi"target="_blank">Permintaan Informasi</a></li>
                                    <li><a href="https://ppid.sulselprov.go.id/ppidpelaksana/diskominfo"target="_blank">PPID SUlsel</a></li>
                                    <li><a href="https://ppid.sulselprov.go.id/layanan/pengajuan-keberatan"target="_blank">Pengajuan Keberatan</a></li>
                                    
                                </ul>
                            </li> --}}
                            {{-- <li class="menu-item-has-children">
                                <a href="blog-grid.html">Survey</a>
                                <ul>
                                    <li><a href="#"target="_blank">Survey</a></li>
                                    <li><a href="#"target="_blank">Hasil Survey</a></li>
                                    
                                </ul>
                            </li> --}}

                            <li class="menu-item-has-children">
                                <a href="{{ route('login') }}">Login</a>

                               
                            </li>
                            
                        </ul>
                    </div>
                    <div class="header-right">
                        <!-- <a href="contact.html" class="mt-primary-btn header-btn">SP4N-LAPOR</a> -->
                        <div class="sidebar-icon">
                            
                            <button class="sidebar-trigger open">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <div class="header-logo d-none d-lg-none">
                            <a href="/">
                                <img src="/Diskominfo/template/assets/img/logo/logo.png" alt="Logo">
                            </a>
                        </div>
                        <div class="header-right-item">
                            <a href="javascript:void(0)" class="mobile-side-menu-toggle d-lg-none"
                                ><i class="fa-sharp fa-solid fa-bars"></i
                            ></a>
                        </div>
                        <div id="popup-search-box">
                            <div class="box-inner-wrap d-flex align-items-center">
                                <form id="form" class="popup-search" action="#" method="get" role="search">
                                    <input id="popup-search" type="text" name="s" placeholder="Search here...">
                                    <button id="popup-search-button" type="submit" name="submit">apahal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.header-right -->
                </div>
                <!-- /.header-menu-wrap -->
            </div>
            <!-- /.primary-header-inner -->
        </div>
        <!-- /.primary-header -->
    </div>
</header>
<!-- /.Main Header -->

<div id="popup-search-box">
    <div class="box-inner-wrap d-flex align-items-center">
        <form id="form" class="popup-search" action="#" method="get" role="search">
            <input id="popup-search" type="text" name="s" placeholder="Search here...">
            <button id="popup-search-button" type="submit" name="submit"></button>
        </form>
    </div>
</div>
<!-- /#popup-search-box -->

<div id="sidebar-area" class="sidebar-area">
    <button class="sidebar-trigger close">
        <svg
            class="sidebar-close"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            width="16px"
            height="12.7px"
            viewBox="0 0 16 12.7"
            style="enable-background: new 0 0 16 12.7"
            xml:space="preserve"
        >
            <g>
                <rect
                    x="0"
                    y="5.4"
                    transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.1569 7.5208)"
                    width="16"
                    height="2"
                ></rect>
                <rect
                    x="0"
                    y="5.4"
                    transform="matrix(0.7071 0.7071 -0.7071 0.7071 6.8431 -3.7929)"
                    width="16"
                    height="2"
                ></rect>
            </g>
        </svg>
    </button>
    <div class="side-menu-content">
        <div class="side-menu-logo">
            <img src="/Diskominfo/template/assets/img/logo/logo.png" alt="logo">
        </div>
        <div class="side-menu-about">
            <div class="side-menu-header">
                <h3>Tentang Kami</h3>
            </div>
            <p>Dinas Komunikasi Informasitka, Statistika, dan Persandian Provinsi Sulawesi Selatan</p>
            
        </div>
        <div class="side-menu-contact">
            <div class="side-menu-header">
                <h4>Contact Us</h4>
            </div>
            <ul class="side-menu-list">
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <p> Jl. Urip Sumoharjo No.269, Makassar, Sulawesi Selatan </p>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:0411-453203 / 0411-453489">0411-453203 / 0411-453489</a>
                </li>
                <li>
                    <i class="fas fa-envelope-open-text"></i>
                    <a href="mailto:diskominfoprovsulsel@gmail.com">diskominfoprovsulsel@gmail.com</a>
                </li>
            </ul>
        </div>
        <ul class="side-menu-social">
            <li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="instagram"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
            
        </ul>
    </div>
</div>
<!--/.sidebar-area-->

<div class="mobile-side-menu">
    <div class="side-menu-content">
        <div class="side-menu-head">
            <a href="/"><img src="/Diskominfo/template/assets/img/logo/logo.png" alt="logo" ></a>
            <button class="mobile-side-menu-close"><i class="fa-regular fa-xmark"></i></button>
        </div>
        <div class="side-menu-wrap"></div>
        
    </div>
</div>
<!-- /.mobile-side-menu -->
<div class="mobile-side-menu-overlay"></div>

{{-- <div id="preloader">
    <div class="preloader-close">x</div>
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div> --}}