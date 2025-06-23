<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnnisaPoli;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polis = AnnisaPoli::all();
        return view('admin.poli.index', compact('polis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.poli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required',
            'lokasi' => 'required',
        ]);
        AnnisaPoli::create($request->only('nama_poli', 'lokasi'));
        return redirect()->route('poli.index')->with('success', 'Data poli berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $poli = AnnisaPoli::findOrFail($id);
        return view('admin.poli.edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required',
            'lokasi' => 'required',
        ]);
        $poli = AnnisaPoli::findOrFail($id);
        $poli->update($request->only('nama_poli', 'lokasi'));
        return redirect()->route('poli.index')->with('success', 'Data poli berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $poli = AnnisaPoli::findOrFail($id);
        $poli->delete();
        return redirect()->route('poli.index')->with('success', 'Data poli berhasil dihapus.');
    }
}
