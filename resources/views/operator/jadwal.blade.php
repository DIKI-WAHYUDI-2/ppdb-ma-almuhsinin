<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Jadwal PPDB</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-inter">
    {{-- Sidebar --}}
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg hidden lg:block">
        <div class="flex items-center justify-center h-16 bg-blue-600">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-blue-600"></i>
                </div>
                <span class="text-white font-bold text-lg">MA Al-Muhsinin</span>
            </div>
        </div>

        <nav class="mt-8">
            <div class="px-4 space-y-2">
                <a href="{{ route('operator.dashboard') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('pengumuman.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-bullhorn mr-3"></i>
                    Pengumuman
                </a>
                <a href="{{ route('soal.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-file-alt mr-3"></i>
                    Soal
                </a>
                <a href="{{ route('operator.verifikasi') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-check-circle mr-3"></i>
                    Verifikasi Berkas
                </a>
                <a href="{{ route('operator.kelulusan') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-user-graduate mr-3"></i>
                    Kelulusan
                </a>
                <a href="{{ route('jadwal.index') }}"
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
                    <i class="fas fa-calendar-days mr-3"></i>
                    Jadwal PPDB
                </a>
            </div>
        </nav>
    </div>

    {{-- Konten --}}
    <div class="lg:ml-64 p-6">
        <h2 class="text-2xl font-bold mb-4 flex items-center">
            <i class="fas fa-calendar-days text-blue-600 mr-2"></i> Kelola Jadwal PPDB
        </h2>

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Tambah Jadwal --}}
        <div class="bg-white shadow rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold mb-3"><i class="fas fa-plus-circle mr-2"></i>Tambah Jadwal</h3>
            <form action="{{ route('jadwal.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @csrf
                <div>
                    <label class="block mb-1 font-medium">Tahap</label>
                    <input type="text" name="tahap" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Mulai</label>
                    <input type="datetime-local" name="mulai" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1 font-medium">Selesai</label>
                    <input type="datetime-local" name="selesai" class="w-full border rounded p-2">
                </div>
                <div class="flex items-end">
                    <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded flex items-center">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>

        {{-- Tabel Jadwal --}}
        <div class="bg-white shadow rounded-lg p-4">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-2 border">No</th>
                        <th class="p-2 border">Tahap</th>
                        <th class="p-2 border">Mulai</th>
                        <th class="p-2 border">Selesai</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwal as $i => $j)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border text-center">{{ $i + 1 }}</td>
                            <td class="p-2 border">{{ $j->tahap }}</td>
                            <td class="p-2 border">
                                {{ $j->mulai ? \Carbon\Carbon::parse($j->mulai)->format('d-m-Y H:i') : '-' }}</td>
                            <td class="p-2 border">
                                {{ $j->selesai ? \Carbon\Carbon::parse($j->selesai)->format('d-m-Y H:i') : '-' }}</td>
                            <td class="p-2 border text-center space-x-2">
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm"
                                    onclick="document.getElementById('editForm{{ $j->id }}').classList.toggle('hidden')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin hapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- Form Edit Inline --}}
                        <tr id="editForm{{ $j->id }}" class="hidden bg-gray-50">
                            <td colspan="5" class="p-4">
                                <form action="{{ route('jadwal.update', $j->id) }}" method="POST"
                                    class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label class="block mb-1 font-medium">Tahap</label>
                                        <input type="text" name="tahap" value="{{ $j->tahap }}"
                                            class="w-full border rounded p-2" required>
                                    </div>
                                    <div>
                                        <label class="block mb-1 font-medium">Mulai</label>
                                        <input type="datetime-local" name="mulai"
                                            value="{{ $j->mulai ? \Carbon\Carbon::parse($j->mulai)->format('Y-m-d\TH:i') : '' }}"
                                            class="w-full border rounded p-2">
                                    </div>
                                    <div>
                                        <label class="block mb-1 font-medium">Selesai</label>
                                        <input type="datetime-local" name="selesai"
                                            value="{{ $j->selesai ? \Carbon\Carbon::parse($j->selesai)->format('Y-m-d\TH:i') : '' }}"
                                            class="w-full border rounded p-2">
                                    </div>
                                    <div>
                                        <button
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center">
                                            <i class="fas fa-save mr-2"></i> Update
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">Belum ada jadwal</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>