<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <title>Label Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#eceff4;
            font-family:'Segoe UI',sans-serif;
        }

        .label{

            width:430px;
            margin:40px auto;
            background:#fff;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(0,0,0,.18);

        }

        .header{

            background:#6f5cf1;
            color:#fff;
            padding:18px;
            text-align:center;

        }

        .header h3{

            margin:0;
            font-weight:700;
            letter-spacing:1px;

        }

        .body{

            padding:25px;

        }

        .cover{

            width:120px;
            height:165px;
            object-fit:cover;
            border-radius:12px;
            border:2px solid #ddd;

        }

        .judul{

            font-size:23px;
            font-weight:bold;
            margin-top:15px;

        }

        .kode{

            display:inline-block;
            background:#6f5cf1;
            color:white;
            padding:5px 15px;
            border-radius:30px;
            font-weight:bold;
            margin-top:10px;

        }

        .table-detail{

            width:100%;
            margin-top:25px;

        }

        .table-detail td{

            padding:7px 0;
            vertical-align:top;

        }

        .table-detail .label{

            width:100px;
            font-weight:600;

        }

        .table-detail .colon{

            width:15px;
            text-align:center;

        }

        .barcode{

            margin-top:30px;
            display:flex;
            justify-content:center;

        }

        .barcode table{

            margin:auto;

        }

        .barcode-text{

            font-weight:bold;
            letter-spacing:2px;
            text-align:center;

        }

        .qr{

            margin-top:25px;
            text-align:center;

        }

        .footer{

            text-align:center;
            margin-top:25px;
            color:#888;
            font-size:13px;

        }

        .btn-print{
            width:100%;
            margin-top:30px;
        }

        .btn-kembali{
            width:100%;
            background:#f3f0ff;
            color:#6f5cf1;
            border:1px solid #d8d0ff;
            border-radius:8px;
            padding:6px 12px;   /* lebih pendek */
            text-decoration:none;
            display:block;
            text-align:center;
            margin-top:10px;
            font-size:16px;
            font-weight:500;
            line-height:1.5;
            transition:.2s;
        }

        .btn-kembali:hover{
            background:#e8e1ff;
            color:#5c49dd;
        }

        .btn-secondary{
            background:#c9ced6;
            border:none;
            color:#2c3e50;
        }

        .btn-secondary:hover{
            background:#b8bec7;
            color:#2c3e50;
        }

        @media print{

            body{
                background:white;
            }

            .btn-print,
            .btn-kembali{
                display:none;
            }

            .label{
                box-shadow:none;
                border:2px solid #000;
            }

        }

    </style>

</head>

<body>

<div class="label">

    <div class="header">

        <h3>📚 LABEL BUKU</h3>

        <small>Sistem Informasi Perpustakaan</small>

    </div>

    <div class="body text-center">

        @if($buku->cover)

            <img src="{{ asset('storage/'.$buku->cover) }}"
                 class="cover">

        @endif

        <div class="judul">

            {{ $buku->judul }}

        </div>

        <div class="kode">

            {{ $buku->kode_buku }}

        </div>

        <table class="table-detail">

        <tr>
            <td class="label">Penulis</td>
            <td class="colon">:</td>
            <td>{{ $buku->penulis }}</td>
        </tr>

        <tr>
            <td class="label">Penerbit</td>
            <td class="colon">:</td>
            <td>{{ $buku->penerbit }}</td>
        </tr>

        <tr>
            <td class="label">Tahun</td>
            <td class="colon">:</td>
            <td>{{ $buku->tahun }}</td>
        </tr>

    </table>
        <hr>

        <div class="barcode">

            {!! DNS1D::getBarcodeHTML($buku->kode_buku,'C128',2,70) !!}

        </div>

        <div class="barcode-text">

            {{ $buku->kode_buku }}

        </div>

        <div class="qr">

            {!! QrCode::size(140)->generate($buku->kode_buku) !!}
        </div>

        <div class="footer">

            Scan QR Code untuk identitas buku

        </div>

        <button onclick="window.print()"
                class="btn btn-primary w-100 mt-4 btn-print">

            <i class="bi bi-printer"></i>
            Cetak Label

        </button>

        <a href="{{ route('buku.index') }}"
            class="btn-kembali btn-print">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

        </div>

    </div>

</div>

</body>

</html>