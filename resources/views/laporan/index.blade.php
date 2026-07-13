@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            📄 Laporan Peminjaman
        </h2>

        <p class="text-muted mb-0">
            Sistem Informasi Perpustakaan
        </p>

    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('laporan.export.excel') }}"
            class="btn btn-success">

            <i class="bi bi-file-earmark-excel"></i>
            Export Excel

        </a>

        <a href="{{ route('laporan.export.pdf') }}"
            class="btn btn-danger">

            <i class="bi bi-file-earmark-pdf"></i>
            Export PDF

        </a>

        <button
            onclick="window.print()"
            class="btn text-white"
            style="background:#6f5cf1;">

            <i class="bi bi-printer"></i>
            Cetak

        </button>

    </div>

</div>

<!-- Header Khusus Saat Print -->
<div class="print-header text-center mb-4">

    <h3 class="fw-bold">
        SISTEM INFORMASI PERPUSTAKAAN
    </h3>

    <p class="mb-0">
        Laporan Data Peminjaman Buku
    </p>

    <hr>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead style="background:#6f5cf1;color:white;">

                    <tr>

                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($laporan as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->anggota->nama }}</td>

                        <td>{{ $item->buku->judul }}</td>

                        <td>{{ $item->tgl_pinjam }}</td>

                        <td>{{ $item->tgl_kembali }}</td>

                        <td>

                            @if($item->status == 'Dipinjam')

                                <span
                                    class="badge"
                                    style="background:#f4c95d;color:#333;">

                                    {{ $item->status }}

                                </span>

                            @else

                                <span
                                    class="badge"
                                    style="background:#8b7cf6;">

                                    {{ $item->status }}

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-4 text-muted">

                            Belum ada data laporan.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-5 text-end">

            <p class="mb-1">

                Dicetak pada :

                <strong>{{ date('d F Y') }}</strong>

            </p>

            <br>

            <p>

                Admin Perpustakaan

            </p>

            <br><br><br>

            <strong>( __________________ )</strong>

        </div>

    </div>

</div>

<style>

.print-header{

    display:none;

}

@media print{

    .print-header{

        display:block;

    }

    h2,
    .btn{

        display:none !important;

    }

}

</style>

@endsection