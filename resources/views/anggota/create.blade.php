@extends('layouts.app')

@section('content')

<div class="card border-0 shadow-lg rounded-4">

    <div class="card-header border-0 py-3"
        style="background:linear-gradient(135deg,#8B5CF6,#6366F1); color:white; border-radius:16px 16px 0 0;">

        <h4 class="mb-0">
            <i class="bi bi-person-plus-fill"></i>
            Tambah Anggota
        </h4>

    </div>

            <div class="card-body p-4">

                <form action="{{ route('anggota.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            Nomor Anggota

                        </label>

                        <input
                            type="text"
                            name="nomor_anggota"
                            class="form-control form-control-lg rounded-3 @error('nomor_anggota') is-invalid @enderror"
                            placeholder="Masukkan nomor anggota"
                            value="{{ old('nomor_anggota') }}">

                        @error('nomor_anggota')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            Nama Anggota

                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control form-control-lg rounded-3 @error('nama') is-invalid @enderror"
                            placeholder="Masukkan nama anggota"
                            value="{{ old('nama') }}">

                        @error('nama')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            Kelas/Semester

                        </label>

                        <input
                            type="text"
                            name="kelas"
                            class="form-control form-control-lg rounded-3 @error('kelas') is-invalid @enderror"
                            placeholder="Contoh : X IPA 1"
                            value="{{ old('kelas') }}">

                        @error('kelas')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="form-control rounded-3 @error('alamat') is-invalid @enderror"
                            placeholder="Masukkan alamat anggota">{{ old('alamat') }}</textarea>

                        @error('alamat')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Nomor HP

                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control form-control-lg rounded-3 @error('no_hp') is-invalid @enderror"
                            placeholder="08xxxxxxxxxx"
                            value="{{ old('no_hp') }}">

                        @error('no_hp')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="d-flex flex-column flex-md-row justify-content-end gap-2">

                        <a href="{{ route('anggota.index') }}"
                            class="btn btn-light border px-4">

                            <i class="bi bi-arrow-left"></i>

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn text-white px-4"
                            style="background:#7C3AED;">

                            <i class="bi bi-save"></i>

                            Simpan

                        </button>

                    </div>

                </form>

            </div>

        </div>

@endsection