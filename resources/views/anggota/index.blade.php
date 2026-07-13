@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">👤 Data Anggota</h2>

        <p class="text-muted mb-0">
            Kelola seluruh data anggota perpustakaan.
        </p>

    </div>

    <div class="d-flex gap-2 mb-4">

    <a href="{{ route('anggota.export.excel') }}"
        class="btn btn-success">
            <i class="bi bi-file-earmark-excel"></i>
            Export Excel
    </a>

    <a href="{{ route('anggota.export.pdf') }}"
        class="btn btn-danger">

        <i class="bi bi-file-earmark-pdf"></i>
        Export PDF

    </a>

    <a href="{{ route('anggota.create') }}"
        class="btn text-white shadow"
        style="background:#6f5cf1;">

        <i class="bi bi-plus-circle"></i>
        Tambah Anggota

    </a>

    </div>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-header search-header border-0 rounded-top-4 py-3">

        <form method="GET"
            action="{{ route('anggota.index') }}"
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
                    placeholder="Cari nomor anggota, nama atau kelas..."
                    value="{{ request('keyword') }}">

                <button
                    class="btn text-white"
                    style="background:#6f5cf1;">

                    Cari

                </button>

                <a href="{{ route('anggota.index') }}"
                    class="btn btn-outline-secondary">

                    Reset

                </a>

            </div>

        </form>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead style="background:#f2efff;">

                    <tr>

                        <th>No</th>
                        <th>No Anggota</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th width="150" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($anggota as $item)

                    <tr>

                        <td>
                            {{ ($anggota->currentPage()-1) * $anggota->perPage() + $loop->iteration }}
                        </td>

                        <td>

                            <span class="badge rounded-pill"
                                style="background:#ece8ff;color:#6f5cf1;">

                                {{ $item->nomor_anggota }}

                            </span>

                        </td>

                        <td class="fw-semibold">
                            {{ $item->nama }}
                        </td>

                        <td>
                            <i class="bi bi-envelope-fill text-primary me-1"></i>
                            {{ $item->email }}
                        </td>

                        <td>

                            <span class="badge"
                                style="background:#dbeafe;color:#2563eb;">

                                {{ $item->kelas }}

                            </span>

                        </td>

                        <td>{{ $item->alamat }}</td>

                        <td>{{ $item->no_hp }}</td>

                        <td class="text-center">

                            <a href="{{ route('anggota.edit',$item->id) }}"
                                class="btn btn-sm text-white"
                                style="background:#4facfe;">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('anggota.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm"
                                    onclick="confirmDelete(this.form)">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center text-muted py-5">

                            <i class="bi bi-people fs-1"></i>

                            <br>

                            Belum ada data anggota.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4 d-flex justify-content-center">

            {{ $anggota->links() }}

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