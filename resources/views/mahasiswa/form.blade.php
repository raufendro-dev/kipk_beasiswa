@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-indigo-700 mb-6">📝 Form Data Calon Mahasiswa</h2>
        <form method="POST" action="{{ route('mahasiswa.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block font-semibold">NIK</label>
                <input type="text" name="nik" class="form-input w-full border-gray-300 rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-input w-full border-gray-300 rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Tempat</label>
                <input type="text" name="tempat_lahir" class="form-input w-full border-gray-300 rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-input w-full border-gray-300 rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Akte Kelahiran (PDF)</label>
                <input type="file" name="akte_kelahiran" accept="application/pdf" required>
            </div>

            <div>
                <label class="block font-semibold">Akte Keluarga (PDF)</label>
                <input type="file" name="akte_keluarga" accept="application/pdf" required>
            </div>

            <div>
                <label class="block font-semibold">KKS / STKM (PDF)</label>
                <input type="file" name="kks" accept="application/pdf" required>
            </div>

            <div>
                <label class="block font-semibold">Foto Rumah / Rekening Listrik (Image)</label>
                <input type="file" name="foto_rumah" accept="image/*" required>
            </div>

            <div>
                <label class="block font-semibold">Ijazah / SKL SMA (PDF)</label>
                <input type="file" name="ijazah" accept="application/pdf" required>
            </div>

            <div>
                <label class="block font-semibold">Raport Semester 1-5 (PDF)</label>
                <input type="file" name="raport" accept="application/pdf" required>
            </div>

            <div>
                <label class="block font-semibold">Pas Foto 3x4 (Image)</label>
                <input type="file" name="pas_foto" accept="image/*" required>
            </div>

            <div>
                <label class="block font-semibold">SHUN / Sertifikat Ujian Nasional (PDF)</label>
                <input type="file" name="shun" accept="application/pdf" required>
            </div>

            <div>
                <label class="block font-semibold">Sertifikat Prestasi (PDF)</label>
                <input type="file" name="prestasi" accept="application/pdf">
            </div>

            <div>
                <label class="block font-semibold">Kartu KIP / PKH / BDT / Kartu Miskin (Image)</label>
                <input type="file" name="kartu_bansos" accept="image/*" required>
            </div>

            <div>
                <label class="block font-semibold">Surat Tidak Mampu (PDF)</label>
                <input type="file" name="sktm" accept="application/pdf">
            </div>

            <div>
                <label class="block font-semibold">Slip Gaji / Surat Penghasilan (PDF)</label>
                <input type="file" name="penghasilan" accept="application/pdf" required>
            </div>

            <div>
                <label class="block font-semibold">Bukti Diterima PTN(S) (Image)</label>
                <input type="file" name="bukti_ptn" accept="image/*" required>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    💾 Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
