<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        :root{

                --primary:#6f5cf1;

                --bg:#f5f7fb;

                --sidebar:#232946;

                --navbar:#ffffff;

                --card:#ffffff;

                --text:#1f2937;

                --text-soft:#6c757d;

                --input:#ffffff;

                --border:#e5e7eb;

                --glass:rgba(255,255,255,.75);
                --shadow:0 12px 35px rgba(0,0,0,.08);
                --hover-shadow:0 15px 35px rgba(111,92,241,.25);
                
                

        }

        body.dark-mode{

            --bg:#0f172a;

            --sidebar:#111827;

            --navbar:#1e293b;

            --card:#1e293b;

            --text:#f8fafc;

            --text-soft:#b7b7b7;

            --input:#334155;

            --border:#475569;

            --glass:rgba(255,255,255,.05);
            --shadow:0 15px 35px rgba(0,0,0,.45);
            --hover-shadow:0 15px 35px rgba(111,92,241,.35);
            
        }

        *{
            font-family:'Poppins',sans-serif;
        }

        body{
            
            background:var(--bg);

            color:var(--text);

            overflow-x:hidden;

            transition:.3s;


        }

        .text-muted{

            color:var(--text-soft)!important;

        }

        /* ===========================
                SIDEBAR
        =========================== */

        .sidebar{

            position:fixed;
            top:0;
            left:0;

            width:260px;
            height:100vh;

            background:var(--sidebar);

            border-right:1px solid rgba(255,255,255,.08);

            box-shadow:var(--shadow);

            backdrop-filter:blur(20px);

            padding:25px 20px;

            transition:.35s;

        }

        .logo{

            text-align:center;
            color:white;

            font-size:26px;
            font-weight:700;

            margin-bottom:5px;

        }

        .logo-sub{

            text-align:center;
            color:#c9ccdf;

            font-size:13px;

            margin-bottom:35px;

        }

        .sidebar a{

            display:block;

            text-decoration:none;

            color:#d8dcf0;

            padding:13px 18px;

            border-radius:12px;

            margin-bottom:10px;

            transition:.3s;

            font-weight:500;

        }

        .sidebar a i{

            margin-right:10px;

        }

        .sidebar a:hover{

            background:var(--primary);

            box-shadow:0 0 18px rgba(111,92,241,.35);

            color:white;


        }

        .sidebar a.active{

            background:var(--primary);

            color:white;

            box-shadow:0 10px 30px rgba(111,92,241,.45);

        }

        /* ===========================
                CONTENT
        =========================== */

        .content{

            margin-left:260px;
            width:calc(100% - 260px);
            min-height:100vh;
            padding:30px;

        }

        /* ===========================
                NAVBAR
        =========================== */

        .navbar{

            background:var(--glass);

            backdrop-filter:blur(18px);

            -webkit-backdrop-filter:blur(18px);

            border:1px solid rgba(255,255,255,.08);

            border-radius:20px;

            box-shadow:var(--shadow);

            position:relative;

            z-index:1055;

        }

        body.dark-mode .navbar{

            background:rgba(255,255,255,.05);

            backdrop-filter:blur(18px);

            -webkit-backdrop-filter:blur(18px);

            border:1px solid rgba(255,255,255,.08);

        }

        .navbar-brand{

            font-weight:700;

            color:var(--text);

        }
        
        /* ===========================
                DROPDOWN
        =========================== */

        .dropdown-menu{

            background:var(--card);

            color:var(--text);

            border:1px solid rgba(255,255,255,.08);

            z-index:99999;

        }

        .dropdown-item{

            color:var(--text);

        }

        .dropdown-item:hover{

            background:var(--hover);

        }

        /* ===========================
                CARD
        =========================== */

        .card{

            border:none;

            background:var(--card);

            color:var(--text);

            border-radius:18px;

            box-shadow:0 10px 25px rgba(0,0,0,.05);

            transition:.3s;

        }

        body.dark-mode .card{

            background:rgba(36,41,61,.88)!important;

            backdrop-filter:blur(18px);

            -webkit-backdrop-filter:blur(18px);

            border:1px solid rgba(255,255,255,.08);

        }

        .card-body{

            background:transparent;

            color:var(--text);

        }

        body.dark-mode .card-body{

            background:transparent!important;

        }

        .card-header{

            border:none;

            border-radius:18px 18px 0 0 !important;

        }

        body.dark-mode .card-header{

           

        }

        .dashboard-card{

            background:linear-gradient(135deg,var(--primary),#8b7cf6);

            border-radius:18px;

            transition:.35s;

        }       

        body.dark-mode .dashboard-card{

            color:white;

            }

        .dashboard-card:hover{

            transform:translateY(-8px);

            box-shadow:var(--hover-shadow);

        }

        body.dark-mode .input-group{

            border:1px solid rgba(255,255,255,.08);

            border-radius:18px;

            overflow:hidden;

        }

        body.dark-mode .input-group-text,
        body.dark-mode .form-control,
        body.dark-mode .btn{

            border:none!important;

        }

        body.dark-mode .input-group-text{

            background:rgba(255,255,255,.05)!important;

        }

        body.dark-mode .form-control{

            background:rgba(255,255,255,.05)!important;

        }

        body.dark-mode .btn-outline-secondary{

            background:rgba(255,255,255,.05)!important;

        }

        body.dark-mode .search-header{

            background:transparent !important;

        }

        /* ===========================
                BUTTON
        =========================== */

        .btn{

            border-radius:12px;

            font-weight:500;

            transition:.25s;

        }

        .btn:hover{

            transform:translateY(-2px);

            box-shadow:var(--hover-shadow);

        }

        .btn-outline-secondary{

            color:var(--text);

            border-color:var(--border);

        }

        .btn-outline-secondary:hover{

            background:var(--hover);

            color:var(--text);

            border-color:var(--primary);

        }

        body.dark-mode .btn-outline-secondary{

            background:rgba(255,255,255,.05);

            border-color:rgba(255,255,255,.08);

            color:#fff;

        }

        body.dark-mode .btn-outline-secondary:hover{

            background:rgba(255,255,255,.10);

            color:#fff;

        }

        /* ===========================
                    FORM
        =========================== */

        .form-control,
        .form-select,
        textarea{

            background:var(--input)!important;

            color:var(--text)!important;

            border:1px solid var(--border)!important;

        }

        .input-group>.form-control,
        .input-group>.form-select,
        .input-group>.input-group-text{

            background:var(--input)!important;

            color:var(--text)!important;

            border-color:var(--border)!important;

        }

        body.dark-mode .input-group>.form-control,
        body.dark-mode .input-group>.input-group-text{

            background:rgba(255,255,255,.05)!important;

            color:white!important;

            border-color:rgba(255,255,255,.08)!important;

        }

        .form-control::placeholder{

            color:var(--text-soft)!important;

        }

        .form-control:focus,
        .form-select:focus{

            background:var(--input)!important;

            color:var(--text)!important;

            border-color:var(--primary);

            box-shadow:none;

        }

        body.dark-mode .form-control,
        body.dark-mode .form-select,
        body.dark-mode .input-group-text,
        body.dark-mode textarea{

            background:rgba(255,255,255,.04) !important;

            border:1px solid rgba(255,255,255,.08);

            color:#fff !important;

        }

        body.dark-mode .form-control::placeholder{

            color:rgba(255,255,255,.45);

        }

        .input-group-text{

            background:var(--input);

            color:var(--text);

            border:1px solid var(--border);

        }

        .input-group{

            background:var(--input);

            border-radius:14px;

        }
    

                /* ===========================
                TABLE
        =========================== */

        .table{

            background:var(--card);

            color:var(--text);

            border-radius:12px;

            overflow:hidden;

        }

        .table thead{

            background:var(--table)!important;

            border-color:var(--border);

            body:not(.dark-mode) .table thead th{

                color:#232946 !important;

            }

            body.dark-mode .table thead th{

                color:white !important;

            }

        }

        /* Tambahkan mulai dari sini */

        .table thead th{

            background:var(--table)!important;

            color:var(--thead-text);

            border-color:var(--border);

        }

        .table th,
        .table td{

            background:transparent !important;

            color:var(--text);

            border-color:var(--border);

        }

        .table tbody tr{

            background:transparent;

        }

        .table-hover tbody tr:hover{

            background:var(--hover);

        }

        body.dark-mode .table{

            background:transparent;

        }

        body.dark-mode .table td{

            background:transparent!important;

        }

        body.dark-mode .table tbody tr{

            border-color:rgba(255,255,255,.06);

        }

        body.dark-mode .table-hover tbody tr:hover{

            background:rgba(255,255,255,.04)!important;

        }

        .page-link{

            background:var(--card);

            color:var(--text);

            border:1px solid var(--border);

        }

        .page-item.active .page-link{

            background:var(--primary);

            border-color:var(--primary);

        }

        .page-link:hover{

            background:var(--hover);

            color:var(--text);

        }

        .page-item.disabled .page-link{

            background:var(--card);

            color:var(--text-soft);

            border-color:var(--border);

        }

        body.dark-mode .page-link{

            background:rgba(255,255,255,.05);

            color:white;

            border-color:rgba(255,255,255,.08);

        }

        body.dark-mode .page-link:hover{

            background:rgba(255,255,255,.10);

        }

        body.dark-mode .list-group-item{

            background:transparent;

            color:white;

            border-color:rgba(255,255,255,.06);

        }

        /* ===========================
                FOOTER
        =========================== */

        footer{

            margin-top:60px;

            color:#888;

        }

        /* ===========================
            SCROLLBAR
        =========================== */

        ::-webkit-scrollbar{

            width:9px;

        }

        ::-webkit-scrollbar-track{

            background:#ececf6;

        }

        ::-webkit-scrollbar-thumb{

            background:var(--primary);

            border-radius:50px;

        }

        /* ===========================
                    RESPONSIVE
           =========================== */

        @media (max-width:992px){

            .sidebar{

                left:-270px;

            }

            .sidebar.show{

                left:0;

            }

            .content{

                margin-left:0;

                width:100%;

                padding:20px;

            }

            .navbar{

                padding:15px;

            }

        }

        .sidebar-overlay{

            position:fixed;

            top:0;
            left:0;

            width:100%;
            height:100%;

            background:rgba(0,0,0,.35);

            display:none;

            z-index:1039;

        }

        .sidebar-overlay.show{

            display:block;

        }

        /* ===========================
            PRINT
        =========================== */

        @media print{

            .sidebar{
                display:flex;
                flex-direction:column;
                min-height:100vh;
            }
            .navbar,
            footer,
            .btn,
            .card-header{

                display:none!important;

            }

            .content{

                margin:0 !important;
                margin-left:0 !important;
                width:100% !important;
                max-width:100% !important;
                padding:0 !important;

            }

            .card{

                border:none!important;

                box-shadow:none!important;

            }

            body{

                background:white!important;

            }

            table{

                font-size:12px;

            }

        }

    </style>

</head>

<body>

<div class="sidebar-overlay"></div>

<div class="d-flex">

    <!-- Sidebar -->

    <div class="sidebar d-flex flex-column">

    <div>

        <div class="logo">
            📚 SIMPERPUS
        </div>

        <div class="logo-sub">
            Sistem Informasi Perpustakaan
        </div>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-speedometer2"></i>
            Dashboard

        </a>

        <a href="{{ route('buku.index') }}"
           class="{{ request()->routeIs('buku.*') ? 'active' : '' }}">

            <i class="bi bi-book-half"></i>
            Data Buku

        </a>

        <a href="{{ route('anggota.index') }}"
           class="{{ request()->routeIs('anggota.*') ? 'active' : '' }}">

            <i class="bi bi-people-fill"></i>
            Data Anggota

        </a>

        <a href="{{ route('peminjaman.index') }}"
           class="{{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">

            <i class="bi bi-arrow-left-right"></i>
            Peminjaman

        </a>

        <a href="{{ route('laporan.index') }}"
           class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">

            <i class="bi bi-file-earmark-bar-graph"></i>
            Laporan

        </a>

    </div>

    <div class="mt-auto mb-3">

        <hr class="text-white">

        <form id="logout-form" action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="button"
                    class="btn btn-outline-light w-100"
                    onclick="confirmLogout()">

                <i class="bi bi-box-arrow-left"></i>

                Logout

            </button>

        </form>

    </div>

</div>

    <!-- Content -->

    <div class="content">

        <nav class="navbar mb-4">

            <div class="container-fluid">

                <div class="d-flex align-items-center">

                    <button
                        class="btn btn-outline-secondary d-lg-none me-3"
                        id="menu-toggle">

                        <i class="bi bi-list fs-4"></i>

                    </button>

                    <span class="navbar-brand mb-0">

                        📚 Sistem Informasi Perpustakaan

                    </span>

                </div>

                <div class="d-flex justify-content-end align-items-center">

                    <button

                        id="darkToggle"
                        class="btn btn-light rounded-circle me-3"
                        style="width:45px;height:45px;">

                        🌙

                    </button>

                    <div class="dropdown me-3">

                    <button
                        class="btn btn-outline-secondary"
                        data-bs-toggle="dropdown">

                        🎨

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a class="dropdown-item theme-color"
                            data-color="#6f5cf1"
                            href="#">

                                🟣 Ungu

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item theme-color"
                            data-color="#2563eb"
                            href="#">

                                🔵 Biru

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item theme-color"
                            data-color="#16a34a"
                            href="#">

                                🟢 Hijau

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item theme-color"
                            data-color="#dc2626"
                            href="#">

                                🔴 Merah

                            </a>

                        </li>

                        <li>

                            <a class="dropdown-item theme-color"
                            data-color="#ea580c"
                            href="#">

                                🟠 Orange

                            </a>

                        </li>

                    </ul>

                </div>

                    <div class="text-end me-3">

                        <div class="fw-semibold">

                            👋 Selamat Datang, {{ session('admin_username') }}

                        </div>

                        <small class="text-muted" id="datetime"></small>

                    </div>

                    @php
                        $admin = \App\Models\Admin::find(session('admin_id'));
                    @endphp

                    <div class="dropdown">

                        <a href="#"
                            data-bs-toggle="dropdown"
                            class="text-decoration-none">

                            @if($admin && $admin->foto)

                                <img
                                    src="{{ asset('storage/'.$admin->foto) }}"
                                    class="rounded-circle shadow-sm"
                                    width="48"
                                    height="48"
                                    style="object-fit:cover; cursor:pointer;">

                            @else

                                <img
                                    src="https://ui-avatars.com/api/?name={{ session('admin_username') }}&background=6f5cf1&color=fff"
                                    class="rounded-circle shadow-sm"
                                    width="48"
                                    height="48"
                                    style="cursor:pointer;">

                            @endif

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">

                            <li class="text-center py-3">

                                @if($admin && $admin->foto)

                                    <img
                                        src="{{ asset('storage/'.$admin->foto) }}"
                                        class="rounded-circle mb-2"
                                        width="70"
                                        height="70"
                                        style="object-fit:cover;">

                                @else

                                    <img
                                        src="https://ui-avatars.com/api/?name={{ session('admin_username') }}&background=6f5cf1&color=fff"
                                        class="rounded-circle mb-2"
                                        width="70">

                                @endif

                                <div class="fw-bold">

                                    {{ session('admin_username') }}

                                </div>

                                <small class="text-muted">

                                    Administrator

                                </small>

                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>

                                <a class="dropdown-item"
                                    href="{{ route('profil') }}">

                                    <i class="bi bi-person-circle me-2"></i>
                                    Ganti Profil

                                </a>

                            </li>

                            <li>

                                <a class="dropdown-item"
                                    href="{{ route('password') }}">

                                    <i class="bi bi-key me-2"></i>
                                    Ganti Password

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </nav>

        @yield('content')

        <footer class="mt-5 text-center text-muted">

    <hr>

    <p>
        © 2026 Sistem Informasi Perpustakaan
        <br>
        Developed by <strong>Dilaa</strong> ❤️
    </p>

</footer>

    </div>

</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script dari masing-masing halaman -->
@stack('scripts')

{{-- Sweet Alert Success --}}
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

<!-- Fungsi Delete Global -->
<script>
function confirmDelete(form){

    Swal.fire({
        title: 'Hapus Data?',
        text: 'Data yang dihapus tidak dapat dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8B5CF6',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if(result.isConfirmed){
            form.submit();
        }
    });

}
</script>

<!-- Jam & Tanggal -->
<script>

function updateClock(){

    const now = new Date();

    const option = {
        weekday:'long',
        day:'2-digit',
        month:'long',
        year:'numeric'
    };

    const tanggal = now.toLocaleDateString('id-ID', option);
    const jam = now.toLocaleTimeString('id-ID');

    document.getElementById('datetime').innerHTML =
        tanggal + " | " + jam + " WIB";

}

setInterval(updateClock,1000);
updateClock();

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmLogout() {

    Swal.fire({
        title: 'Logout?',
        text: 'Apakah Anda yakin ingin keluar dari sistem?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: getComputedStyle(document.documentElement)
        .getPropertyValue('--primary'),
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal'
    }).then((result) => {

        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }

    });

}
</script>

