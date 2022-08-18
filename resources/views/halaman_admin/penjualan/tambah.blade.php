@extends('tampilan.admin')

@section('title_admin', 'Tambah Stok')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-boxes">Kelola Penjualan</i></h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->

            <form action="{{ route('jual') }}" method="POST">
                @csrf
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <div class="card-title">Penjualan</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <input type="hidden" name="id_stok" id="id_stok">
                                <div class="form-group">
                                    <label for="">Jenis Tanaman</label>
                                    <select class="form-control" onchange="jenis(this);"
                                        aria-label="Default select example">
                                        <option selected>Nama Tanaman</option>
                                        @foreach ($jenis_tanaman as $t)
                                            <option value="{{ $t->id_jenis }}">{{ $t->jenis }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_tanaman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- <div class="row"> --}}
                                <div class="col">
                                    <label for=""> Nama Tanaman</label>
                                    <select class="form-control" id="nama_tanaman" name="kode_tanaman"
                                        aria-label="Default select example" onchange="namaTanaman(this.value);">
                                        <option selected>Select</option>
                                    </select>
                                </div>
                                {{-- </div> --}}

                                <div class="row">
                                    <div class="col">
                                        <label for=""> Stok Tersedia</label>
                                        <input type="text" name="id_stok" id="stok_tanaman" class="form-control"
                                            placeholder="Kode Tanaman" readonly>
                                    </div>
                                    <div class="col">
                                        <label for=""> Ukuran Tanaman Per CM</label>
                                        <input type="text" name="ukuran" class="form-control" id="id_ukuran">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for=""> Harga Tanaman</label>
                                    <input type="hidden" id="harga_tanaman" class="form-control" readonly>
                                    <input type="text" id="harga_tanaman2" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Kuantiti Dijual </label>
                                    <input type="text" name="stok_jual" id="id_kuantiti"
                                        class="form-control form-control-sm" placeholder="Jumlah Pembelian" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal_jual" class="form-control form-control-sm" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Tipe Pembayaran</label>
                                    <select class="form-control" name="pembayaran" aria-label="Default select example">
                                        <option selected>Pilih Pembayaran</option>
                                        <option value="tunai">Tunai</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Total Pembayaran</label>
                                    <input type="text" name="total_pembayaran" value="{{ old('total_bayar') }}"
                                        id="harga_satuan" class="form-control form-control-sm" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kelola_penjualan') }}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        function jenis(val) {
            $.ajax({
                type: 'post',
                url: "{{ route('ajax_jual') }}",
                datatype: 'HTML',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "jenis_tanaman": val.value
                },
                success: function(response) {
                    const data = response
                    const namaTanaman = document.getElementById("nama_tanaman")

                    data.forEach(e => {
                        let optNama = document.createElement('option');
                        optNama.value = e.kode_tanaman;
                        optNama.innerHTML = `${e.nama_tanaman} (${e.kode_tanaman})`;
                        namaTanaman.appendChild(optNama);
                    });
                }
            })
        }

        function namaTanaman(kode_tanaman) {
            $.ajax({
                type: 'post',
                url: "{{ route('ajax_harga') }}",
                datatype: 'HTML',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "kode_tanaman": kode_tanaman
                },
                success: function(response) {
                    const data = response
                    // console.log(data.stok)
                    const hargaTanaman = document.getElementById("harga_tanaman")
                    const ukuranTanaman = document.getElementById("id_ukuran")
                    const stokTanaman = document.getElementById("stok_tanaman")

                    hargaTanaman.value = data.harga_tanaman
                    stokTanaman.value = data.stok
                    document.getElementById('harga_tanaman2').value = data.harga_tanaman;

                    data.ukuran.forEach(e => {
                        let optUkuran = document.createElement('option');
                        optUkuran.value = e.harga;
                        optUkuran.innerHTML = e.ukuran;
                        ukuranTanaman.appendChild(optUkuran);
                    });
                }
            })
        }

        const ukuranTanaman = document.getElementById('id_ukuran')
        ukuranTanaman.addEventListener('keyup', function() {
            const harga = document.getElementById("harga_tanaman2").value
            document.getElementById("harga_tanaman").value = parseInt(harga) * parseInt(this.value)
        })

        var rupiah = document.getElementById('harga_satuan');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString(),
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

        let kuantiti = document.getElementById('id_kuantiti')
        kuantiti.addEventListener("keyup", function() {
            let harga = document.getElementById('harga_tanaman').value
            let totalPembayaran = document.getElementById('harga_satuan')
            let total = harga * this.value
            totalPembayaran.value = formatRupiah(total, 'Rp. ')
        });
    </script>

@endsection
