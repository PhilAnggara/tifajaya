<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $items = Perusahaan::all()->sortDesc();
        return view('pages.perusahaan', compact('items'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }

    public function destroy($id)
    {
        $item = Perusahaan::find($id);
        $title = $item->nama_perusahaan;
        $item->delete();

        return redirect()->back()->with('success', $title.' dihapus!');
    }
}
