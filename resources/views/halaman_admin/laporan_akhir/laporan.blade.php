@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>
                            <i class="fas fa-boxes"> Laporan Akhir Penjualan</i>
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

                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('m');
                        // dd($periode);
                    @endphp
                    <form action="{{ route('cari') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="periode" aria-label="Default select example">
                                @php
                                    $bulan = ['Januari' => '1', 'Februari' => '2', 'Maret' => '3', 'April' => '4', 'Mei' => '5', 'Juni' => '6', 'Juli' => '7', 'Agustus' => '8', 'September' => '9', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'];
                                @endphp
                                <option value="{{ $tgl }}">Pilih Bulan</option>
                                @foreach ($bulan as $b => $value_bulan)
                                    <option value="{{ $value_bulan }}">{{ $b }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            <div class="card-title"><a href="{{ route('laporan') }}"
                                    class="btn btn-danger mt-2 ml-1">Back</a>
                                @if (isset($periode))
                                    <a href="{{ route('print', $periode) }}" target="_blank"
                                        class="btn btn-success mt-2 ml-1">
                                        Print</a>
                                @else
                                    <a href="{{ route('print1') }}" target="_blank" class="btn btn-success mt-2 ml-1">
                                        Print</a>
                                @endif
                            </div>

                        </div>
                    </form>
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
                                        <th>Jumlah Pembelian</th>
                                        <th>Jumlah Stok Tesisa</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Dijual</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($laporan as $i)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $i->user_nama }}</td>
                                            <td>{{ $i->kode_tanaman }}</td>
                                            <td>{{ $i->nm_tanaman }}</td>
                                            <td>{{ $i->ukuran }}</td>
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
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
