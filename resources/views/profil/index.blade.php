@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header text-white text-center py-3"
                    style="background:linear-gradient(135deg,#8B5CF6,#6366F1);">

                    <h3 class="mb-0">
                        👤 Profil Admin
                    </h3>

                </div>

                <div class="card-body p-5 text-center">

                    @if($admin->foto)

                        <img
                            src="{{ asset('storage/'.$admin->foto) }}"
                            class="rounded-circle shadow"
                            width="170"
                            height="170"
                            style="object-fit:cover;">

                    @else

                        <img
                            src="https://ui-avatars.com/api/?name={{ $admin->username }}&background=6f5cf1&color=fff&size=170"
                            class="rounded-circle shadow">

                    @endif

                    <h3 class="mt-4">

                        {{ $admin->username }}

                    </h3>

                    <p class="text-muted">

                        Administrator SIMPERPUS

                    </p>

                    <hr>

                    <form
                        action="{{ route('profil.update') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Upload Foto Baru

                            </label>

                            <input
                                type="file"
                                name="foto"
                                class="form-control">

                        </div>

                        <button
                            type="submit"
                            class="btn text-white w-100 rounded-3 py-2"
                            style="background:#6f5cf1;">

                            <i class="bi bi-upload"></i>
                            Simpan Perubahan

                        </button>

                        <a href="{{ route('dashboard') }}"
                            class="btn w-100 rounded-3 py-2 mt-2"
                            style="background:#eef1f5; color:#495057; border:1px solid #d8dee9;">

                            <i class="bi bi-arrow-left"></i>
                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection