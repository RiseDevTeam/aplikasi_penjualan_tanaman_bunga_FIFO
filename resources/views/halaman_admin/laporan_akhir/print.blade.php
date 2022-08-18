<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.navbar')
</head>
@include('layouts.script')

<body onload="print()">
    {{-- <section class="content"> --}}
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <h2> Laporan Akhir Penjualan</h2>
        </div>
        <div class="card-header">
            <div class="card-title">
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama Admin</th>
                            <th>Kode Tanaman</th>
                            <th>Nama Tanaman</th>
                            <th>Jumlah Stok Terjual</th>
                            <th>Jumlah Stok Tesisa</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Dijual</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($print as $i)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->user_nama }}</td>
                                <td>{{ $i->kode_tanaman }}</td>
                                <td>{{ $i->nm_tanaman }}</td>
                                <td>{{ $i->stok_jual }}</td>
                                <td>{{ $i->stok }}</td>
                                <td>{{ $i->tanggal }}</td>
                                <td>{{ $i->tanggal_jual }}</td>
                                <td>Rp. {{ number_format($i->harga) }}</td>
                                <td>Rp. {{ number_format($i->harga * $i->stok_jual) }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- </section> --}}
        <div class="d-flex justify-content-end">
            Penanggung Jawab
            <br> <br><br><br><br>
            {{ Auth::user()->name }}
        </div>
    </div>


</body>

</html>
