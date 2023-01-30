@extends('artikel/navbar')
@section('isi')
<section class="py-3 mb-3" data-aos="fade-down">
    <header class="text-center">
        <h1 class="text-uppercase my-3">Top <span class="text-danger">Creepy</span> Stories</h1>
    </header>
    <div class="swiper mySwiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($creepy as $creepy)                
            <div class="swiper-slide shadow text-end" style="background-image: url({{ asset('storage/'.$creepy->foto) }});background-size:cover;background-position:center;">
                <div class="container-fluid">
                    <div class="badge text-white bg-danger">{{ $creepy->kategori->nama_kategori }}</div>
                    <a class="d-block text-center" href="{{ route('cerita.show', $creepy->id) }}" style="height: 20vh;width:100%;">
                    </a>
                    <h3><a class="nav-link text-center" href="{{ route('cerita.show', $creepy->id) }}">{{ $creepy->judul }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        {{-- <h5 class="text-end pe-5 "><a class="btn btn-danger text-uppercase mt-3 align-middle " href="">LIHAT SEMUA</a></h5> --}}
    </div>
</section>
<section class="py-3 mb-3" data-aos="fade-up">
    <header class="text-center">
        <h1 class="text-uppercase my-3">Top <span class="text-warning">Riddle</span></h1>
    </header>
    <div class="swiper mySwiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($riddle as $riddle)                
            <div class="swiper-slide shadow text-end" style="background-image: url({{ asset('storage/'.$riddle->foto) }});background-size:cover;background-position:center;">
                <div class="container-fluid">
                    @if($riddle->kategori->nama_kategori == 'creepy')
                    <div class="badge text-white bg-danger">{{ $riddle->kategori->nama_kategori }}</div>
                    @else
                    <div class="badge text-dark bg-warning">{{ $riddle->kategori->nama_kategori }}</div>
                    @endif
                    <a class="d-block text-center" href="{{ route('cerita.show', $riddle->id) }}" style="height: 20vh;width:100%;">
                    </a>
                    <h3><a class="nav-link text-center" href="{{ route('cerita.show', $riddle->id) }}">{{ $riddle->judul }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        {{-- <h5 class="text-end pe-5"><a class="btn btn-warning text-uppercase mt-3 " href="{{ route('') }}">lihat semua</a></h5> --}}
    </div>
</section>
<section class="py-3 mb-3" data-aos="fade-down">
    <header class="text-center">
        <h1 class="text-uppercase my-3">for <span class="text-danger">you</span></h1>
    </header>
    <div class="row">
        @foreach($rekom as $rekom)                
        <div class="col-12 col-md-3 col-sm-4 mt-3">
            <div class="swiper-slide shadow text-end" style="background-image: url({{ asset('storage/'.$rekom->foto) }});background-size:cover;background-position:center;">
                <div class="container-fluid">
                    @if($rekom->kategori->nama_kategori == 'creepy')
                    <div class="badge text-white bg-danger">{{ $rekom->kategori->nama_kategori }}</div>
                    @else
                    <div class="badge text-dark bg-warning">{{ $rekom->kategori->nama_kategori }}</div>
                    @endif
                    <a class="d-block text-center" href="{{ route('cerita.show', $rekom->id) }}" style="height: 20vh">
                    </a>
                    <h3><a class="nav-link text-center" href="{{ route('cerita.show', $rekom->id) }}">{{ $rekom->judul }}</a></h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<div class="mt-5 text-center">

    <a href="{{ url('cerita') }}" class="btn btn-secondary">Tampilkan Semua Cerita</a>
</div>

@endsection