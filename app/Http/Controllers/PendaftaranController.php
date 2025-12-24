<?php

namespace App\Http\Controllers;

use App\Models\pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Homevisit.pendaftaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama'           => 'required|string',
        'telepon'        => 'required|max:12',
        'alamat'         => 'required',
        'nik'            => 'required|digits:16',
        'jenis_kelamin'  => 'required',
        'tanggal_lahir'  => 'required|date',
        'tanggal_periksa'=> 'required|date',
        'waktu_periksa'  => 'required',
        'permasalahan'   => 'required'
    ]);

    \App\Models\Pendaftaran::create($validated);

    return redirect()->route('sukses')->with('message', 'Pendaftaran Berhasil!');
}
    /**
     * Display the specified resource.
     */
    public function show(pendaftaran $pendaftaran)
    {
        
        return view('Homevisit.pendaftaran', compact('pendaftaran'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pendaftaran $pendaftaran)
    {
        return view('Homevisit.pendaftaran', compact('pendaftaran'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pendaftaran $pendaftaran)
    {
        // 1. Validasi Input
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'permasalahan' => 'required',
        ]);
        // 2. Update di Database
        $pendaftaran->update([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'permasalahan' => $request->permasalahan,
        ]);
        // 3. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pendaftaran berhasil diupdate!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->back()->with('success', 'Pendaftaran berhasil dihapus!');
    }
}   