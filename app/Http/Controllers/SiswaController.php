<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with('kelas')->latest()->get();
        return new PostResource(true, 'List Data Siswa', $siswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $siswa = Siswa::create([
                'nama' => $request->nama,
                'kelas_id' => $request->kelas_id
            ]);

            return new PostResource(true, 'Data Siswa Berhasil Ditambahkan!', $siswa);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return new PostResource(true, 'Detail Data Siswa!', $siswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        $siswa->update([
            'nama'     => $request->nama ? $request->nama :$siswa->nama,
            'kelas' => $request->kelas_id ? $request->kelas_id: $siswa->kelas_id
        ]);

        //return response
        return new PostResource(true, 'Data Siswa Berhasil Diubah!', $siswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        
        $siswa->delete();

        return new PostResource(true, 'Data Siswa Berhasil Dihapus!', null);
    }
}
