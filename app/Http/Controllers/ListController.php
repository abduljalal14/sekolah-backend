<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Resources\PostResource;

class ListController extends Controller
{
    public function siswaByKelas()
    {
        $kelas = Kelas::with('siswa')->get()->map(function ($kelas) {
            return [
                'kelas' => $kelas->nama,
                'siswa' => $kelas->siswa->pluck('nama')
            ];
        })->unique('kelas');

        return new PostResource(true, 'List Data Siswa By Kelas', $kelas);
    }

    public function guruByKelas()
    {
        $kelas = Kelas::with('guru')->get()->map(function ($kelas) {
            return [
                'kelas' => $kelas->nama,
                'guru' => $kelas->guru->pluck('nama')
            ];
        })->unique('kelas');

        return new PostResource(true, 'List Data Siswa By Kelas', $kelas);
    }

    public function allCombined()
    {

        $kelas = Kelas::with(['siswa', 'guru'])->get()->map(function ($kelas) {
            return [
                'kelas' => $kelas->nama,
                'siswa' => $kelas->siswa->pluck('nama'),
                'guru' => $kelas->guru->pluck('nama')
            ];
        })->unique('kelas');

        return new PostResource(true, 'List Data Guru & Siswa By Kelas', $kelas);
    }
}