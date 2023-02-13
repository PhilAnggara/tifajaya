<?php

namespace App\Http\Controllers;

use App\Models\JenisPengujian;
use App\Models\Pengujian;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $jenis_pengujian = JenisPengujian::with('itemPengujian')->get();
        $harga = json_decode(file_get_contents(storage_path('app/public/files/harga.json'), true));

        // return response()->json([
        //     'harga' => $harga->jenis_pengujian[0]
        // ]);
        // dd($harga->jenis_pengujian[0]->item_pengujian);

        return view('pages.home', [
            'jenis_pengujian' => $jenis_pengujian,
            'harga' => $harga->jenis_pengujian
        ]);
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
    public function updatePengujian(Request $request, $id)
    {
        $item = Pengujian::find($id);
        $item->update($request->all());

        return redirect()->back()->with('success', 'Data pengujian berhasil disimpan!');
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
                'surat_perintah' => $request->file('document')->storeAs('files/surat-perintah-pengujian', $request->type. ' ('. $item->token.').pdf' ,'public')
            ];
        } elseif ($request->type == 'Surat Pengantar Pengujian') {
            $data = [
                'surat_pengantar' => $request->file('document')->storeAs('files/surat-pengantar-pengujian', $request->type. ' ('. $item->token.').pdf' ,'public')
            ];
        } elseif ($request->type == 'Laporan Pengujian') {
            $data = [
                'laporan' => $request->file('document')->storeAs('files/laporan-pengujian', $request->type. ' ('. $item->token.').pdf' ,'public')
            ];
        } elseif ($request->type == 'Surat Pengantar Pengujian (Belum ditandatangani)') {
            $data = [
                'surat_pengantar_unapproved' => $request->file('document')->storeAs('files/surat-pengantar-pengujian', $request->type. '-('. $item->token.').pdf' ,'public')
            ];
        } elseif ($request->type == 'Laporan Pengujian (Belum ditandatangani)') {
            $data = [
                'laporan_unapproved' => $request->file('document')->storeAs('files/laporan-pengujian', $request->type. '-('. $item->token.').pdf' ,'public')
            ];
        }
        $item->detail->update($data);
        
        return redirect()->back()->with('success', Str::before($request->type, ' (').' berhasil diunggah!');
    }

    public function printPDF($type, $id)
    {
        $pdf = App::make('dompdf.wrapper');
        $item = Perusahaan::find($id);

        if ($type == 'surat-perintah-pengujian') {
            $pdf->loadView('pdf.surat-perintah', compact('item'));
            $item->detail->surat_perintah_download += 1;
            $item->detail->save();
        } elseif ($type == 'surat-pengantar-pengujian') {
            $pdf->loadView('pdf.surat-pengantar', compact('item'));
            $item->detail->surat_pengantar_download += 1;
            $item->detail->save();
        } elseif ($type == 'laporan-pengujian') {
            $pdf->loadView('pdf.laporan-pengujian', compact('item'));
            $item->detail->laporan_download += 1;
            $item->detail->save();
        }
        return $pdf->stream(Str::title(Str::replace('-', ' ', $type)). ' ('. $item->token. ').pdf');
    }

    public function printPDFunapproved($type, $id)
    {
        $item = Perusahaan::find($id);

        if ($type == 'surat-pengantar-pengujian') {
            if (auth()->user()->role == 'Kepala Seksi') {
                $item->detail->surat_pengantar_download += 1;
                $item->detail->save();
            }
            $pathToFile = storage_path('app/public/'. $item->detail->surat_pengantar_unapproved);
            $pathToFile = public_path().Storage::url($item->detail->surat_pengantar_unapproved);    // delete this line on production
            return response()->file($pathToFile);
        } elseif ($type == 'laporan-pengujian') {
            if (auth()->user()->role == 'Kepala Seksi') {
                $item->detail->laporan_download += 1;
                $item->detail->save();
            }
            $pathToFile = storage_path('app/public/'. $item->detail->laporan_unapproved);
            $pathToFile = public_path().Storage::url($item->detail->laporan_unapproved);    // delete this line on production
            return response()->file($pathToFile);
        }
    }
}
