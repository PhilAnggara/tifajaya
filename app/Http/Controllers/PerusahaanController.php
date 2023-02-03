<?php

namespace App\Http\Controllers;

use App\Helpers\MyFunction;
use App\Models\JenisPengujian;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $items = Perusahaan::all()->sortDesc();
        $jenis_pengujian = JenisPengujian::all()->sortDesc();
        return view('pages.perusahaan', compact('items', 'jenis_pengujian'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request['token'] = MyFunction::generateToken($request->id_jenis_pengujian);
        $item = Perusahaan::create($request->all());

        MyFunction::createPengujian($item);

        return redirect()->back()->with('success', $request->nama_perusahaan.' berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Perusahaan::find($id);
        $item->update($request->all());
        
        return redirect()->back()->with('success', $request->nama_perusahaan.' berhasil diubah!');
    }

    public function destroy($id)
    {
        $item = Perusahaan::find($id);
        $title = $item->nama_perusahaan;
        $item->delete();

        return redirect()->back()->with('success', $title.' dihapus!');
    }
}
