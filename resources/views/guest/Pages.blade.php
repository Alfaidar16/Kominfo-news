@extends('guest.layouts.Guest')
@section('title')
{{ $title }}
@endsection
@section('content')

{{-- <section>
    <div class="">
        <div class="row">
            <div class="col-12">
                <img src="/Diskominfo/template/assets/img/bg-img/BANNER KOMINFO.png" alt="" width="100%">
            </div>
        </div>
        <div class="hero-shapes">
            <img class="hero-shape shape-1" src="/Diskominfo/template/assets/img/shapes/hero-anim-3.png" alt="shapes">
            <img class="hero-shape shape-2" src="/Diskominfo/template/assets/img/shapes/hero-anim-2.png" alt="shapes" style="width: 150px;">
            <img class="hero-shape shape-3" src="/Diskominfo/template/assets/img/shapes/hero-anim-3.png" alt="shapes">
        </div>
        
    </div>
 </section> --}}

<section class="blog-details pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content md-pb-40">
                    <h2 class="details-title">{{$model->title}}</h2>
                    @if(!empty($model->image))
                    <img src="{{asset('storage/'.$model->image)}}" alt="  {{asset('storage/'.$model->image)}}" class="img-responsive text-center">
                    @endif
                    @if(!empty($model->body))
                    <p>{!! $model->body !!}</p>
                    @endif
                 
                </div>
            </div>
            <div class="col-lg-4">
                @include('guest.Html.BeritaPopular')
            </div>
         
        </div>
     
    </div>
</section>

{{-- @include('guest.Html.Footer') --}}


@endsection
