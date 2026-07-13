@extends('layouts.app')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header border-0 py-3"
        style="background:linear-gradient(135deg,#8B5CF6,#6366F1); color:white; border-radius:16px 16px 0 0;">

        <h4 class="mb-0">
            📚 Tambah Buku
        </h4>

    </div>

    <div class="card-body p-4">

        <form action="{{ route('buku.store') }}" 
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Kode Buku
                </label>

                <input
                    type="text"
                    name="kode_buku"
                    class="form-control form-control-lg rounded-3 @error('kode_buku') is-invalid @enderror"
                    value="{{ old('kode_buku') }}"
                    placeholder="Masukkan kode buku">

                @error('kode_buku')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Judul Buku
                </label>

                <input
                    type="text"
                    name="judul"
                    class="form-control form-control-lg rounded-3 @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}"
                    placeholder="Masukkan judul buku">

                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Penulis
                </label>

                <input
                    type="text"
                    name="penulis"
                    class="form-control form-control-lg rounded-3 @error('penulis') is-invalid @enderror"
                    value="{{ old('penulis') }}"
                    placeholder="Masukkan nama penulis">

                @error('penulis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Penerbit
                </label>

                <input
                    type="text"
                    name="penerbit"
                    class="form-control form-control-lg rounded-3 @error('penerbit') is-invalid @enderror"
                    value="{{ old('penerbit') }}"
                    placeholder="Masukkan nama penerbit">

                @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Tahun Terbit
                        </label>

                        <input
                            type="number"
                            name="tahun"
                            class="form-control form-control-lg rounded-3 @error('tahun') is-invalid @enderror"
                            value="{{ old('tahun') }}"
                            placeholder="2026">

                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Stok Buku
                        </label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control form-control-lg rounded-3 @error('stok') is-invalid @enderror"
                            value="{{ old('stok') }}"
                            placeholder="0">

                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Cover Buku
                    </label>

                    <input
                        type="file"
                        name="cover"
                        class="form-control @error('cover') is-invalid @enderror">

                    @error('cover')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <hr>

            <div class="d-flex flex-column flex-md-row justify-content-end gap-2">

                <a href="{{ route('buku.index') }}"
                    class="btn btn-light border rounded-3 px-4">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

                <button type="submit"
                    class="btn text-white rounded-3 px-4"
                    style="background:#7C3AED;">

                    <i class="bi bi-check-circle-fill"></i>
                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection