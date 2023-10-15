@extends('layout.master')
@section('title', 'Data Mahasiswa')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Mahasiswa</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session()->get('pesan') }}
                </div>
            @endif
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary">
                        Tambah Mahasiswa
                    </a>
                    <!-- general form elements -->
                    <div class="card-body">

                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jurusan</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td><a href="{{ url('/mahasiswas/' . $mahasiswa->id) }}">{{ $mahasiswa->nim }}</a>
                                        </td>
                                        <td>{{ $mahasiswa->nama_lengkap }}</td>
                                        <td>{{ $mahasiswa->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                        <td>{{ $mahasiswa->jurusan }}</td>
                                        <td>{{ $mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat }}</td>
                                    </tr>
                                @empty
                                    <td colspan="12" class="text-center">Tidak ada data...</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection