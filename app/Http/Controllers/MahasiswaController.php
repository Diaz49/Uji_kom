<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function cetak()
    {
        $data = Mahasiswa::all();
        $pdf = Pdf::loadView('pdf.template', $data);
        return $pdf->download('laporan.pdf');
    }
}
