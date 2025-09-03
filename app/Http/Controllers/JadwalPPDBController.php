<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\JadwalPPDB;
use Illuminate\Http\Request;

class JadwalPPDBController extends Controller
{
    /**
     * Tampilkan semua jadwal (untuk halaman informasi publik)
     */
    public function index()
    {
        $jadwal = JadwalPPDB::all();
        return view('operator.jadwal', compact('jadwal'));
    }

    /**
     * Tampilkan form tambah jadwal (admin)
     */
    public function create()
    {
        return view('admin.jadwal.create');
    }

    /**
     * Simpan jadwal baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahap' => 'required|string|max:100',
            'mulai' => 'nullable|date',
            'selesai' => 'nullable|date|after_or_equal:mulai',
        ]);

        JadwalPPDB::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit
     */
    public function edit($id)
    {
        $jadwal = JadwalPPDB::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update data jadwal
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahap' => 'required|string|max:100',
            'mulai' => 'nullable|date',
            'selesai' => 'nullable|date|after_or_equal:mulai',
        ]);

        $jadwal = JadwalPPDB::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    /**
     * Hapus jadwal
     */
    public function destroy($id)
    {
        $jadwal = JadwalPPDB::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
