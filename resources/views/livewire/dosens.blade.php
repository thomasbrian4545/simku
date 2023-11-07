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
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="text" wire:model.live='q' class="form-control" placeholder="Search...">
                                </div>
                                <div class="col-auto">
                                    <select wire:model.live='perPage' class="form-control">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
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
                                @forelse ($dosens as $dosen)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $dosen->nama_lengkap }}</td>
                                    </tr>
                                @empty
                                    <td colspan="12" class="text-center">Tidak ada data...</td>
                                @endforelse
                            </tbody>
                        </table>
                        <span>{{ $dosens->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
