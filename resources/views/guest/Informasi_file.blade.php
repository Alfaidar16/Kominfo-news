@extends('guest.layouts.Guest')
{{-- @section('title',ucfirst('Semua Berita')) --}}
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
                    <h1 class="text-white">{{ $category->title }}</h1>
                    <h4 class="sub-title text-white"><a href="index.html">Home </a><a href="#" class="inner-page">/{{ $category->title }}</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-section pt-100 pb-100">
    <div class="container">
        <div class="section-heading text-center">
            <h4 class="sub-heading">Dokumen</h4>
            <h2 class="section-title">{{ $category->title }}</h2>
        </div>
       
        <div class="row gy-4 text-center mt-3 "> 
          <div class="row">
            <div class="col-lg-4">
              <input type="text" class="form-control" id="search" placeholder="Masukkan kata Pencarian...">
            </div>
          </div>  
          <div class="col-lg-12 col-md-12" id="berita-list">
            <table class="table table-striped table-bordered" id="informasiPublik">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal Di Buat</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Jumlah Download</th>
                    {{-- <th scope="col">Handle</th> --}}
                  </tr>
                </thead>
                <tbody>
                    @foreach ($fileInformasi as $dok)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dok->name }}</td>
                        <td>{{ date('Y-m-d', strtotime($dok->created_at))  }}</td>
                       
                         {{-- @if(!empty($dok->dokumen)) --}}
                         <td>
                          
                          <a href="{{ $dok->dokumen ? asset('storage/' . $dok->dokumen) : $dok->link }}" class="mx-2 btn-sm btn btn-primary">
                            Lihat
                             {{-- <a href="{{ route('total.download', [$dok->id_file, $dok->id]) }}" class="btn btn-primary">Lihat
                            </a> --}}
                            </a>
                          {{-- <a href="{{ asset('storage/' . $dok->dokumen) }}" 
                            onclick="event.preventDefault(); document.getElementById('download-form-{{ $dok->id }}').submit();"
                            class="btn btn-primary btn-sm">Lihat dan Download</a>s --}}
                          {{-- <a href="{{ asset('storage/' . $dok->dokumen) }} " class="mx-2 btn btn-primary btn-sm">Lihat</a>
                          <a href="{{ route('total.download', [$dok->id_file, $dok->id]) }}"  class="btn btn-success btn-sm">Download</a> --}}
                        </td> 
                         {{-- @else
                         <td>
                          
                          <a href="{{ $dok->link }} " class="mx-2 btn-sm">
                             <a href="{{ route('total.download', [$dok->id_file, $dok->id]) }}" class="btn btn-primary">Lihat</a></a>
                          
                        </td>
                         @endif --}}
                       
                        <td>{{ totalDownload($dok->id_file, $dok->id) }}</td>
                      </tr>
                    @endforeach
                 
                 
                </tbody>
              
              </table>
        </div>
        </div>
    </div>
     <div class="container">
      <div class="row">
        <div class="col">
          {{ $fileInformasi->links('pagination::bootstrap-4') }}
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

{{-- @include('Html.Footer') --}}
@endsection
@section('js')
<script>
  $('#search').on('keyup', function() {
         var value = $(this).val().toLowerCase();
         $("#informasiPublik tbody tr").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
     });
</script>
@endsection

