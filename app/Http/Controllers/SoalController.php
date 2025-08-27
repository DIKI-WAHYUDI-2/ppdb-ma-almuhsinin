<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;

class SoalController extends Controller
{
    public function index(Request $request)
    {
        $soal = Soal::when($request->search, function ($query) use ($request) {
            $query->where('pertanyaan', 'like', '%' . $request->search . '%')
                ->orWhere('kategori', 'like', '%' . $request->search . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('operator.soal', compact('soal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|string|max:100',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string|max:255',
            'pilihan_b' => 'required|string|max:255',
            'pilihan_c' => 'required|string|max:255',
            'pilihan_d' => 'required|string|max:255',
            'jawaban_benar' => 'required|in:A,B,C,D',
            'gambar_soal' => 'required|image|max:2048' // Maksimal 2MB
        ]);

        // Handle upload file
        if ($request->hasFile('gambar_soal')) {
            $file = $request->file('gambar_soal');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('soal', $filename, 'public'); // Simpan di storage/app/public/soal

            Soal::create([
                'kategori' => ucwords(strtolower($validated['kategori'])),
                'pertanyaan' => $validated['pertanyaan'],
                'pilihan_a' => $validated['pilihan_a'],
                'pilihan_b' => $validated['pilihan_b'],
                'pilihan_c' => $validated['pilihan_c'],
                'pilihan_d' => $validated['pilihan_d'],
                'jawaban_benar' => $validated['jawaban_benar'],
                'nama_file' => $filename,
                'file_path' => 'storage/soal/' . $filename // Path yang bisa diakses publik
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil ditambahkan'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal mengunggah gambar soal'
        ], 400);
    }

    public function show($id)
    {
        $soal = Soal::findOrFail($id);
        return response()->json(['success' => true, 'data' => $soal]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:100',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string|max:255',
            'pilihan_b' => 'required|string|max:255',
            'pilihan_c' => 'required|string|max:255',
            'pilihan_d' => 'required|string|max:255',
            'jawaban_benar' => 'required|in:A,B,C,D',
        ]);

        $soal = Soal::findOrFail($id);
        $soal->update($request->all());

        return response()->json(['success' => true, 'message' => 'Soal berhasil diupdate']);
    }

    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return response()->json(['success' => true, 'message' => 'Soal berhasil dihapus']);
    }
}
