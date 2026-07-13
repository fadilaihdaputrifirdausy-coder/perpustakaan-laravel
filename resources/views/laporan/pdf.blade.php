<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Laporan Peminjaman</title>

    <style>

        body{

            font-family: DejaVu Sans, sans-serif;
            font-size:12px;

        }

        h2{

            text-align:center;
            margin-bottom:5px;

        }

        p{

            text-align:center;
            margin-top:0;
            margin-bottom:20px;

        }

        table{

            width:100%;
            border-collapse:collapse;

        }

        table th,
        table td{

            border:1px solid #000;
            padding:8px;
            text-align:center;

        }

        table th{

            background:#eeeeee;

        }

    </style>

</head>

<body>

    <h2>SISTEM INFORMASI PERPUSTAKAAN</h2>

    <p>Laporan Data Peminjaman Buku</p>

    <table>

        <thead>

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

        @foreach($laporan as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->anggota->nama }}</td>

                <td>{{ $item->buku->judul }}</td>

                <td>{{ $item->tgl_pinjam }}</td>

                <td>{{ $item->tgl_kembali }}</td>

                <td>{{ $item->status }}</td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <br><br>

    <div style="text-align:right;">

        Yogyakarta, {{ date('d-m-Y') }}

        <br><br><br><br>

        <strong>Admin Perpustakaan</strong>

    </div>

</body>

</html>