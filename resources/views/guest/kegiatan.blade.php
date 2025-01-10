@extends('Theme')
@section('title',ucfirst($model->title))
@section('content')
<section class="content-post">
	<div class="container">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 post-container">
			<div class="single-post">
				<div class="title-post">
					<h3>{{ $model->title }}</h3>
					<div class="time-post">
						publish pada <span class="black-text">{{date('d M Y',strtotime($model->created_at))}}</span>
					</div>
				</div>
				<div class="body-post">
					<div class="owl-carousel owl-theme" id="default-slider">
						@php
							$images = json_decode($model->images);
						@endphp
						@foreach($images as $image)
						<div class="item">
							<img src="{{asset('storage/'.$image)}}">
						</div>
						@endforeach
					</div>
					{!! $model->body !!}
				</div>
			</div>
		</div>
		@include('_partials.SidebarPost')
	</div>
</section>
@endsection
@section('meta_description')
@php
	$strip = strip_tags($model->body);
	$strPos = strpos($strip," ",10);
	$desc = substr($strip,0,$strPos);
@endphp
{{ucfirst($desc)}}
@endsection