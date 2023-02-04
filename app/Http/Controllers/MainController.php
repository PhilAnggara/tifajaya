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

    public function upload(Request $request, $id)
    {
        $item = Perusahaan::find($id);

        if ($request->type == 'Surat Perintah Pengujian') {
            $data = [
                'surat_perintah' => $request->file('document')->storeAs('files/surat-perintah-pengujian', $item->token.'.pdf' ,'public')
            ];
        } elseif ($request->type == 'Surat Pengantar Pengujian') {
            $data = [
                'surat_pengantar' => $request->file('document')->storeAs('files/surat-pengantar-pengujian', $item->token.'.pdf' ,'public')
            ];
        } elseif ($request->type == 'Laporan Pengujian') {
            $data = [
                'laporan' => $request->file('document')->storeAs('files/laporan-pengujian', $item->token.'.pdf' ,'public')
            ];
        }
        $item->detail->update($data);
        
        return redirect()->back()->with('success', $request->type.' berhasil diunggah!');
    }
}
