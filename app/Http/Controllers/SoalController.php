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
        $request->validate([
            'kategori' => 'required|string|max:100',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string|max:255',
            'pilihan_b' => 'required|string|max:255',
            'pilihan_c' => 'required|string|max:255',
            'pilihan_d' => 'required|string|max:255',
            'jawaban_benar' => 'required|in:A,B,C,D',
        ]);

        Soal::create($request->all());

        return response()->json(['success' => true, 'message' => 'Soal berhasil ditambahkan']);
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
