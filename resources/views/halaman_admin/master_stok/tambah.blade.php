@extends('tampilan.admin')

@section('title_admin', 'Tambah Stok')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-boxes">Kelola Stok</i></h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Stok</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->

            <form action="{{ route('stok_tambah') }}" method="POST">
                @csrf
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <div class="card-title">Tambah data stok</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="">Kode_tanaman</label>
                                    <input type="text" name="kode_tanaman" class="form-control" id="kode" readonly>
                                </div>

                                <div class="form-group">
                                    @php
                                        $tanaman = DB::table('tanaman')->get();
                                    @endphp
                                    <label for="">Nama Tanaman</label>
                                    <select class="form-control" onchange="tanaman(this);"
                                        aria-label="Default select example">
                                        <option selected>Nama Tanaman</option>
                                        @foreach ($tanaman as $t)
                                            <option value="{{ $t->nama_tanaman }}">{{ $t->nama_tanaman }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_tanaman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Stok Tanaman</label>
                                    <input type="text" name="stok" class="form-control form-control-sm" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control form-control-sm" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('kelola_stok') }}" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

    <script>
        function tanaman(val) {
            $.ajax({
                url: "{{ route('ajax_stok') }}",
                type: 'POST',
                datatype: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "stok": val.value
                },

                success: function(response) {
                    console.log(response);
                    $('#kode').val(response.kode_tanaman)
                }
            })
        }
    </script>


@endsection
