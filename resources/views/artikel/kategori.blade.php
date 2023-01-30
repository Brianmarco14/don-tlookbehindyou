@extends('artikel/navbar')
@section('isi')

<section class="py-3 mb-3" data-aos="fade-up">
    <header class="text-center">
        @if($kategori->nama_kategori == 'creepy')
        <h1 class="text-uppercase my-3">all <span class="text-danger">{{ $kategori->nama_kategori }}</span> collection</h1>
        @else
        <h1 class="text-uppercase my-3">all <span class="text-warning">{{ $kategori->nama_kategori }}</span> collection</h1>

        @endif
    </header>
    <div class="row">
        @foreach ($cerita as $cerita)
        <h1>{{ $cerita->judul }}</h1>
            <div class="col-12 col-md-3 col-sm-4 ">
                <div class=" text-end d-flex swiper-slide">
                    <div class=" container-fluid shadow mb-3"
                        style="background-image: url({{ asset('storage/' . $cerita->foto) }});background-size:cover;background-position:center;">
                        @if ($kategori->nama_kategori == 'creepy')
                            <div class="badge text-white bg-danger">{{ $kategori->nama_kategori }}</div>
                        @else
                            <div class="badge text-dark bg-warning">{{ $kategori->nama_kategori }}</div>
                        @endif
                        <a class="d-block text-center" href="{{ route('cerita.show', $cerita->id) }}"
                            style="height: 20vh">
                        </a>
                        <h3><a class="nav-link text-center"
                                href="{{ route('cerita.show', $cerita->id) }}">{{ $cerita->judul }}</a></h3>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection