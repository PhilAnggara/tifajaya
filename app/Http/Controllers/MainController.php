<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    
    public function beranda()
    {
        return view('pages.beranda');
    }

    
    public function pengujiaan()
    {
        $items = Perusahaan::all()->sortDesc();
        return view('pages.pengujian', compact('items'));
    }
    public function suratPerintah()
    {
        $items = Perusahaan::all()->sortDesc();
        return view('pages.surat-perintah', compact('items'));
    }
    public function suratPengantar()
    {
        $items = Perusahaan::all()->sortDesc();
        return view('pages.surat-pengantar', compact('items'));
    }
    public function laporanPengujian()
    {
        $items = Perusahaan::all()->sortDesc();
        return view('pages.laporan-pengujian', compact('items'));
    }
}
