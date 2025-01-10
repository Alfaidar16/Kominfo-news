@extends('guest.layouts.Guest')
@section('title')
{{ $title }}
@endsection
@section('content')
<section class="blog-details pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            @forelse ($model as $galeri )
            @php
            $serialize = json_decode($galeri->images);
            $image = collect($serialize)->first();
        @endphp
            <div class="blog-details-content md-pb-40">
                <img src="{{asset('storage/'.$image)}}">
                <a href="{{route('galeri.slug',$galeri->slug)}}">
                    <h3 class="details-title">{{$galeri->title}}</h3>
                </a>
               
            </div>
            @empty
                <p>Tidak ada Kegiatan</p>
            @endforelse
            </div>
            <div class="col-lg-4">
                @include('guest.Html.BeritaPopular')
            </div>
        </div>
    </div>
</section>

{{-- @include('guest.Html.Footer') --}}

@endsection
