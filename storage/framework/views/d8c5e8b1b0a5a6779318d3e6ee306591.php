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
                            <?php
                                $menuUtama = DB::table('menu_itemss')->where('parent_id', '=', null)->where('menus_id', 3)->orderBy('id', 'ASC')->get();
                            ?>
                            <?php $__currentLoopData = $menuUtama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo e($menu->url); ?>"><?php echo e($menu->title); ?></a>
                                    <ul>
                                        <?php
                                            $subMenu1 = DB::table('menu_itemss')->where('parent_id', '=', $menu->id)->orderBy('id', 'DESC')->get();
                                        ?>
                                        <?php $__currentLoopData = $subMenu1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $subMenu2 = DB::table('menu_itemss')->where('parent_id', '=', $key->id)->orderBy('id', 'DESC')->get();
                                            ?>
                                        <li>
                                            
                                            <a href="<?php echo e($key->url); ?>"><?php echo e($key->title); ?></a>
                                        
                                            <ul class="idarcakep">
                                                <?php $__currentLoopData = $subMenu2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $subMenu3 = DB::table('menu_itemss')->where('parent_id', '=', $v->id)->orderBy('id', 'DESC')->get();
                                                    ?>
                                                <li>
                                                    <a href="<?php echo e($v->url); ?>"><?php echo e($v->title); ?></a>

                                                    <ul class="idarcakep">
                                                        <?php $__currentLoopData = $subMenu3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e($x->url); ?>"><?php echo e($x->title); ?></a>
                                                            
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                                    </ul>
                                                
                                                </li>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                            </ul>
                                            
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                            
                            
                            
                            

                            <li class="menu-item-has-children">
                                <a href="<?php echo e(route('login')); ?>">Login</a>

                               
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

<?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/guest/layouts/Html.blade.php ENDPATH**/ ?>