<div class="sidebar-widget sticky-widget">
    <h3 class="widget-title">Berita Terpopuler</h3>
     @foreach (getPost('berita-utama',0,5) as $key )
     <div class="sidebar-post">
        <img src="{{asset('storage/'.$key->image)}}" alt="post">
        <div class="post-content">
            <ul class="post-meta">
                <li><i class="fa-light fa-calendar"></i>{{date('d M Y',strtotime($key->created_at))}}</li>
            </ul>
            <h3 class="title"><a href="{{ route('post.slug', $key->slug) }}">{!! substr(strip_tags(explode('<!--more-->', $key->title)[0]), 0, 72) !!}...</a></h3>
            
        </div>
    </div>
     @endforeach
   
    <div class="col-lg-12 pt-4" >
        <button class="btn btn-primary "> <a href="{{ route('post.all') }}" target="_blank">Lihat Semua Berita ></a> </button>
    </div>
</div>