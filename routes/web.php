<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntointeresContoller;

Route::get('/', function () {
    return view('welcome');
});
