@extends('layout.master')
@section('title', 'Biodata Mahasiswa')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Biodata Mahasiswa : {{ $mahasiswa->nama_lengkap }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Biodata Mahasiswa</a></li>
                    </ol>
                </div>
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <ul>
                    <li>NIM: {{ $mahasiswa->nim }} </li>
                    <li>Nama: {{ $mahasiswa->nama_lengkap }} </li>
                    <li>Jenis Kelamin:
                        {{ $mahasiswa->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}
                    </li>
                    <li>Jurusan: {{ $mahasiswa->jurusan }} </li>
                    <li>Alamat:
                        {{ $mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat }}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
