<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomevisitController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PermasalahanController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\AuthController;

route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('Homevisit.index');
})->name('Homevisit.index');

route::get('/form', function () {
    return view('Homevisit.pendaftaran');
})->name('Homevisit.pendaftaran');

route::get('/perm', function () {
    return view('Homevisit.perm');
})->name('Homevisit.perm');

route::get('/konsultasi', function () {
    return view('Homevisit.konsultasi');
})->name('Homevisit.konsultasi');

route::get('/jadwal', function () {
    return view('Homevisit.jadwal');
})->name('Homevisit.jadwal');

Route::get('/login', function () {
    return view('sign.login');
})->name('sign.login');

route::get('/signup', function () {
    return view('sign.signup');
})->name('sign.signup');

route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');