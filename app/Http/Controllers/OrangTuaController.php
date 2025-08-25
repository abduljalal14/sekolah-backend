<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\OrangTua;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class OrangTuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ortu = OrangTua::all();
        return new PostResource(true, 'List Data Orang Tua', $ortu);
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
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $ortu = OrangTua::create([
                'nama' => $request->nama,
            ]);

            return new PostResource(true, 'Data Orang Tua Berhasil Ditambahkan!', $ortu);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ortu = OrangTua::find($id);
        return new PostResource(true, 'Detail Data Orang Tua!', $ortu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $ortu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ortu = OrangTua::find($id);

        $ortu->update([
            'nama'     => $request->nama ? $request->nama :$ortu->nama,
        ]);

        //return response
        return new PostResource(true, 'Data Orang Tua Berhasil Diubah!', $ortu);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ortu = OrangTua::find($id);
        
        $ortu->delete();

        return new PostResource(true, 'Data Orang Tua Berhasil Dihapus!', null);
    }
}
