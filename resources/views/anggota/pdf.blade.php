<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Data Anggota</title>

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

        table, th, td{
            border:1px solid #000;
        }

        th{
            background:#eeeeee;
        }

        th, td{
            padding:8px;
            text-align:left;
        }

    </style>

</head>

<body>

    <h2>SISTEM INFORMASI PERPUSTAKAAN</h2>

    <p>Data Anggota Perpustakaan</p>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Nomor Anggota</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No HP</th>

            </tr>

        </thead>

        <tbody>

        @foreach($anggota as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nomor_anggota }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_hp }}</td>

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