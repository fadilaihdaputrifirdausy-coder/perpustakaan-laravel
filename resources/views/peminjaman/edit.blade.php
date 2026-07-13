@extends('layouts.app')

@section('content')

<div class="card border-0 shadow rounded-4">

    <div class="card-header border-0 text-white py-3"
        style="background:linear-gradient(135deg,#6f5cf1,#8b7cf6);">

        <h4 class="mb-0">
            <i class="bi bi-pencil-square"></i>
            Edit Peminjaman
        </h4>

    </div>

    <div class="card-body p-4">

        <form action="{{ route('peminjaman.update',$peminjaman->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Anggota
                </label>

                <select
                    name="anggota_id"
                    class="form-select @error('anggota_id') is-invalid @enderror">

                    <option value="">-- Pilih Anggota --</option>

                    @foreach($anggota as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('anggota_id',$peminjaman->anggota_id)==$item->id ? 'selected' : '' }}>

                            {{ $item->nomor_anggota }} - {{ $item->nama }}

                        </option>

                    @endforeach

                </select>

                @error('anggota_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Buku
                </label>

                <select
                    name="buku_id"
                    class="form-select @error('buku_id') is-invalid @enderror">

                    <option value="">-- Pilih Buku --</option>

                    @foreach($buku as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('buku_id',$peminjaman->buku_id)==$item->id ? 'selected' : '' }}>

                            {{ $item->kode_buku }} - {{ $item->judul }}

                        </option>

                    @endforeach

                </select>

                @error('buku_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Tanggal Pinjam
                        </label>

                        <input
                            type="date"
                            name="tgl_pinjam"
                            class="form-control @error('tgl_pinjam') is-invalid @enderror"
                            value="{{ old('tgl_pinjam',$peminjaman->tgl_pinjam) }}">

                        @error('tgl_pinjam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Tanggal Kembali
                        </label>

                        <input
                            type="date"
                            name="tgl_kembali"
                            class="form-control @error('tgl_kembali') is-invalid @enderror"
                            value="{{ old('tgl_kembali',$peminjaman->tgl_kembali) }}">

                        @error('tgl_kembali')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select @error('status') is-invalid @enderror">

                    <option value="">-- Pilih Status --</option>

                    <option value="Dipinjam"
                        {{ old('status',$peminjaman->status)=='Dipinjam' ? 'selected' : '' }}>
                        Dipinjam
                    </option>

                    <option value="Dikembalikan"
                        {{ old('status',$peminjaman->status)=='Dikembalikan' ? 'selected' : '' }}>
                        Dikembalikan
                    </option>

                </select>

                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <button
                type="submit"
                class="btn text-white px-4"
                style="background:#6f5cf1;">

                <i class="bi bi-pencil-square"></i>
                Update

            </button>

            <a href="{{ route('peminjaman.index') }}"
                class="btn btn-light border px-4">

                <i class="bi bi-arrow-left"></i>
                Kembali

            </a>

        </form>

    </div>

</div>

@endsection