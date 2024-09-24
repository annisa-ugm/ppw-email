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
        h2, h4 {
            text-align: center;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
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
            background-color: #0277bd; 
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 10px 15px;
            background-color: #2bbd02;
            color: white;
            text-decoration: none;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #24a700;
        }
        .btn-danger {
            background-color: #d32f2f;
        }
        .btn-danger:hover {
            background-color: #b71c1c;
        }
        .actions {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>
<body>
    <a href="{{route('buku.create')}}" class="btn btn-primary float-end">Tambah Buku</a>
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
                    <th>Delete</th>
                    <th>Update</th>
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
                        <td>
                            <form action="{{route('buku.destroy', $buku->id) }}" method="POST">
                                {{-- actionnya memanggil route karena route ini akan menjalankan
                                atau memanggil controller yang didefinisikan di routenya. jadi disini
                                adalah route buku.destroy akan manggil method destroy --}}
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin mau di hapus?')" type="submit"
                                class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn" href="{{route('buku.edit', $buku->id) }}">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

{{-- fungsi view adalah untuk tampilkan informasi kpd
user dlm beentuk antarmuka(UI). view adl bagian dari MVC
(model-view-controller), dmn view berperan utk merender
tampilan aplikasi web --}}