<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Resources\MahasiswaResource;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/print', function () {
    return view('filament.pdf.mahasiswa');
});

Route::get('/mahasiswa/download-pdf', [MahasiswaResource::class, 'downloadPdf'])->name('mahasiswa.download-pdf');
