<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,th,td{
            border:1px solid black;
        }

        th{
            background:#dddddd;
        }

        th,td{
            padding:8px;
            text-align:left;
        }

        h2{
            text-align:center;
        }

    </style>

</head>

<body>

<h2>Data Buku Perpustakaan</h2>

<table>

<thead>

<tr>

    <th>No</th>
    <th>Kode Buku</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Tahun</th>
    <th>Stok</th>

</tr>

</thead>

<tbody>

@foreach($buku as $item)

<tr>

    <td>{{ $loop->iteration }}</td>
    <td>{{ $item->kode_buku }}</td>
    <td>{{ $item->judul }}</td>
    <td>{{ $item->penulis }}</td>
    <td>{{ $item->penerbit }}</td>
    <td>{{ $item->tahun }}</td>
    <td>{{ $item->stok }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>