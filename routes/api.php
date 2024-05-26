<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\PusatController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/regional', [RegionalController::class, 'daftarregional']);
Route::get('/pusat', [PusatController::class, 'daftarpusat']);
Route::post('tambahpusat', [PusatController::class, 'store']);
Route::put('/pusat/{id}', [PusatController::class, 'edit']);


