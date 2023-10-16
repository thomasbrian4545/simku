@extends('layout.app')
@section('title', 'Profil Mahasiswa')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil Mahasiswa : {{ $mahasiswa->nama_lengkap }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Profil Mahasiswa</a></li>
                    </ol>
                </div>
                <div class="d-flex col-sm-12">
                    <hr>
                    <a href="{{ route('mahasiswas.edit', ['mahasiswa' => $mahasiswa->id]) }}"
                        class="btn btn-warning">Edit</a>' '
                    <form method="POST" action="{{ route('mahasiswas.destroy', ['mahasiswa' => $mahasiswa->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan') }}
                </div>
            @endif
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
