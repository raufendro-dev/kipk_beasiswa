@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-indigo-700 mb-6">📝 Form Data Calon Mahasiswa</h2>
        <form method="POST" action="{{ route('mahasiswa.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block font-semibold">NIK</label>
                <input type="text" name="nik" class="form-input w-full border-gray-300 rounded" required value="{{ old('nik', $mahasiswa->nik ?? '') }}">
            </div>

            <div>
                <label class="block font-semibold">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-input w-full border-gray-300 rounded" required value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap ?? '') }}">
            </div>

            <div>
                <label class="block font-semibold">Tempat</label>
                <input type="text" name="tempat_lahir" class="form-input w-full border-gray-300 rounded" required value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir ?? '') }}">
            </div>

            <div>
                <label class="block font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-input w-full border-gray-300 rounded" required value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir ?? '') }}">
            </div>

            @php
                $fileFields = [
                    'akte_kelahiran' => 'Akte Kelahiran (PDF)',
                    'kartu_keluarga' => 'Kartu Keluarga (PDF)',
                    'kks' => 'KKS / STKM (PDF)',
                    'foto_rumah' => 'Foto Rumah / Rekening Listrik (Image)',
                    'ijazah' => 'Ijazah / SKL SMA (PDF)',
                    'raport' => 'Raport Semester 1-5 (PDF)',
                    'pas_foto' => 'Pas Foto 3x4 (Image)',
                    'shun' => 'SHUN / Sertifikat Ujian Nasional (PDF)',
                    'prestasi' => 'Sertifikat Prestasi (PDF)',
                    'kartu_bansos' => 'Kartu KIP / PKH / BDT / Kartu Miskin (Image)',
                    'sktm' => 'Surat Tidak Mampu (PDF)',
                    'penghasilan' => 'Slip Gaji / Surat Penghasilan (PDF)',
                    'bukti_ptn' => 'Bukti Diterima PTN(S) (Image)',
                ];
            @endphp

            @foreach ($fileFields as $field => $label)
                <div>
                    <label class="block font-semibold">{{ $label }}</label>
                    <input type="file" name="{{ $field }}" accept="{{ str_contains($field, 'image') || str_contains($field, 'foto') || str_contains($field, 'rumah') || str_contains($field, 'bukti') || str_contains($field, 'kartu') ? 'image/*' : 'application/pdf' }}">
                    @if (!empty($mahasiswa?->$field))
                        <div class="mt-1">
                            @php use Illuminate\Support\Str; @endphp

@if (Str::startsWith($mahasiswa->$field, 'data:image'))
    <img src="{{ $mahasiswa->$field }}" alt="{{ $label }}" class="mt-2 w-32 rounded shadow">
@elseif (Str::endsWith($mahasiswa->$field, ['.jpg', '.jpeg', '.png', '.webp']))
    <img src="{{ asset('storage/' . $mahasiswa->$field) }}" alt="{{ $label }}" class="mt-2 w-32 rounded shadow">
@else
    <a href="{{ asset('storage/' . $mahasiswa->$field) }}" target="_blank" class="text-sm text-blue-600 underline">👁️ Lihat</a>
@endif
                            <!-- <a href="{{ asset('storage/' . $mahasiswa->$field) }}" target="_blank" class="text-sm text-blue-600 underline">👁️ Lihat</a> -->

                        </div>
                    @endif
                </div>
            @endforeach

            <div class="pt-4">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    📂 Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
