@extends('layout.app')
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
                    @can('create', App\Models\Mahasiswa::class)
                        <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary">
                            Tambah Mahasiswa
                        </a>
                    @endcan
                    <!-- general form elements -->
                    <div class="card-body table-responsive p-0">
                        <form method="GET">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">
                                    Cari Data
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari data..." autofocus="true" value="{{ $cari }}">
                                </div>
                            </div>
                        </form>
                        <table id="tblMahasiswas" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>@sortablelink('nim','NIM')</th>
                                    <th>@sortablelink('nama_lengkap','Nama Lengkap')</th>
                                    <th>@sortablelink('jenis_kelamin','Jenis Kelamin')</th>
                                    <th>@sortablelink('jurusan','Jurusan')</th>
                                    <th>@sortablelink('alamat','Alamat')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
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
                <div class="col-md-12">
                    <br>
                    {{-- {{ $mahasiswas->fragment('tblMahasiswas')->links() }} --}}
                    {!! $mahasiswas->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
