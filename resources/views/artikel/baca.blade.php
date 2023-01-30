@extends('artikel/navbar')
@section('isi')
<div class="row mt-5">
    <div class="col-12 col-md-8 shadow p-3">
        <header class="text-center">
            <h1 class="text-uppercase my-3">{{ $cerita->judul }}</h1>
        </header>
        <div class="text-center mb-1">
            <img src="{{ asset('storage/'. $cerita->foto) }}" width="50%" height="50%" alt="">
        </div>
        <div class="d-flex justify-content-between mt-3 px-3">
            <p>Tanggal: {{ $cerita->tanggal }}</p>
            <p>Penulis: <a href="{{ $cerita->link}}" >{{ $cerita->penulis }}</a></p>
        </div> 
        <p class="px-5 pt-2 h5">{{ $cerita->isi }}</p>
    </div>
    <div class="col-4 col-md-3 text-center ">
        <h4>Lainnya: </h4>
        @foreach($lain as $lain)
        @if($lain->id == $cerita->id)
        @else

        <div class="shadow-lg text-end mt-5 pb-2">
            <div class="container-fluid" style="background-image: url({{ asset('storage/' . $lain->foto) }});background-size:cover;background-position:center;">
                @if($lain->kategori->nama_kategori == 'creepy')
                <div class="badge text-dark bg-danger">{{ $lain->kategori->nama_kategori }}</div>
                @else
                <div class="badge text-dark bg-warning">{{ $lain->kategori->nama_kategori }}</div>
                @endif
                <a class="d-block text-center" href="{{ route('cerita.show', $lain->id) }}"
                    style="height: 8vh">
                </a>
            </div>
            <h3><a class="nav-link text-center" href="{{ route('cerita.show', $lain->id) }}">{{ $lain->judul }}</a></h3>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection