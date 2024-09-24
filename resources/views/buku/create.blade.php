<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            width: 50%;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border-radius: 8px;
        }
        h4 {
            text-align: center;
            color: #333;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        button, a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #0277bd;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }
        button:hover, a:hover {
            background-color: #01579b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="post" action="{{route('buku.store')}}">
            @csrf
            <div>Judul <input type="text" name="judul"></div>
            <div>Penulis <input type="text" name="penulis"></div>
            <div>Harga <input type="text" name="harga"></div>
            <div>Tanggal Terbit <input type="date" name="tgl_terbit"></div>
            {{-- <button type="submit">Simpan</button>
            <a href="{{'/buku'}}">Kembali</a> --}}

            <div style="display: flex; justify-content: space-between; gap:20px; margin-top: 20px;">
                {{-- <button href="{{'/buku'}}">Kembali</button> --}}
                <a class="btn" href="{{'/buku'}}">Kembali</a>
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
