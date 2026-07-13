@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">

<div class="mb-4">
    <h2 class="fw-bold">Dashboard</h2>
    <p class="text-muted">
        👋 Selamat datang di Sistem Informasi Perpustakaan.
        Kelola seluruh data perpustakaan dengan mudah.
    </p>
</div>

<!-- Statistik -->
<div class="row g-4">

    <div class="col-md-4">
        <div class="card border-0 shadow dashboard-card text-white"
            style="background:linear-gradient(135deg,#8b7cf6,#6f5cf1);">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h6>Total Buku</h6>
                        <h1 class="fw-bold">{{ $totalBuku }}</h1>
                    </div>

                    <i class="bi bi-book-half display-4"></i>

                </div>

            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow dashboard-card text-white"
            style="background:linear-gradient(135deg,#4facfe,#00c6fb);">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h6>Total Anggota</h6>
                        <h1 class="fw-bold">{{ $totalAnggota }}</h1>
                    </div>

                    <i class="bi bi-people-fill display-4"></i>

                </div>

            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow dashboard-card text-white"
            style="background:linear-gradient(135deg,#f7971e,#ffd200);">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h6>Total Peminjaman</h6>
                        <h1 class="fw-bold">{{ $totalPeminjaman }}</h1>
                    </div>

                    <i class="bi bi-arrow-left-right display-4"></i>

                </div>

            </div>

        </div>
    </div>

</div>

<!-- Quick Action -->
<div class="card border-0 shadow mt-5 rounded-4">

    <div class="card-header border-0 text-white rounded-top-4"
        style="background:#6f5cf1;">

        <h5 class="mb-0">
            🚀 Quick Action
        </h5>

    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-12 col-sm-6 col-xl-3">

                <a href="{{ route('buku.create') }}"
                    class="btn w-100 py-3 text-white"
                    style="background:#6f5cf1;">

                    <i class="bi bi-book-half fs-2"></i>

                    <br>

                    Tambah Buku

                </a>

            </div>

            <div class="col-12 col-sm-6 col-xl-3">

                <a href="{{ route('anggota.create') }}"
                    class="btn w-100 py-3 text-white"
                    style="background:#3ea8ff;">

                    <i class="bi bi-people-fill fs-2"></i>

                    <br>

                    Tambah Anggota

                </a>

            </div>

            <div class="col-12 col-sm-6 col-xl-3">

                <a href="{{ route('peminjaman.create') }}"
                    class="btn w-100 py-3 text-dark"
                    style="background:#ffd54f;">

                    <i class="bi bi-arrow-left-right fs-2"></i>

                    <br>

                    Peminjaman

                </a>

            </div>

            <div class="col-12 col-sm-6 col-xl-3">

                <a href="{{ route('laporan.index') }}"
                    class="btn w-100 py-3 text-white"
                    style="background:#495057;">

                    <i class="bi bi-file-earmark-text fs-2"></i>

                    <br>

                    Laporan

                </a>

            </div>

        </div>

    </div>

</div>

<!-- Chart -->
<div class="card border-0 shadow rounded-4 mt-4">

    <div class="card-header border-0 rounded-top-4 text-white"
        style="background:#6f5cf1;">

        <h5 class="mb-0">
            📊 Statistik Perpustakaan
        </h5>

    </div>

    <div class="card-body">

        <canvas id="dashboardChart"></canvas>

    </div>

</div>

<!-- Bulan Ini -->
<div class="row mt-4">

    <div class="col-md-6">

        <div class="card border-0 shadow dashboard-card text-white"
            style="background:linear-gradient(135deg,#7f7fd5,#86a8e7);">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h6>Peminjaman Bulan Ini</h6>

                        <h2 class="fw-bold">
                            {{ $totalPinjamBulanIni }}
                        </h2>

                    </div>

                    <i class="bi bi-calendar-check display-4"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card border-0 shadow dashboard-card text-white"
            style="background:linear-gradient(135deg,#43cea2,#185a9d);">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h6>Pengembalian Bulan Ini</h6>

                        <h2 class="fw-bold">
                            {{ $totalKembaliBulanIni }}
                        </h2>

                    </div>

                    <i class="bi bi-check-circle-fill display-4"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Data Terbaru -->
<div class="row mt-5">

    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4 h-100">

            <div class="card-header text-white border-0 rounded-top-4"
                style="background:#6f5cf1;">

                📚 Buku Terbaru

            </div>

            <div class="card-body">

                <ul class="list-group list-group-flush">

                    @forelse($bukuTerbaru as $buku)

                        <li class="list-group-item">

                            <strong>{{ $buku->judul }}</strong>

                            <br>

                            <small class="text-muted">
                                {{ $buku->penulis }}
                            </small>

                        </li>

                    @empty

                        <li class="list-group-item text-muted">
                            Belum ada data.
                        </li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4 h-100">

            <div class="card-header text-white border-0 rounded-top-4"
                style="background:#3ea8ff;">

                👤 Anggota Terbaru

            </div>

            <div class="card-body">

                <ul class="list-group list-group-flush">

                    @forelse($anggotaTerbaru as $anggota)

                        <li class="list-group-item">

                            <strong>{{ $anggota->nama }}</strong>

                            <br>

                            <small class="text-muted">
                                {{ $anggota->kelas }}
                            </small>

                        </li>

                    @empty

                        <li class="list-group-item text-muted">
                            Belum ada data.
                        </li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4 h-100">

            <div class="card-header border-0 rounded-top-4"
                style="background:#ffd54f;">

                📖 Peminjaman Terbaru

            </div>

            <div class="card-body">

                <ul class="list-group list-group-flush">

                    @forelse($peminjamanTerbaru as $pinjam)

                        <li class="list-group-item">

                            <strong>{{ $pinjam->anggota->nama }}</strong>

                            <br>

                            <small class="text-muted">
                                {{ $pinjam->buku->judul }}
                            </small>

                            <br>

                            <span class="badge {{ $pinjam->status=='Dipinjam' ? 'bg-warning text-dark' : 'bg-success' }}">
                                {{ $pinjam->status }}
                            </span>

                        </li>

                    @empty

                        <li class="list-group-item text-muted">
                            Belum ada data.
                        </li>

                    @endforelse

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

const ctx = document.getElementById('dashboardChart');

new Chart(ctx,{

    type:'bar',

    data:{
        labels:@json($chartLabels),
        datasets:[{

            data:@json($chartData),

            borderRadius:12,

            backgroundColor:[
                '#8b7cf6',
                '#4facfe',
                '#ffd54f'
            ]

        }]
    },

    options:{

        plugins:{
            legend:{
                display:false
            }
        },

        scales:{

            y:{
                beginAtZero:true,
                ticks:{
                    precision:0
                }
            }

        }

    }

});

</script>

@endpush