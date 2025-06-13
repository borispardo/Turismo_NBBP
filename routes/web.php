<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoInteresController;


Route::get('/puntointeres',[PuntoInteresController::class,'index']);
Route::resource('puntos', PuntoInteresController::class);
Route::get('/puntos/mapa',[PuntoInteresController::class,'mapa']);
