<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                <!-- <div class="flex items-center space-x-4">
                    <button onclick="openBatchModal()"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-users mr-2"></i>Lulus Massal
                    </button>
                    <button onclick="exportData()"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                </div> -->
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
                                    <p class="text-sm text-gray-600">NISN: {{ $siswa->nisn }} | Nilai:
                                        {{number_format($siswa->hasil_cbt_avg_skor, 2)}}</p>
                                    <div class="flex items-center space-x-4 mt-1">
                                        <span class="text-xs text-gray-500">Tanggal:
                                            {{ $siswa->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                @if ($siswa->status == 'lulus')
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                        <i class="fas fa-check mr-1"></i>Lulus
                                    </span>
                                @elseif ($siswa->status == 'tidak_lulus')
                                    <span class="px-3 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full">
                                        <i class="fas fa-times mr-1"></i>Tidak Lulus
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                                        <i class="fas fa-clock mr-1"></i>Belum Diverifikasi
                                    </span>
                                @endif

                                <button onclick="openDetailModal(2)" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Siswa Item 2 - Tidak Lulus -->
                <!-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-red-600 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Budi Santoso</h3>
                                <p class="text-sm text-gray-600">NISN: 1122334455 | Nilai: 65.2</p>
                                <div class="flex items-center space-x-4 mt-1">
                                    <span class="text-xs text-gray-500">Berkas: Bermasalah</span>
                                    <span class="text-xs text-gray-500">Tanggal: 15 Juli 2024</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="px-3 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full">
                                <i class="fas fa-times mr-1"></i>Tidak Lulus
                            </span>
                            <button onclick="openDetailModal(3)" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Siswa Item 3 - Belum Diputuskan -->
                <!-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-yellow-600 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Ahmad Fauzi Rahman</h3>
                                <p class="text-sm text-gray-600">NISN: 1234567890 | Nilai: 78.8</p>
                                <div class="flex items-center space-x-4 mt-1">
                                    <span class="text-xs text-gray-500">Berkas: Terverifikasi</span>
                                    <span class="text-xs text-gray-500">Tanggal: -</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full">
                                <i class="fas fa-clock mr-1"></i>Belum Diputuskan
                            </span>
                            <div class="flex space-x-2">
                                <button onclick="setKelulusan(1, 'lulus')"
                                    class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                    <i class="fas fa-check mr-1"></i>Lulus
                                </button>
                                <button onclick="setKelulusan(1, 'tidak_lulus')"
                                    class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                    <i class="fas fa-times mr-1"></i>Tolak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

                <!-- Pagination -->
                <div class="flex items-center justify-between mt-6">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">3</span> dari
                        <span class="font-medium">187</span> calon siswa
                    </div>
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

    <!-- Batch Modal -->
    <div id="batchModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeBatchModal()"></div>

            <div
                class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Lulus Massal</h3>
                    <button onclick="closeBatchModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kriteria Kelulusan</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih kriteria</option>
                            <option value="nilai_min">Nilai minimum 70</option>
                            <option value="berkas_lengkap">Berkas lengkap & terverifikasi</option>
                            <option value="kombinasi">Kombinasi nilai & berkas</option>
                        </select>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            <span class="text-blue-800 text-sm">
                                <strong>15 calon siswa</strong> memenuhi kriteria yang dipilih
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <button onclick="closeBatchModal()"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            Batal
                        </button>
                        <button onclick="processBatch()"
                            class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-check mr-2"></i>Proses Kelulusan
                        </button>
                    </div>
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
            const statusText = status === 'lulus' ? 'meluluskan' : 'menolak';
            if (confirm(`Apakah Anda yakin ingin ${statusText} calon siswa ini?`)) {
                alert(`Calon siswa berhasil ${status === 'lulus' ? 'dinyatakan lulus' : 'ditolak'}!`);
                // Reload or update UI
                location.reload();
            }
        }

        function openBatchModal() {
            document.getElementById('batchModal').classList.remove('hidden');
        }

        function closeBatchModal() {
            document.getElementById('batchModal').classList.add('hidden');
        }

        function processBatch() {
            if (confirm('Apakah Anda yakin ingin memproses kelulusan massal?')) {
                alert('15 calon siswa berhasil dinyatakan lulus!');
                closeBatchModal();
                location.reload();
            }
        }

        function exportData() {
            alert('Data kelulusan berhasil diexport!');
        }

        function openDetailModal(id) {
            alert('Detail siswa akan ditampilkan');
        }
    </script>
</body>

</html>