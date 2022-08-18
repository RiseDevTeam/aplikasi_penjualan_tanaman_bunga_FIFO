@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-wheelchair"></i> Kelola Ukuran</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->

            <form action="{{ route('ukuran', $ukuran->kode_tanaman) }}" method="POST">
                @csrf
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="card-title">Tambah data Ukuran</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="">Nama Tanaman</label>
                                    <input type="hidden" name="kode_tanaman" value="{{ $ukuran->kode_tanaman }}">
                                    <input type="text" value="{{ $ukuran->nama_tanaman }}"
                                        class="form-control form-control-sm" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Ukuran</label>
                                    <input type="text" name="ukuran" class="form-control form-control-sm">
                                </div>

                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga_tanaman" id="harga_satuan"
                                        class="form-control form-control-sm" required>
                                    @error('nama_mobil')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kelola_tanaman') }}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->

        <section class="content">
            <!-- Default box -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Kursi Mobil</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Jenis Tanaman</th>
                                    <th>Ukuran</th>
                                    <th>Harga</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = DB::table('ukuran')
                                        ->join('tanaman', 'ukuran.kode_tanaman', '=', 'tanaman.kode_tanaman')
                                        ->where('ukuran.kode_tanaman', $ukuran->kode_tanaman)
                                        ->select('ukuran.*', 'tanaman.nama_tanaman')
                                        ->get();
                                @endphp

                                @foreach ($index as $i)

                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->nama_tanaman }}</td>
                                        <td>{{ $i->ukuran }}</td>
                                        <td>{{ number_format($i->harga) }}</td>
                                        <td>
                                            <form action="{{ route('hapus_ukuran', $i->id_ukuran) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger mt-2 ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script type="text/javascript">
        var rupiah = document.getElementById('harga_satuan');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endsection
