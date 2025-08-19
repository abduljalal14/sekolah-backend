<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::with('kelas')->latest()->get();
        return new PostResource(true, 'List Data Guru', $guru);
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
            $guru = Guru::create([
                'nama' => $request->nama,
                'kelas_id' => $request->kelas_id
            ]);

            return new PostResource(true, 'Data Guru Berhasil Ditambahkan!', $guru);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guru = Guru::find($id);
        return new PostResource(true, 'Detail Data Guru!', $guru);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $Guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);

        $guru->update([
            'nama'     => $request->nama ? $request->nama :$guru->nama,
            'kelas' => $request->kelas_id ? $request->kelas_id: $guru->kelas_id
        ]);

        //return response
        return new PostResource(true, 'Data Guru Berhasil Diubah!', $guru);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        
        $guru->delete();

        return new PostResource(true, 'Data Guru Berhasil Dihapus!', null);
    }
}