<script>

const menuToggle = document.getElementById("menu-toggle");
const sidebar = document.querySelector(".sidebar");
const overlay = document.querySelector(".sidebar-overlay");

if(menuToggle){

    menuToggle.addEventListener("click",function(){

        sidebar.classList.toggle("show");
        overlay.classList.toggle("show");

    });

}

overlay.addEventListener("click",function(){

    sidebar.classList.remove("show");
    overlay.classList.remove("show");

});

</script>

<script>

const darkToggle = document.getElementById("darkToggle");

// Saat halaman pertama kali dibuka
if(localStorage.getItem("theme") === "dark"){

    document.body.classList.add("dark-mode");
    darkToggle.innerHTML = "☀️";

}

// Saat tombol diklik
darkToggle.addEventListener("click", function(){

    document.body.classList.toggle("dark-mode");

    if(document.body.classList.contains("dark-mode")){

        localStorage.setItem("theme","dark");
        darkToggle.innerHTML = "☀️";

    }else{

        localStorage.setItem("theme","light");
        darkToggle.innerHTML = "🌙";

    }

});

</script>

<script>

const colors = document.querySelectorAll(".theme-color");

const savedColor = localStorage.getItem("themeColor");

if(savedColor){

    document.documentElement.style.setProperty("--primary", savedColor);

}

colors.forEach(item=>{

    item.addEventListener("click",function(e){

        e.preventDefault();

        const color = this.dataset.color;

        document.documentElement.style.setProperty("--primary", color);

        localStorage.setItem("themeColor", color);

    });

});

</script>

</body>
</html>