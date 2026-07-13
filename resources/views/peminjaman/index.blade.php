@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">📖 Data Peminjaman</h2>

        <p class="text-muted mb-0">
            Kelola seluruh transaksi peminjaman buku.
        </p>

    </div>

    <a href="{{ route('peminjaman.create') }}"
        class="btn text-white shadow"
        style="background:#6f5cf1;">

        <i class="bi bi-plus-circle"></i>
        Tambah Peminjaman

    </a>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead style="background:#f2efff;">

                    <tr>

                        <th>No</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th width="150" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($peminjaman as $item)

                    <tr>

                        <td>
                            {{ ($peminjaman->currentPage()-1) * $peminjaman->perPage() + $loop->iteration }}
                        </td>

                        <td>

                            <strong>

                                {{ $item->anggota->nama }}

                            </strong>

                        </td>

                        <td>

                            {{ $item->buku->judul }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($item->tgl_pinjam)->format('d M Y') }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($item->tgl_kembali)->format('d M Y') }}

                        </td>

                        <td>

                            @if($item->status == 'Dipinjam')

                                <span class="badge rounded-pill bg-warning text-dark">

                                    {{ $item->status }}

                                </span>

                            @else

                                <span class="badge rounded-pill bg-success">

                                    {{ $item->status }}

                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            <a href="{{ route('peminjaman.edit',$item->id) }}"
                                class="btn btn-sm text-white"
                                style="background:#4facfe;">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('peminjaman.destroy',$item->id) }}"
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

                            <i class="bi bi-journal-x fs-1"></i>

                            <br>

                            Belum ada data peminjaman.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4 d-flex justify-content-center">

            {{ $peminjaman->links() }}

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