<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penjualan.index', [
            'title' => 'Penjualan',
            'data' => Penjualan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required | integer',
            'harga' => 'required | numeric',
        ]);

        Penjualan::create($validasi);
        return redirect()->back()->with('success', 'Data Penjualan Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required | integer',
            'harga' => 'required | numeric',
        ]);

        Penjualan::where('id', $id)->update($validasi);
        return redirect()->back()->with('success', 'Data penjualan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penjualan::destroy($id);
        return redirect()->back()->with('success', 'Data penjualan berhasil dihapus.');
    }
}
