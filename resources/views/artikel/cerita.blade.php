@extends('artikel/navbar')
@section('isi')
    <section class="py-3 mb-3" data-aos="fade-up">
        <header class="text-center">
            <h1 class="text-uppercase my-3">all <span class="text-danger">stories</span> collection</h1>
        </header>
        <div class="row">
            <div class="tambah text-center mt-2 mb-5">
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</a>
            </div>
            @foreach ($cerita as $cerita)
                <div class="col-12 col-md-3 col-sm-4 ">
                    <div class=" text-end d-flex swiper-slide">
                        <div class=" container-fluid shadow mb-3"
                            style="background-image: url({{ asset('storage/' . $cerita->foto) }});background-size:cover;background-position:center;">
                            @if ($cerita->kategori->nama_kategori == 'creepy')
                                <div class="badge text-white bg-danger">{{ $cerita->kategori->nama_kategori }}</div>
                            @else
                                <div class="badge text-dark bg-warning">{{ $cerita->kategori->nama_kategori }}</div>
                            @endif
                            <a class="d-block text-center" href="{{ route('cerita.show', $cerita->id) }}"
                                style="height: 20vh">
                            </a>
                            <h3><a class="nav-link text-center"
                                    href="{{ route('cerita.show', $cerita->id) }}">{{ $cerita->judul }}</a></h3>
                        </div>
                        <div class="aksi d-flex flex-column">
                            <form action="{{ route('cerita.destroy', $cerita->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="" class="btn btn-warning mb-1" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $cerita->id }}"><i class='bx bxs-edit'></i></a>
                                <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit{{ $cerita->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Cerita</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                <form action="{{ route('cerita.update', $cerita->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="judul"
                                            value="{{ $cerita->judul }}">
                                        <label for="formFloatingInput">Judul</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="isi" id="floatingTextarea" style="height: 200px">{{ $cerita->isi }}</textarea>
                                        <label for="floatingTextarea">Isi</label>
                                    </div>
                                    <div class="form-floating mb-3 text-center">
                                        <img class="img " width="100px" src="{{ asset('storage/' . $cerita->foto) }}"
                                            alt="..." loading="lazy">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" name="foto">
                                        <label for="formFloatingInput">Foto</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{ $cerita->tanggal }}">
                                        <label for="formFloatingInput">Tanggal Dibuat</label>
                                    </div>
                                    <div class="my-3 form-floating">
                                        <select name="kategori_id" class="form-select">
                                            <option selected>Pilih Kategori</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $cerita->kategori_id ? 'selected' : '' }}>
                                                    {{ $item->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="penulis"
                                            value="{{ $cerita->penulis }}">
                                        <label for="formFloatingInput">Penulis</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="link"
                                            value="{{ $cerita->link }}">
                                        <label for="formFloatingInput">Link</label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Cerita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <form action="{{ route('cerita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="judul" required>
                        <label for="formFloatingInput">Judul</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="isi" id="floatingTextarea" style="height: 200px"></textarea>
                        <label for="floatingTextarea">Isi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="foto" required>
                        <label for="formFloatingInput">Foto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="tanggal" required>
                        <label for="formFloatingInput">Tanggal Dibuat</label>
                    </div>
                    <div class="my-3 form-floating">
                        <select name="kategori_id" class="form-select">
                            <option selected disabled class="text-secondary">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" @selected(old('kategori_id') == $item->id)>
                                    {{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="penulis" required>
                        <label for="formFloatingInput">Penulis</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="link" placeholder="boleh kosong">
                        <label for="formFloatingInput">Link</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
