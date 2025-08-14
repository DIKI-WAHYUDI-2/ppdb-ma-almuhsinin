<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Operator - MA Al-Muhsinin</title>
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
                <a href="{{ route('calon-siswa.dashboard') }}"
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('calon-siswa.data-diri') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-3"></i>
                    Formulir Data Diri
                </a>
                <a href="{{ route('calon-siswa.data-orangtua') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-users mr-3"></i>
                    Data Orang Tua
                </a>
                <a href="{{ route('calon-siswa.upload-berkas') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-upload mr-3"></i>
                    Upload Berkas
                </a>
                <a href="{{ route('calon-siswa.cbt') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-laptop-code mr-3"></i>
                    CBT (Tes Online)
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
                </div>

                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-900">{{ $calon_siswa->nama_lengkap ?? "calon siswa" }}
                        </p>
                        <p class="text-xs text-gray-500">{{ $akun->email }}</p>
                    </div>
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-cog text-blue-600 text-sm"></i>
                    </div>
                    <button onclick="logout()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold mb-2">Selamat Datang, Calon Siswa!</h1>
                                <p class="text-blue-100">Pantau progress pendaftaran Anda di sini</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user text-blue-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Status Pendaftaran</p>
                                <p class="text-2xl font-bold text-gray-900">Aktif</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-check text-green-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Berkas Diunggah</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $jumlah_berkas }}/6</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-percentage text-purple-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Progress</p>
                                <p class="text-2xl font-bold text-gray-900">{{$progress}}%</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <i class="fa-solid fa-file-lines text-yellow-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Surat Kelulusan</p>
                                @if ($calon_siswa)
                                    <a href="{{ route('surat.keterangan.lulus', $calon_siswa->id) }}"
                                        class="text-lg font-bold text-green-600 hover:text-green-700">
                                        Cetak
                                    </a>
                                @else
                                    <p class="text-lg font-bold text-gray-500">Belum Tersedia</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Pengumuman Section -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-xl font-bold text-gray-900">
                                        <i class="fas fa-bullhorn text-blue-600 mr-2"></i>
                                        Pengumuman Terbaru
                                    </h2>
                                    <span class="text-sm text-gray-500">Update terkini</span>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="space-y-6">
                                    <!-- Pengumuman Item 1 -->
                                    @foreach ($pengumuman as $item)
                                        <div class="border-l-4 border-blue-500 bg-blue-50 p-4 rounded-r-lg">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <h3 class="font-semibold text-gray-900 mb-2">
                                                        {{ $item->judul }}
                                                    </h3>
                                                    <p class="text-gray-700 text-sm mb-3">
                                                        {{ $item->isi }}
                                                    </p>
                                                    <div class="flex items-center text-xs text-gray-500">
                                                        <i class="fas fa-calendar mr-1"></i>
                                                        <span>{{ $item->tanggal_publikasi}} WIB</span>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <span class="w-3 h-3 bg-blue-500 rounded-full block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline & Quick Actions -->
                    <div class="space-y-6">
                        <!-- Timeline Section -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-bold text-gray-900">
                                    <i class="fas fa-timeline text-purple-600 mr-2"></i>
                                    Timeline Pendaftaran
                                </h2>
                            </div>

                            <div class="p-6">
                                <div class="space-y-4">
                                    <!-- Timeline Item 1 -->
                                    <div class="flex items-start">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-check text-green-600 text-sm"></i>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="font-medium text-gray-900">Registrasi Akun</h4>
                                            <p class="text-sm text-gray-600">Akun berhasil dibuat</p>
                                        </div>
                                    </div>

                                    <!-- Timeline Item 2 -->
                                    @if ($data_diri)
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-check text-green-600 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-900">Data Diri</h4>
                                                <p class="text-sm text-gray-600">Formulir telah diisi</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-circle text-gray-400 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-400">Verifikasi</h4>
                                                <p class="text-sm text-gray-400">Menunggu kelengkapan berkas</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Timeline Item 3 -->
                                    @if ($data_diri)
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-check text-green-600 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-900">Upload Berkas</h4>
                                                <p class="text-sm text-gray-600">Berkas Sudah diupload</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-circle text-gray-400 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-400">Verifikasi</h4>
                                                <p class="text-sm text-gray-400">Menunggu kelengkapan berkas</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Timeline Item 4 -->
                                    @if ($verifikasi->status == 'lengkap')
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-check text-green-600 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-900">Verifikasi</h4>
                                                <p class="text-sm text-gray-600">Lengkap</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-circle text-gray-400 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-400">Verifikasi</h4>
                                                <p class="text-sm text-gray-400">Menunggu kelengkapan berkas</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Timeline Item 5 -->
                                    @if ($calon_siswa->status_pendaftaran == 'lulus')
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-check text-green-600 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-900">Pengumuman</h4>
                                                <p class="text-sm text-gray-600">Hasil diumumkan</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-circle text-gray-400 text-sm"></i>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <h4 class="font-medium text-gray-400">Pengumuman</h4>
                                                <p class="text-sm text-gray-400">Hasil akan diumumkan</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </main>

        @if ($calon_siswa->status_pendaftaran == 'lulus'){
            <div id="modalKelulusan"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 transition-opacity duration-300">
                <div
                    class="bg-white rounded-xl shadow-2xl w-full max-w-2xl mx-4 overflow-hidden transform transition-all duration-300 scale-95">
                    <!-- Header dengan elemen dekoratif -->
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-6 relative">
                        <div class="absolute top-0 left-0 w-full h-full opacity-10">
                            <div class="absolute top-4 right-4 text-7xl">🎓</div>
                            <div class="absolute bottom-4 left-4 text-7xl">🏆</div>
                        </div>
                        <h2 class="text-4xl font-bold text-white relative z-10">Selamat! 🎉</h2>
                    </div>

                    <!-- Konten utama -->
                    <div class="p-8 text-center">
                        <div class="mb-6 flex flex-col items-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-green-100 rounded-full mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div class="max-w-lg mx-auto">
                                <p class="text-gray-800 mb-4 text-xl leading-relaxed">
                                    Anda dinyatakan <span class="font-bold text-green-600">LULUS</span> seleksi penerimaan
                                    siswa baru.
                                </p>
                                <p class="text-gray-600 mb-6 text-lg">
                                    Silakan cetak surat kelulusan Anda untuk informasi lebih lanjut.
                                </p>
                            </div>
                        </div>

                        <!-- Tombol aksi -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button onclick="closeModal()"
                                class="px-8 py-3 border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors text-lg">
                                Tutup
                            </button>
                        </div>
                    </div>

                    <!-- Catatan footer -->
                    <div class="bg-gray-50 px-8 py-4 text-center text-gray-500 border-t">
                        <p class="text-sm">Terima kasih telah mengikuti proses seleksi kami. Untuk pertanyaan lebih lanjut,
                            hubungi panitia penerimaan siswa baru.</p>
                    </div>
                </div>
            </div>
            }
        @endif

        <!-- Mobile Sidebar Overlay -->
        <div class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden" id="sidebar-overlay"
            onclick="toggleSidebar()"></div>

        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');

                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            function logout() {
                if (confirm('Apakah Anda yakin ingin keluar?')) {
                    fetch('/logout', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                        .then(response => {
                            if (response.ok) {
                                window.location.href = '/login';
                            } else {
                                console.error('Logout gagal:', response.status)
                            }
                        })
                        .catch(error => {
                            console.error('Terjadi error saat logout', error);
                        });
                }
            }

            function closeModal() {
                const modal = document.getElementById('modalKelulusan');
                const modalContent = modal.querySelector('div > div');

                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');

                setTimeout(() => {
                    modal.classList.remove('opacity-100');
                    modal.classList.add('opacity-0', 'pointer-events-none');
                }, 200);
            }
        </script>
</body>

</html>