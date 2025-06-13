<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoInteresContoller;

Route::get('/puntointeres',[PuntoInteresContoller::class,'index']);
Route::resource('puntos', PuntoInteresContoller::class);
