<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * daftar resource.
     */
    public function index()
    {
        return response()->json(Penjualan::all());
    }

    public function store(Request $request)
    {
        $penjualan = Penjualan::create($request->all());
        return response()->json($penjualan);
    }

    public function show($id)
    {
        return response()->json(Penjualan::find($id));
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->update($request->all());
        return response()->json($penjualan);
    }

    public function destroy($id)
    {
        Penjualan::destroy($id);
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
