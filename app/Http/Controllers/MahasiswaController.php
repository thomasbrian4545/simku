<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        if (!empty($cari)) {
            $mahasiswas = Mahasiswa::sortable()
                ->where('mahasiswas.nim', 'like', '%' . $cari . '%')
                ->orWhere('mahasiswas.nama_lengkap', 'like', '%' . $cari . '%')
                ->orWhere('mahasiswas.jenis_kelamin', 'like', '%' . $cari . '%')
                ->orWhere('mahasiswas.jurusan', 'like', '%' . $cari . '%')
                ->orWhere('mahasiswas.alamat', 'like', '%' . $cari . '%')
                ->paginate(5)->fragment('tblMahasiswas');
        } else {
            $mahasiswas = Mahasiswa::sortable()->paginate(5)->fragment('tblMahasiswas');
        }
        return view('mahasiswa.index', ['mahasiswas' => $mahasiswas, 'cari' => $cari,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Mahasiswa::class);
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas',
            'nama_lengkap' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);
        //dump($validateData);

        Mahasiswa::create($validateData);
        return redirect()->route('mahasiswas.index')->with('pesan', "Penambahan data {$validateData['nama_lengkap']} berhasil");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->authorize('update', $mahasiswa);
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_lengkap' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);
        $mahasiswa->update($validateData);
        return redirect()->route('mahasiswas.show', ['mahasiswa' => $mahasiswa->id])
            ->with('pesan', "Update data {$validateData['nama_lengkap']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $this->authorize('delete', $mahasiswa);
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')
            ->with('pesan', "Hapus data $mahasiswa->nama_lengkap berhasil");
    }
}
