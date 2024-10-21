@extends('buku.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">

        @if(count($data_buku))
            <div class="alert alert-success">Ditemukan <strong>{{ count($data_buku) }}
            </strong> data dengan kata: <strong>{{ $cari }}</strong></div>
        @else

            <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
            <a href="/buku" class="btn btn-warning">Kembali</a></div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-center">Daftar Buku</h2>
            <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
        </div>

        @if(Session::has('pesan'))
        <div class="alert alert-success mt-3">{{ Session::get('pesan') }}</div>
        @endif
        @if(Session::has('hapus'))
        <div class="alert alert-success mt-3">{{ Session::get('hapus') }}</div>
        @endif
        @if(Session::has('update'))
        <div class="alert alert-success mt-3">{{ Session::get('update') }}</div>
        @endif

        <div>
            <form action="{{ route('buku.search') }}" method="get">
                @csrf
                <input type="text" name="kata" class="form-control" placeholder="Cari..."
                style="width: 30%; display:inline; margin-top:10px; margin-botton:10px;
                float:right;">
            </form>
        </div>

        <table id="datatable" class="table table-bordered table-hover mt-4">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nomor</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $index => $buku)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. ".number_format($buku->harga, 0, ',', '.') }}</td>
                        <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('buku.edit', $buku->id) }}">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin mau di hapus?')" type="submit"
                                class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <div>{{ $data_buku->links() }}</div>
        </div>
        <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>


    </div>
    @endsection
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script> --}}
</body>
</html>


