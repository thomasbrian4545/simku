@extends('layout.master')
@section('title', 'Form Mahasiswa')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Form Mahasiswa</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('mahasiswas.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label" for="nim">NIM</label>
                                    <input type="text" id="nim" name="nim" value="{{ old('nim') }}"
                                        class="form-control @error('nim') is-invalid @enderror" placeholder="NIM">
                                    @error('nim')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                                        value="{{ old('nama_lengkap') }}"
                                        class="form-control @error('nama_lengkap') is-invalid @enderror"
                                        placeholder="Nama Lengkap">
                                    @error('nama_lengkap')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki"
                                            value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                                            value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="jurusan">Jurusan</label>
                                    <select class="form-control" name="jurusan" id="jurusan" value="{{ old('jurusan') }}">
                                        <option value="Teknik Informatika"
                                            {{ old('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>
                                            Teknik Informatika
                                        </option>
                                        <option value="Sistem Informasi"
                                            {{ old('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>
                                            Sistem Informasi
                                        </option>
                                        <option value="Ilmu Komputer"
                                            {{ old('jurusan') == 'Ilmu Komputer' ? 'selected' : '' }}>
                                            Ilmu Komputer
                                        </option>
                                        <option value="Teknik Komputer"
                                            {{ old('jurusan') == 'Teknik Komputer' ? 'selected' : '' }}>
                                            Teknik Komputer
                                        </option>
                                        <option value="Teknik Telekomunikasi"
                                            {{ old('jurusan') == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                                            Teknik Telekomunikasi
                                        </option>
                                    </select>
                                    @error('jurusan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
