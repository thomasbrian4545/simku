@csrf
<div class="card-body">
    <div class="form-group">
        <label class="form-label" for="nim">NIM</label>
        <input type="text" id="nim" name="nim" value="{{ old('nim') ?? ($mahasiswa->nim ?? '') }}"
            class="form-control @error('nim') is-invalid @enderror" placeholder="NIM">
        @error('nim')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap"
            value="{{ old('nama_lengkap') ?? ($mahasiswa->nama_lengkap ?? '') }}"
            class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama Lengkap">
        @error('nama_lengkap')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L"
                @if ($tombol == 'Edit') {{ (old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin) == 'L' ? 'checked' : '' }}>
            @else
                {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}> @endif
                <label class="form-check-label" for="laki_laki">Laki-laki</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P"
                @if ($tombol == 'Edit') {{ (old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin) == 'P' ? 'checked' : '' }}>
            @else
                {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}> @endif
                <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
        @error('jenis_kelamin')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="jurusan">Jurusan</label>
        <select class="form-control" name="jurusan" id="jurusan" value="{{ old('jurusan') }}">
            @if ($tombol == 'Edit')
                <option value="Teknik Informatika"
                    {{ (old('jurusan') ?? $mahasiswa->jurusan) == 'Teknik Informatika' ? 'selected' : '' }}>
                    Teknik Informatika
                </option>
                <option value="Sistem Informasi"
                    {{ (old('jurusan') ?? $mahasiswa->jurusan) == 'Sistem Informasi' ? 'selected' : '' }}>
                    Sistem Informasi
                </option>
                <option value="Ilmu Komputer"
                    {{ (old('jurusan') ?? $mahasiswa->jurusan) == 'Ilmu Komputer' ? 'selected' : '' }}>
                    Ilmu Komputer
                </option>
                <option value="Teknik Komputer"
                    {{ (old('jurusan') ?? $mahasiswa->jurusan) == 'Teknik Komputer' ? 'selected' : '' }}>
                    Teknik Komputer
                </option>
                <option value="Teknik Telekomunikasi"
                    {{ (old('jurusan') ?? $mahasiswa->jurusan) == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                    Teknik Telekomunikasi
                </option>
            @else
                <option value="Teknik Informatika" {{ old('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>
                    Teknik Informatika
                </option>
                <option value="Sistem Informasi" {{ old('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>
                    Sistem Informasi
                </option>
                <option value="Ilmu Komputer" {{ old('jurusan') == 'Ilmu Komputer' ? 'selected' : '' }}>
                    Ilmu Komputer
                </option>
                <option value="Teknik Komputer" {{ old('jurusan') == 'Teknik Komputer' ? 'selected' : '' }}>
                    Teknik Komputer
                </option>
                <option value="Teknik Telekomunikasi"
                    {{ old('jurusan') == 'Teknik Telekomunikasi' ? 'selected' : '' }}>
                    Teknik Telekomunikasi
                </option>
            @endif
        </select>
        @error('jurusan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') ?? ($mahasiswa->alamat ?? '') }}</textarea>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
</div>
