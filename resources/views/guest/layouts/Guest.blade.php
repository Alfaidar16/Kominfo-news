{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- Site Title -->
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('/adminlte/assets/img/logo_kominfo.png')}}" />

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/Diskominfo/template/assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/venobox.min.css">
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/animate.min.css">
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/keyframe-animation.css">
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/odometer.min.css">
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/swiper.min.css">
    <link rel="stylesheet" href="/Diskominfo/template/assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'> -->
</head>
<style>
    .raflicakep {
        width: 375px;
        height: 275px;
        overflow: hidden;
    }

    .raflicakep img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .taging {
        background-color: #1f3ce3;
        border-radius: 0;
        padding-left: 10px;
        padding-right: 10px;
        text-align: center;
        display: inline;
        color: white;
        border-bottom: 4px solid #1f3ce3;
        font-size: 19px;
    }
</style>

<body>
    @include('guest.layouts.Html')
    <!-- ./ sponsor-section -->
@if (Request::is('page/*')  || Request::is('/') || Request::is('semua-galeri'))
    <section>
        <div class="">
            <div class="row">
                @php
                    $banner = DB::table('header')->where('active', 2)->first();
                @endphp
                @if ($banner)
                    <div class="col-12">
                        <img src="{{ asset('header/' . $banner->image) }}" alt="" width="100%">
                    </div>
                @endif
            </div>
            <div class="hero-shapes">
                <img class="hero-shape shape-1" src="/Diskominfo/template/assets/img/shapes/hero-anim-3.png"
                    alt="shapes">
                <img class="hero-shape shape-2" src="/Diskominfo/template/assets/img/shapes/hero-anim-2.png"
                    alt="shapes" style="width: 150px;">
                <img class="hero-shape shape-3" src="/Diskominfo/template/assets/img/shapes/hero-anim-3.png"
                    alt="shapes">
            </div>
        </div>
    </section>
@endif

    @yield('content')
    @include('guest.Html.Footer')
    {{-- @include('Html.Footer') --}}
    <!--scrollup-->

    <!-- JS here -->
    <!-- Slick JS -->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
    </script> --}}

    <script src="/Diskominfo/template/assets/js/vendor/jquary-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
    </script>
    <script src="/Diskominfo/template/assets/js/vendor/bootstrap-bundle.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/imagesloaded-pkgd.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/waypoints.min.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/venobox.min.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/odometer.min.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/meanmenu.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/smooth-scroll.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/jquery.isotope.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/wow.min.js"></script>
    <script src="/Diskominfo/template/assets/js/vendor/swiper.min.js"></script>
    <script src="/Diskominfo/template/assets/js/ajax-form.js"></script>
    <script src="/Diskominfo/template/assets/js/main.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
    <!-- jsvectormap -->
    @if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        Swal.fire({
            title: 'Gagal!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    <script>
        $(document).ready(function(){
              $('.dropdown-submenu a.test').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
              });
            });
    </script>
</body>

</html>