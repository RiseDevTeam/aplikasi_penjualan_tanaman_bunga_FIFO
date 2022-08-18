@extends('tampilan.admin')

@section('title_admin', 'Tampilan Index')

@section('admin')
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1><i class="fas fa-users"></i> Kelola Jenis Tanaman</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Jenis</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <!-- Default box -->
            <a href="{{ route('jenis_tambah') }}" class="btn btn-sm btn-success mb-2"><i class="fas fa-plus"></i>
                Tambah
                Data</a>

            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="card-title">Kelola Jenis Tanaman</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @foreach ($index as $i)
                            <ul class="list-group">
                                <a href="{{ route('detail_jenis', $i->id_jenis) }}">
                                    <li class="list-group-item" style="text-transform: Capitalize; color:black;">
                                        {{ $i->jenis }}</li>
                                </a>
                                <div class="d-flex justify-content-end my-2">
                                    <form action="{{ route('jenis_delete', $i->id_jenis) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-block btn-danger"> <i class="fas fa-trash">
                                            </i>Delete</button>
                                    </form>
                                </div>
                            </ul>
                        @endforeach
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
