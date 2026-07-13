@extends('layouts.app')

@section('content')

<div class="card border-0 shadow rounded-4">

    <div class="card-header border-0 text-white py-3"
        style="background: linear-gradient(135deg,#6f5cf1,#8b7cf6);">

        <h4 class="mb-0">
            <i class="bi bi-pencil-square"></i>
            Edit Buku
        </h4>

    </div>

    <div class="card-body p-4">

        <form action="{{ route('buku.update',$buku->id) }}" 
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Buku</label>

                <input
                    type="text"
                    name="kode_buku"
                    class="form-control @error('kode_buku') is-invalid @enderror"
                    value="{{ old('kode_buku',$buku->kode_buku) }}">

                @error('kode_buku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Buku</label>

                <input
                    type="text"
                    name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul',$buku->judul) }}">

                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Penulis</label>

                <input
                    type="text"
                    name="penulis"
                    class="form-control @error('penulis') is-invalid @enderror"
                    value="{{ old('penulis',$buku->penulis) }}">

                @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Penerbit</label>

                <input
                    type="text"
                    name="penerbit"
                    class="form-control @error('penerbit') is-invalid @enderror"
                    value="{{ old('penerbit',$buku->penerbit) }}">

                @error('penerbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Terbit</label>

                        <input
                            type="number"
                            name="tahun"
                            class="form-control @error('tahun') is-invalid @enderror"
                            value="{{ old('tahun',$buku->tahun) }}">

                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stok</label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control @error('stok') is-invalid @enderror"
                            value="{{ old('stok',$buku->stok) }}">

                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Cover Buku
                    </label>

                    @if($buku->cover)

                        <img
                            src="{{ asset('storage/'.$buku->cover) }}"
                            width="120"
                            class="mb-3 rounded shadow">

                    @endif

                    <input
                        type="file"
                        name="cover"
                        class="form-control">

                </div>

            </div>

            <div class="mt-4">

                <button class="btn text-white px-4"
                    style="background:#6f5cf1;">

                    <i class="bi bi-pencil-square"></i>
                    Update

                </button>

                <a href="{{ route('buku.index') }}"
                    class="btn btn-light border px-4">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection