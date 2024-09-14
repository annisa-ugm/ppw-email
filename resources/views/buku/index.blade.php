<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #ffffff; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        table, th, td {
            border: 1px solid #dddddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #e0f7fa; 
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1; 
        }
        .container {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Buku</h2>
        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $index => $buku)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. ".number_format($buku->harga, 2, ',', '.')}}</td>
                        <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                        <td><a href="#">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <strong>Jumlah buku: {{ $jumlah_buku }}</strong>
        <br>
        <strong>Total harga buku: {{ 'Rp'.number_format($total_harga, 2, ',', '.')}}</strong>
    </div>
</body>
</html>