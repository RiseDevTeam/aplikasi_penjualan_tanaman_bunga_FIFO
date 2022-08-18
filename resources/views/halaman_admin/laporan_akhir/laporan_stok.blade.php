@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>
                            <i class="fas fa-boxes"> Laporan Stok</i>
                        </h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Detail Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama Admin</th>
                                        <th>Kode Tanaman</th>
                                        <th>Nama Tanaman</th>
                                        <th>Ukuran</th>
                                        <th>Jumlah Stok Tersedia</th>
                                        <th>Jumlah Stok Terjual</th>
                                        <th>Jenis Tanaman</th>
                                        <th>Harga Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($stok as $i)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $i->user_nama }}</td>
                                            <td>{{ $i->kode_tanaman }}</td>
                                            <td>{{ $i->nm_tanaman }}</td>
                                            <td>{{ $i->ukuran }}</td>
                                            <td>{{ $i->stok }}</td>
                                            <td>{{ $i->stok_jual }}</td>
                                            <td>{{ $i->jenis_tanaman }}</td>
                                            <td>Rp. {{ number_format($i->harga) }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
