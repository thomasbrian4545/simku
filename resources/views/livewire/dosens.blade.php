<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Dosen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Dosen</a></li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card-body table-responsive p-0">
                        <table id="tblDosens" class="table table-hover text-nowrap">
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="text" wire:model.live='q' class="form-control"
                                        placeholder="Search...">
                                </div>
                                <div class="col-auto">
                                    <select wire:model.live='perPage' class="form-control">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button @click="$dispatch('reset-modal')"
                                        type="button" class="btn btn-primary btn" data-toggle="modal"
                                        data-target="#modal-default">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1 + ($dosens->currentPage() - 1) * $dosens->perPage();
                                @endphp
                                @forelse ($dosens as $dosen)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dosen->nama_lengkap }}</td>
                                        <td><button @click="$dispatch('edit-mode',{id:{{ $dosen->id }}})"
                                                type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#modal-default"><i class="fas fa-edit"></i></button></td>
                                    </tr>
                                @empty
                                    <td colspan="12" class="text-center">Tidak ada data...</td>
                                @endforelse
                            </tbody>
                        </table>
                        <span>
                            {{ $dosens->links() }}
                            {{-- {!! $dosens->appends(Request::except('page'))->render() !!} --}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div wire:ignore.self class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $formTitle ?? 'Tambah' }}</h4>
                    <button wire:click='close' type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input wire:model='nama_lengkap' type="text"
                                class="form-control @error('nama_lengkap')
                                is-invalid
                            @enderror">
                            @error('nama_lengkap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    @if ($formEdit)
                        <button wire:click='close' type="button" class="btn btn-default"
                            data-dismiss="modal">Batal</button>
                        <button wire:click='update' type="button" class="btn btn-warning"
                            data-dismiss="modal">Edit</button>
                    @else
                        <button wire:click='close' type="button" class="btn btn-default"
                            data-dismiss="modal">Batal</button>
                        <button wire:click='save' type="button" class="btn btn-primary"
                            data-dismiss="modal">Simpan</button>
                    @endif
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
