@extends('admin.layouts.app')
@section('title')
 {{ $title }}
@endsection
@section('content')
 
<div class="row">
    <div class="col">
        <h4>View Post</h4>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card p-3">
            <div class="mb-3 row">
               <label for="" class="fs-5">Author</label>
               <h5 class="p-3">5</h5>
               <hr>
            </div>

            <div class="mb-3 row">
                <label for="" class="fs-5">Category</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
             <div class="mb-3 row">
                <label for="" class="fs-5">Title</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
             <div class="mb-3 row">
                <label for="" class="fs-5">Excerpt</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
             <div class="mb-3 row">
                <label for="" class="fs-5">Content</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
             <div class="mb-3 row">
                <label for="" class="fs-5">Post Image</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
             <div class="mb-3 row">
                <label for="" class="fs-5">Meta Description</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
             <div class="mb-3 row">
                <label for="" class="fs-5">Status</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
             <div class="mb-3 row">
                <label for="" class="fs-5">Tanggal</label>
                <h5 class="p-3">5</h5>
                <hr>
             </div>
           
        </div>
    </div>
</div>


@endsection 

@section('js')
<script>
    $('#created_at').daterangepicker({
	singleDatePicker: true,
  startDate: moment().startOf('hour'),
  endDate: moment().startOf('hour').add(32, 'hour'),
  locale: {
    format: 'YYYY/MM/DD'
  }
});
</script>
@endsection