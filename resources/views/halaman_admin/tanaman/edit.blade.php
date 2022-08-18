@extends('tampilan.admin')

@section('title_admin', 'Edit Tanaman')

@section('admin')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-users"></i> Kelola Tanaman</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Tanaman</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->

            <form action="{{ route('tanaman_edit', $edit->id_tanaman) }}" method="POST">
                @csrf
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <div class="card-title">Edit data tanaman</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="">Kode Tanaman</label>
                                    <input type="text" name="kode_tanaman" value="{{ $edit->kode_tanaman }}"
                                        class="form-control form-control-sm" required>
                                    @error('kode_tanaman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Tanaman</label>
                                    <input type="text" name="nama_tanaman" value="{{ $edit->nama_tanaman }}"
                                        class="form-control form-control-sm" required>
                                    @error('nama_tanaman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Harga Tanaman</label>
                                    <input type="text" name="harga" value="{{ $edit->harga }}"
                                        class="form-control form-control-sm" required>
                                    @error('nama_tanaman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Jenis Tanaman</label>
                                    <select class="form-control" name="id_jenis" aria-label="Default select example">
                                        <option selected>{{ $edit->jenis }}</option>
                                        @foreach ($tambah as $t)
                                            <option value="{{ $t->id_jenis }}">{{ $t->jenis }}</option>
                                        @endforeach
                                    </select>
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
    </div>
@endsection
