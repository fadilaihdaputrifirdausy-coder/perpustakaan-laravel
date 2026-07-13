@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card border-0 shadow-lg rounded-4">

            <div class="card-header border-0 text-white py-3"
                style="background:linear-gradient(135deg,#8B5CF6,#6366F1);">

                <h4 class="mb-0">
                    🔑 Ganti Password
                </h4>

            </div>

            <div class="card-body p-4">

                <form action="{{ route('password.update') }}" method="POST">

                    @csrf

                    {{-- Password Lama --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Password Lama
                        </label>

                        <div class="input-group">

                            <input
                                type="password"
                                id="password_lama"
                                name="password_lama"
                                class="form-control @error('password_lama') is-invalid @enderror">

                            <button
                                class="btn btn-outline-secondary"
                                type="button"
                                onclick="togglePassword('password_lama',this)">

                                <i class="bi bi-eye"></i>

                            </button>

                            @error('password_lama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Password Baru --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Password Baru
                        </label>

                        <div class="input-group">

                            <input
                                type="password"
                                id="password_baru"
                                name="password_baru"
                                class="form-control @error('password_baru') is-invalid @enderror">

                            <button
                                class="btn btn-outline-secondary"
                                type="button"
                                onclick="togglePassword('password_baru',this)">

                                <i class="bi bi-eye"></i>

                            </button>

                            @error('password_baru')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Konfirmasi --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Konfirmasi Password Baru
                        </label>

                        <div class="input-group">

                            <input
                                type="password"
                                id="password_baru_confirmation"
                                name="password_baru_confirmation"
                                class="form-control">

                            <button
                                class="btn btn-outline-secondary"
                                type="button"
                                onclick="togglePassword('password_baru_confirmation',this)">

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                    </div>

                    <button
                        type="submit"
                        class="btn text-white w-100 rounded-3 py-2"
                        style="background:#6f5cf1;">

                        <i class="bi bi-check-circle-fill"></i>
                        Simpan Password

                    </button>

                    <a href="{{ route('dashboard') }}"
                        class="btn btn-light border w-100 rounded-3 py-2 mt-2">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(id, button){

    let input = document.getElementById(id);
    let icon = button.querySelector("i");

    if(input.type === "password"){

        input.type = "text";

        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");

    }else{

        input.type = "password";

        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");

    }

}

</script>

@endsection