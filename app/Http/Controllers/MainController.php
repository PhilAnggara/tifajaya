<?php

namespace App\Http\Controllers;

use App\Helpers\MyFunction;
use App\Helpers\VsmHelper;
use App\Models\Document;
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
            $terbilang = MyFunction::terbilang($item->jenisPengujian()->itemPengujian->sum('harga'));
            $pdf->loadView('pdf.surat-perintah', compact('item', 'terbilang'));
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

    public function search()
    {
        return view('pages.search');
    }

    public function uploadDokumen(Request $request)
    {
        $vsm = new VsmHelper();
        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');

            $uploadedDocument = 0;
            
            foreach ($documents as $document) {
                $extension = $document->getClientOriginalExtension();
                if (strtolower($extension) !== 'pdf') {
                    $request->session()->flash('notPdf', 'File yang diunggah harus berupa PDF!');
                    // Jika file yang diunggah bukan PDF, maka akan diabaikan
                    continue;
                }

                $data['nama_file'] = $document->getClientOriginalName();
                $data['path'] = $document->storeAs('files/documents', $data['nama_file'], 'public');
                $data['text'] = Str::before(Str::before($data['nama_file'], '.pdf'), '.PDF') .' '. $vsm->getTextFromPdf('files/documents/'.$data['nama_file']);
                Document::create($data);
                $uploadedDocument++;
            }
        }
        
        if ($uploadedDocument > 0) {
            return redirect()->back()->with('success', $uploadedDocument.'/'.$request->file_count.' dokumen berhasil diunggah!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengunggah dokumen!');
        }
    }
}
