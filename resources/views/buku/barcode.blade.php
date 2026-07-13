@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-body py-5">

            <div class="text-center">

                <h2 class="fw-bold mb-2">
                    Barcode Buku
                </h2>

                <p class="text-muted mb-4">
                    Sistem Informasi Perpustakaan
                </p>

                @if($buku->cover)
                    <img src="{{ asset('storage/'.$buku->cover) }}"
                        class="rounded shadow mb-4"
                        style="width:160px;height:220px;object-fit:cover;">
                @endif

                <h3 class="fw-bold">
                    {{ $buku->judul }}
                </h3>

                <span class="badge bg-primary fs-6 px-3 py-2 mt-2">
                    {{ $buku->kode_buku }}
                </span>

            </div>

            <hr class="my-4">

            <div class="text-center">

                <div class="d-flex justify-content-center">
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($buku->kode_buku, 'C128', 3, 80) }}">
                </div>

                <div class="mt-2 fw-semibold text-secondary">
                    {{ $buku->kode_buku }}
                </div>

            </div>

            <div class="text-center mt-5">

                <a href="{{ route('buku.index') }}"
                    class="btn btn-secondary px-4 ms-2">

                    ⬅ Kembali

                </a>

                <button onclick="window.print()"
                    class="btn btn-success px-4">

                    🖨 Cetak Barcode

                </button>

            </div>

        </div>

    </div>

</div>

<style>

@media print{

    /* Hilangkan bagian layout */
    .sidebar,
    .navbar,
    footer{
        display:none !important;
    }

    /* Hilangkan tombol */
    .btn{
        display:none !important;
    }

    /* Hilangkan margin content */
    .content{
        margin:0 !important;
        padding:0 !important;
    }

    .container{
        width:100% !important;
        max-width:100% !important;
        margin:0 !important;
        padding:0 !important;
    }

    /* Hilangkan efek card */
    .card{
        border:none !important;
        box-shadow:none !important;
    }

    body{
        background:#fff !important;
    }

}

</style>

@endsection