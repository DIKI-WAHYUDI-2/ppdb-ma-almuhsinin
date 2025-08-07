<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        // Optimasi dengan pagination dan search
        $query = Pengumuman::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('isi', 'like', '%' . $request->search . '%');
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Optimasi dengan select only needed columns dan pagination
        $pengumuman = $query->select('id', 'judul', 'isi', 'status', 'tanggal_publikasi', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('operator.pengumuman', compact('pengumuman'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string|max:10000',
                'status' => 'required|in:draft,aktif,nonaktif',
                'tanggal_publikasi' => 'nullable|date',
            ]);

            // Optimasi dengan DB transaction
            DB::beginTransaction();

            $pengumuman = Pengumuman::create($validated);

            // Clear cache setelah create
            Cache::forget('pengumuman_list');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pengumuman berhasil dibuat!',
                'data' => $pengumuman
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat pengumuman: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $pengumuman
        ]);
    }


    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string|max:10000',
                'status' => 'required|in:draft,aktif,nonaktif',
                'tanggal_publikasi' => 'nullable|date',
            ]);

            DB::beginTransaction();

            $pengumuman = Pengumuman::findOrFail($id);
            $pengumuman->update($validated);

            // Clear cache setelah update
            Cache::forget("pengumuman_{$id}");
            Cache::forget('pengumuman_list');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pengumuman berhasil diperbarui!',
                'data' => $pengumuman
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui pengumuman: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $pengumuman = Pengumuman::findOrFail($id);
            $pengumuman->delete();

            // Clear cache setelah delete
            Cache::forget("pengumuman_{$id}");
            Cache::forget('pengumuman_list');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pengumuman berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus pengumuman: ' . $e->getMessage()
            ], 500);
        }
    }
}
