<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelulusan - Dashboard Operator</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out"
        id="sidebar">
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
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('pengumuman.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-bullhorn mr-3"></i>
                    Pengumuman
                </a>
                <a href="{{ route('soal.index') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-file-alt mr-3"></i>
                    Soal
                </a>
                <a href="{{ route('operator.verifikasi') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-check-circle mr-3"></i>
                    Verifikasi Berkas
                </a>
                <a href="{{ route('operator.kelulusan') }}"
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
                    <i class="fas fa-user-graduate mr-3"></i>
                    Kelulusan
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <button class="lg:hidden text-gray-600 hover:text-gray-900 mr-4" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-900">Kelola Kelulusan</h1>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-graduate text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Lulus</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $jumlah_siswa_lulus }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-times text-red-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Tidak Lulus</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $jumlah_siswa_tidak_lulus }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Belum Diverifikasi</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $jumlah_siswa_belum_diverifikasi }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter & Search -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Cari nama siswa..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua Status</option>
                            <option value="lulus">Lulus</option>
                            <option value="tidak_lulus">Tidak Lulus</option>
                            <option value="belum_diputuskan">Belum Diputuskan</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Calon Siswa List -->
            <div class="space-y-4">
                <!-- Siswa Item 1 - Lulus -->
                @foreach ($calon_siswa as $siswa)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-green-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $siswa->nama_lengkap }}</h3>
                                    <p class="text-sm text-gray-600">NISN: {{ $siswa->nisn }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                @if ($siswa->status_pendaftaran == 'lulus')
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                        <i class="fas fa-check mr-1"></i>Lulus
                                    </span>
                                @elseif ($siswa->status_pendaftaran == 'tidak lulus')
                                    <span class="px-3 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full">
                                        <i class="fas fa-times mr-1"></i>Tidak Lulus
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                                        <i class="fas fa-clock mr-1"></i>Belum Diputuskan
                                    </span>
                                @endif

                                <button onclick="openDetailModal({{ $siswa->id }})"
                                    class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center space-x-2">
                        <button
                            class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-3 py-2 text-white bg-blue-600 border border-blue-600 rounded-lg">1</button>
                        <button
                            class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                        <button
                            class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                        <button
                            class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
        </main>
    </div>

    <!-- Modal -->
    <div id="verifikasiModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
            <div
                class="inline-block w-full max-w-4xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 id="namaSiswa" class="text-lg font-semibold text-gray-900">Kelulusan Calon Siswa</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Tempat berkas -->
                <div id="berkasContainer" class="mb-6">
                    <!-- Diisi lewat JS -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        function setKelulusan(id, status) {
            const statusText = status === 'lulus' ? 'lulus' : 'tidak lulus';

            if (confirm(`Apakah Anda yakin ingin ${statusText} calon siswa ini?`)) {
                alert(`Calon siswa berhasil ${status === 'lulus' ? 'dinyatakan lulus' : 'ditolak'}!`);

                fetch(`/operator/status/update/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({ id: id, status: status })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Berhasil:', data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }


        function openDetailModal(id) {
            const modal = document.getElementById('verifikasiModal');
            const container = document.getElementById('berkasContainer');

            modal.classList.remove('hidden');
            container.innerHTML = `<div class="text-center py-4"><i class="fas fa-spinner fa-spin text-blue-500"></i> Memuat data...</div>`;

            fetch(`/operator/kelulusan/calon-siswa/${id}`)
                .then(res => res.json())
                .then(data => {
                    if (!data || !data.calon_siswa) {
                        throw new Error('Data siswa tidak ditemukan');
                    }

                    const berkasCount = data.berkas ? data.berkas.length : 0;
                    const skor = data.nilai ? data.nilai.skor : 0;
                    const orangTuaComplete = data.orang_tua ? true : false;

                    let html = `
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">NISN</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Orang Tua</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Berkas</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nilai</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">${data.calon_siswa.nama_lengkap || '-'}</td>
                                <td class="px-4 py-3 whitespace-nowrap">${data.calon_siswa.nisn || '-'}</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-green-500">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="${orangTuaComplete ? 'text-green-500' : 'text-red-500'}">
                                        <i class="fas ${orangTuaComplete ? 'fa-check-circle' : 'fa-times-circle'}"></i>
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="${berkasCount === 6 ? 'text-green-500' : berkasCount >= 4 ? 'text-yellow-500' : 'text-red-500'}">
                                        <i class="fas ${berkasCount === 6 ? 'fa-check-circle' : berkasCount >= 4 ? 'fa-exclamation-circle' : 'fa-times-circle'}"></i>
                                        (${berkasCount}/6)
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="${skor >= 70 ? 'text-green-500' : 'text-red-500'}">
                                        ${skor || 0} (${skor >= 70 ? 'Lulus' : 'Gagal'})
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <button onclick="setKelulusan(${data.calon_siswa.id}, 'lulus')" 
                                            class="px-3 py-1 bg-green-600 text-white rounded text-sm flex items-center
                                            ${berkasCount < 6 || skor < 70 ? 'opacity-50 cursor-not-allowed' : ''}"
                                            ${berkasCount < 6 || skor < 70 ? 'disabled' : ''}>
                                            <i class="fas fa-check mr-1"></i> Lulus
                                        </button>
                                        <button onclick="setKelulusan(${data.calon_siswa.id}, 'tidak lulus')" 
                                            class="px-3 py-1 bg-red-600 text-white rounded text-sm flex items-center">
                                            <i class="fas fa-times mr-1"></i> Tidak
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>`;

                    container.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    container.innerHTML = `
                    <div class="text-center py-4 text-red-500">
                        <i class="fas fa-exclamation-triangle"></i> Gagal memuat data
                        <p class="text-sm text-gray-600 mt-2">${error.message}</p>
                    </div>
                `;
                });
        }

        function closeModal() {
            document.getElementById('verifikasiModal').classList.add('hidden');
        }
    </script>
</body>

</html>