<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\OrangTuaController;
use App\Models\OrangTua;

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

    Route::apiResource('siswa', SiswaController::class);
    Route::apiResource('kelas', KelasController::class);
    Route::apiResource('guru', GuruController::class);
    Route::apiResource('ortu', OrangTuaController::class);

    Route::get('/list/siswa-by-kelas', [ListController::class, 'siswaByKelas']);
    Route::get('/list/guru-by-kelas', [ListController::class, 'guruByKelas']);
    Route::get('/list/all-combined', [ListController::class, 'allCombined']);
});
