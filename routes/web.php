<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoInteresController;


Route::get('/puntointeres',[PuntoInteresController::class,'index']);
Route::get('/puntos/mapa',[PuntoInteresController::class,'mapa']);
Route::resource('puntos', PuntoInteresController::class);

