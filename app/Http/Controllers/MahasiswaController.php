<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
public function form()
{
     $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();

        return view('mahasiswa.form', [
            'mahasiswa' => $mahasiswa
        ]);
}
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'akte_kelahiran' => 'required|file|mimes:pdf',
            'kartu_keluarga' => 'required|file|mimes:pdf',
            'kks' => 'required|file|mimes:pdf',
            'foto_rumah' => 'required|image',
            'ijazah' => 'required|file|mimes:pdf',
            'raport' => 'required|file|mimes:pdf',
            'pas_foto' => 'required|image',
            'shun' => 'required|file|mimes:pdf',
            'prestasi' => 'nullable|file|mimes:pdf',
            'kartu_bansos' => 'required|image',
            'sktm' => 'nullable|file|mimes:pdf',
            'penghasilan' => 'required|file|mimes:pdf',
            'bukti_ptn' => 'required|image',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->user_id = Auth::id();
        $mahasiswa->nik = $request->nik;
        $mahasiswa->nama_lengkap = $request->nama_lengkap;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;

        // Simpan file ke storage/app/public/data/
        $mahasiswa->akte_kelahiran = $request->file('akte_kelahiran')->store('data', 'public');
        $mahasiswa->kartu_keluarga = $request->file('kartu_keluarga')->store('data', 'public');
        $mahasiswa->kks = $request->file('kks')->store('data', 'public');
        $mahasiswa->foto_rumah = base64_encode(file_get_contents($request->file('foto_rumah')));
        $mahasiswa->ijazah = $request->file('ijazah')->store('data', 'public');
        $mahasiswa->raport = $request->file('raport')->store('data', 'public');
        $mahasiswa->pas_foto = base64_encode(file_get_contents($request->file('pas_foto')));
        $mahasiswa->shun = $request->file('shun')->store('data', 'public');
        $mahasiswa->prestasi = $request->hasFile('prestasi') ? $request->file('prestasi')->store('data', 'public') : null;
        $mahasiswa->kartu_bansos = base64_encode(file_get_contents($request->file('kartu_bansos')));
        $mahasiswa->sktm = $request->hasFile('sktm') ? $request->file('sktm')->store('data', 'public') : null;
        $mahasiswa->penghasilan = $request->file('penghasilan')->store('data', 'public');
        $mahasiswa->bukti_ptn = base64_encode(file_get_contents($request->file('bukti_ptn')));

        $mahasiswa->save();

        return redirect('/dashboard')->with('success', 'Data berhasil disimpan');
    }
    public function create()
{
    return view('mahasiswa.form'); // Sesuaikan jika nama view kamu berbeda
}

}
