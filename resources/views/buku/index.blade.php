@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">📚 Data Buku</h2>
        <p class="text-muted mb-0">
            Kelola seluruh koleksi buku perpustakaan.
        </p>
    </div>

    <div class="d-flex gap-2 mb-4">

    <a href="{{ route('buku.export.excel') }}"
       class="btn btn-success">
        <i class="bi bi-file-earmark-excel"></i>
        Export Excel
    </a>

    <a href="{{ route('buku.export.pdf') }}"
        class="btn btn-danger">

        <i class="bi bi-file-earmark-pdf"></i>
        Export PDF

    </a>

    <a href="{{ route('buku.create') }}"
        class="btn text-white shadow"
        style="background:#6f5cf1;">

        <i class="bi bi-plus-circle"></i>
        Tambah Buku

    </a>

    </div>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-header search-header border-0 rounded-top-4 py-3">

        <form method="GET"
            action="{{ route('buku.index') }}"
            id="searchForm">

            <div class="input-group">

                <span class="input-group-text bg-white border-end-0">

                    <i class="bi bi-search text-muted"></i>

                </span>

                <input
                    type="text"
                    name="keyword"
                    id="searchInput"
                    class="form-control border-start-0"
                    placeholder="Cari judul, penulis atau kode buku..."
                    value="{{ request('keyword') }}">

                <button class="btn text-white"
                    style="background:#6f5cf1;">

                    Cari

                </button>

                <a href="{{ route('buku.index') }}"
                    class="btn btn-outline-secondary">

                    Reset

                </a>

            </div>

        </form>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead
                    style="background:#f2efff;">

                    <tr>

                        <th>No</th>
                        <th>Cover</th>
                        <th>Kode</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>QR Code</th>
                        <th>Barcode</th>
                        <th>Label</th>
                        <th width="150" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($buku as $item)

                <tr>

                    <td>
                        {{ ($buku->currentPage()-1) * $buku->perPage() + $loop->iteration }}
                    </td>

                    <td class="text-center">

                    @if($item->cover)

                        <img
                            src="{{ asset('storage/'.$item->cover) }}"
                            width="60"
                            height="80"
                            class="rounded shadow-sm"
                            style="object-fit: cover;">

                    @else

                        <img
                            src="https://placehold.co/60x80/e9ecef/6c757d?text=No+Cover"
                            width="60"
                            height="80"
                            class="rounded">

                    @endif

                </td>

                    <td>

                        <span class="badge rounded-pill"
                            style="background:#ece8ff;color:#6f5cf1;">

                            {{ $item->kode_buku }}

                        </span>

                    </td>

                    <td class="fw-semibold">
                        {{ $item->judul }}
                    </td>

                    <td>{{ $item->penulis }}</td>

                    <td>{{ $item->penerbit }}</td>

                    <td>{{ $item->tahun }}</td>

                    <td>

                        <strong>{{ $item->stok }}</strong>

                        <br>

                        @if($item->stok == 0)

                            <span class="badge bg-danger">
                                Stok Habis
                            </span>

                        @elseif($item->stok <= 3)

                            <span class="badge bg-warning text-dark">
                                Hampir Habis
                            </span>

                        @else

                            <span class="badge bg-success">
                                Tersedia
                            </span>

                        @endif


                    </td>

                    <td class="text-center">
                        <a href="{{ route('buku.qrcode',$item->id) }}"
                        class="btn btn-success btn-sm">
                            <i class="bi bi-qr-code"></i>
                        </a>
                    </td>

                    <td class="text-center">
                        <a href="{{ route('buku.barcode',$item->id) }}"
                        class="btn btn-dark btn-sm">
                            <i class="bi bi-upc"></i>
                        </a>
                    </td>

                    <td class="text-center">

                    <a href="{{ route('buku.label',$item->id) }}"
                        class="btn btn-warning btn-sm">

                        <i class="bi bi-printer-fill"></i>

                    </a>

                </td>

                    <td class="text-center">
                        <a href="{{ route('buku.edit',$item->id) }}"
                        class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('buku.destroy',$item->id) }}"
                            method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="9"
                        class="text-center text-muted py-5">

                        <i class="bi bi-journal-x fs-1"></i>

                        <br>

                        Belum ada data buku.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4 d-flex justify-content-center">

            {{ $buku->links() }}

        </div>

    </div>

</div>

@endsection

@push('scripts')

@if(session('success'))

<script>

Swal.fire({

    icon:'success',

    title:'Berhasil',

    text:'{{ session("success") }}',

    timer:1800,

    showConfirmButton:false

});

</script>

@endif

@endpush