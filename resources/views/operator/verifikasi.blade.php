<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verifikasi Berkas - Dashboard Operator</title>
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
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
                    <i class="fas fa-check-circle mr-3"></i>
                    Verifikasi Berkas
                </a>
                <a href="{{ route('operator.kelulusan') }}"
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
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
                    <h1 class="text-2xl font-bold text-gray-900">Verifikasi Berkas</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-600">
                        <span class="font-medium">48</span> berkas menunggu verifikasi
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6">
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
                            <option value="menunggu">Menunggu Verifikasi</option>
                            <option value="terverifikasi">Terverifikasi</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Calon Siswa List -->
            <div class="space-y-4">
                <!-- Siswa Item 1 -->
                @foreach ($calon_siswa as $siswa)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-blue-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $siswa->nama_lengkap }}</h3>
                                    <p class="text-sm text-gray-600">NISN: {{ $siswa->nisn }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                @php
                                    // Hitung status berkas
                                    $totalBerkas = $siswa->berkas->count();
                                    $validBerkas = $siswa->berkas->where('status', 'valid')->count();
                                    $rejectedBerkas = $siswa->berkas->where('status', 'tidak_valid')->count();
                                    $pendingBerkas = $siswa->berkas->where('status', 'belum_diverifikasi')->count();

                                    // Tentukan status badge berdasarkan verifikasi berkas
                                    if ($totalBerkas == 0) {
                                        $statusText = 'Belum Upload';
                                        $statusClass = 'bg-gray-100 text-gray-800';
                                    } elseif ($pendingBerkas > 0) {
                                        $statusText = 'Menunggu Verifikasi';
                                        $statusClass = 'bg-yellow-100 text-yellow-800';
                                    } elseif ($rejectedBerkas > 0) {
                                        $statusText = 'Berkas Ditolak';
                                        $statusClass = 'bg-red-100 text-red-800';
                                    } elseif ($validBerkas == $totalBerkas && $totalBerkas > 0) {
                                        $statusText = 'Terverifikasi';
                                        $statusClass = 'bg-green-100 text-green-800';
                                    } else {
                                        $statusText = 'Review';
                                        $statusClass = 'bg-orange-100 text-orange-800';
                                    }

                                    // Tentukan button berdasarkan status verifikasi
                                    if ($totalBerkas == 0) {
                                        $buttonText = 'Verifikasi';
                                        $buttonIcon = 'fa-eye';
                                        $buttonClass = 'bg-blue-600 hover:bg-blue-700';
                                    } elseif ($pendingBerkas > 0) {
                                        $buttonText = 'Verifikasi';
                                        $buttonIcon = 'fa-eye';
                                        $buttonClass = 'bg-blue-600 hover:bg-blue-700';
                                    } elseif ($rejectedBerkas > 0) {
                                        $buttonText = 'Review Ulang';
                                        $buttonIcon = 'fa-redo';
                                        $buttonClass = 'bg-orange-600 hover:bg-orange-700';
                                    } elseif ($validBerkas == $totalBerkas && $totalBerkas > 0) {
                                        $buttonText = 'Lihat Detail';
                                        $buttonIcon = 'fa-eye';
                                        $buttonClass = 'bg-green-600 hover:bg-green-700';
                                    } else {
                                        $buttonText = 'Verifikasi';
                                        $buttonIcon = 'fa-eye';
                                        $buttonClass = 'bg-blue-600 hover:bg-blue-700';
                                    }
                                @endphp
                                <span class="px-3 py-1 text-sm font-medium rounded-full {{ $statusClass }}">
                                    {{ $statusText }}
                                </span>
                                <button onclick="openVerifikasiModal({{ $siswa->id }})"
                                    class="{{ $buttonClass }} text-white px-4 py-2 rounded-lg transition-colors">
                                    <i class="fas {{ $buttonIcon }} mr-2"></i>{{ $buttonText }}
                                </button>
                            </div>
                        </div>

                        <!-- Progress Berkas -->
                        @php
                            $expectedBerkas = [
                                'Pas Foto 3x4' => 'fa-camera',
                                'Pas Foto 2x3' => 'fa-camera',
                                'Kartu Keluarga' => 'fa-id-card',
                                'Akta Kelahiran' => 'fa-certificate',
                                'SKL' => 'fa-scroll',
                                'SKHUN' => 'fa-file-alt'
                            ];

                            $uploadedBerkas = $siswa->berkas->keyBy('jenis_berkas');
                        @endphp

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-4">
                            @foreach($expectedBerkas as $jenisBerkas => $icon)
                                @php
                                    $berkas = $uploadedBerkas->get($jenisBerkas);
                                    $isUploaded = $berkas !== null;

                                    // Tentukan warna berdasarkan status
                                    if ($isUploaded) {
                                        $iconColor = 'text-green-600';
                                        $textColor = 'text-gray-700';
                                        $statusIcon = 'fa-check-circle';
                                        $statusColor = 'text-green-600';
                                    } else {
                                        $iconColor = 'text-red-500';
                                        $textColor = 'text-red-500';
                                        $statusIcon = 'fa-times-circle';
                                        $statusColor = 'text-red-500';
                                    }
                                @endphp

                                <div class="flex items-center space-x-2">
                                    <i class="fas {{ $icon }} {{ $iconColor }}"></i>
                                    <span class="text-sm {{ $textColor }}">{{ $jenisBerkas }}</span>
                                    <i class="fas {{ $statusIcon }} {{ $statusColor }} text-xs"></i>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach

                <!-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-green-600 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Siti Nurhaliza</h3>
                                <p class="text-sm text-gray-600">NISN: 0987654321 | Email: siti.nurhaliza@email.com</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                Terverifikasi
                            </span>
                            <button onclick="openVerifikasiModal(2)"
                                class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-eye mr-2"></i>Lihat Detail
                            </button>
                        </div>
                    </div> -->

                <!-- Progress Berkas -->
                <!-- <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-camera text-green-600"></i>
                            <span class="text-sm text-gray-700">Pas Foto</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-id-card text-green-600"></i>
                            <span class="text-sm text-gray-700">KK</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-certificate text-green-600"></i>
                            <span class="text-sm text-gray-700">Akta</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-scroll text-green-600"></i>
                            <span class="text-sm text-gray-700">Ijazah</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-file-alt text-green-600"></i>
                            <span class="text-sm text-gray-700">SKHUN</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-book-open text-green-600"></i>
                            <span class="text-sm text-gray-700">Raport</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                    </div>
                </div> -->

                <!-- Siswa Item 3 -->
                <!-- <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6"> -->
                <!-- <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-red-600 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Budi Santoso</h3>
                                <p class="text-sm text-gray-600">NISN: 1122334455 | Email: budi.santoso@email.com</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="px-3 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full">
                                Berkas Ditolak
                            </span>
                            <button onclick="openVerifikasiModal(3)"
                                class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors">
                                <i class="fas fa-eye mr-2"></i>Review Ulang
                            </button>
                        </div>
                    </div> -->

                <!-- Progress Berkas -->
                <!-- <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-camera text-green-600"></i>
                            <span class="text-sm text-gray-700">Pas Foto</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-id-card text-red-600"></i>
                            <span class="text-sm text-gray-700">KK</span>
                            <i class="fas fa-times-circle text-red-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-certificate text-green-600"></i>
                            <span class="text-sm text-gray-700">Akta</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-scroll text-red-600"></i>
                            <span class="text-sm text-gray-700">Ijazah</span>
                            <i class="fas fa-times-circle text-red-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-file-alt text-green-600"></i>
                            <span class="text-sm text-gray-700">SKHUN</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-book-open text-green-600"></i>
                            <span class="text-sm text-gray-700">Raport</span>
                            <i class="fas fa-check-circle text-green-600 text-xs"></i>
                        </div>
                    </div> -->
                <!-- </div> -->
            </div>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6">
        <div class="text-sm text-gray-700">
            Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">3</span> dari <span
                class="font-medium">48</span>
        </div>
        <div class="flex items-center space-x-2">
            <button class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-3 py-2 text-white bg-blue-600 border border-blue-600 rounded-lg">1</button>
            <button
                class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
            <button
                class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
            <button class="px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
    </main>
    </div>

    <!-- Verifikasi Modal -->
    <!-- Modal -->
    <div id="verifikasiModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
            <div
                class="inline-block w-full max-w-4xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 id="namaSiswa" class="text-lg font-semibold text-gray-900">Verifikasi Berkas</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Tempat berkas -->
                <div id="berkasContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
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


        function openVerifikasiModal(id) {
            const modal = document.getElementById('verifikasiModal');
            const container = document.getElementById('berkasContainer');

            modal.classList.remove('hidden');
            container.innerHTML = `<p class="text-sm text-gray-500">Memuat berkas...</p>`;

            fetch(`/operator/verifikasi/calon-siswa/${id}`)
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return res.json();
                })
                .then(data => {
                    // Perhatikan perubahan di sini - kita akses data.berkas
                    if (!data.berkas || !Array.isArray(data.berkas)) {
                        throw new Error('Format data tidak valid');
                    }

                    if (data.berkas.length === 0) {
                        container.innerHTML = `<p class="text-yellow-600">Tidak ada berkas ditemukan</p>`;
                        return;
                    }

                    // Update nama siswa di modal
                    document.getElementById('namaSiswa').textContent = `Verifikasi Berkas - ${data.nama}`;

                    let html = '';
                    data.berkas.forEach(item => {
                        html += `
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-medium text-gray-900">${item.jenis_berkas}</h4>
                        <span class="px-2 py-1 ${getStatusClass(item.status)} text-xs rounded-full">
                            ${item.status}
                        </span>
                    </div>
                    <div class="bg-gray-100 rounded-lg h-32 flex items-center justify-center mb-3">
                        <img src="/${item.file_path}" alt="${item.jenis_berkas}" class="max-h-full max-w-full object-contain">
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="window.open('/${item.file_path}', '_blank')" 
                            class="flex-1 px-3 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                            <i class="fas fa-eye mr-1"></i>Lihat
                        </button>
                        <button onclick="verifikasiBerkas(${item.id}, 'valid')" 
                            class="flex-1 px-3 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                            <i class="fas fa-check mr-1"></i>Valid
                        </button>
                        <button onclick="verifikasiBerkas(${item.id}, 'tidak_valid')" 
                            class="flex-1 px-3 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                            <i class="fas fa-times mr-1"></i>Tidak Valid
                        </button>
                    </div>
                </div>`;
                    });
                    container.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    container.innerHTML = `
                <p class="text-red-500">Gagal memuat data</p>
                <p class="text-sm text-gray-600">${error.message}</p>
            `;
                });
        }

        function getStatusClass(status) {
            const statusMap = {
                'valid': 'bg-green-100 text-green-800',
                'tidak_valid': 'bg-red-100 text-red-800',
                'belum_diverifikasi': 'bg-yellow-100 text-yellow-800'
            };
            return statusMap[status.toLowerCase()] || 'bg-gray-100 text-gray-800';
        }

        function verifikasiBerkas(id, status) {
            if (confirm('Apakah Anda yakin ingin memverifikasi berkas ini?')) {
                const btn = event.target;
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                btn.disabled = true;

                fetch(`/operator/verifikasi/berkas/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ status, catatan: '' })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast('Berkas berhasil diverifikasi!', 'success');
                            const statusBadge = btn.closest('.border').querySelector('span');
                            statusBadge.textContent = status;
                            statusBadge.className = `px-2 py-1 ${getStatusClass(status)} text-xs rounded-full`;

                            // Reset tombol
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        } else {
                            showToast('Gagal memverifikasi berkas!', 'error');
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        }
                    })
                    .catch(error => {
                        showToast('Terjadi kesalahan saat memverifikasi berkas!', 'error');
                    });
            }
        }

        function closeModal() {
            document.getElementById('verifikasiModal').classList.add('hidden');
        }

        function terimaBerkas() {
            if (confirm('Apakah Anda yakin ingin menerima semua berkas?')) {
                alert('Berkas berhasil diverifikasi!');
                closeModal();
            }
        }

        function tolakBerkas() {
            if (confirm('Apakah Anda yakin ingin menolak berkas ini?')) {
                alert('Berkas ditolak!');
                closeModal();
            }
        }

        function showToast(message, duration = 3000) {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toast-message');

            toastMsg.textContent = message;
            toast.classList.remove('hidden');
            toast.classList.add('opacity-100');

            setTimeout(() => {
                toast.classList.add('hidden');
            }, duration);
        }

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            const icon = type === 'success' ? 'fa-check' : 'fa-exclamation-triangle';

            toast.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            toast.innerHTML = `<i class="fas ${icon} mr-2"></i>${message}`;

            document.body.appendChild(toast);

            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);

            // Animate out and remove
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 3000);
        }
    </script>
</body>

</html>