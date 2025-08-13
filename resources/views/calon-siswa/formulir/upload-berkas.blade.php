<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Upload Berkas - MA Al-Muhsinin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">
    <!-- Hidden checkbox for CSS-only sidebar toggle -->
    <input type="checkbox" id="sidebar-toggle" class="hidden">

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
                    class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
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
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
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
                    <label for="sidebar-toggle" class="lg:hidden text-gray-600 hover:text-gray-900 mr-4 cursor-pointer">
                        <i class="fas fa-bars text-xl"></i>
                    </label>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Upload Berkas</h1>
                        <p class="text-sm text-gray-500">Upload dokumen persyaratan pendaftaran</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-900">{{ $calon_siswa->nama_lengkap ?? "calon siswa" }}
                        </p>
                        <p class="text-xs text-gray-500">{{ $akun->email }}</p>
                    </div>
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-sm"></i>
                    </div>
                    <button onclick="logout()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Form Content -->
        <main class="p-6">
            <!-- Progress Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Progress Pendaftaran</h3>
                    <span class="text-sm text-blue-600 font-medium">3 dari 3 langkah</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 100%"></div>
                </div>
                <div class="flex justify-between mt-2 text-sm">
                    <span class="text-green-600 font-medium">✓ Data Pribadi</span>
                    <span class="text-green-600 font-medium">✓ Data Orang Tua</span>
                    <span class="text-blue-600 font-medium">Upload Berkas</span>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-blue-900 mb-2">Persyaratan Upload Berkas</h4>
                        <ul class="text-blue-800 text-sm space-y-1">
                            <li>• Format file: PDF, JPG, JPEG, PNG</li>
                            <li>• Ukuran maksimal: 2MB per file</li>
                            <li>• Pastikan file dapat dibaca dengan jelas</li>
                            <li>• Semua berkas wajib diupload</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Upload Form -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cloud-upload-alt text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Upload Berkas Pendaftaran</h3>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                            <span class="text-red-700 font-medium">Terdapat kesalahan:</span>
                        </div>
                        <ul class="text-red-600 text-sm list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-green-700 font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form method="POST"
                    action="{{ $berkas->count() > 0 ? route('upload-berkas.update', $calon_siswa->id) : route('upload-berkas.store') }}"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if ($berkas->count() > 0)
                        @method('PUT')
                    @endif

                    <!-- Berkas yang diperlukan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Foto Siswa 3x4 -->
                        <div class="upload-item">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Pas Foto 3x4 <span class="text-red-500">*</span>
                            </label>
                            <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                                onclick="document.getElementById('pas_foto_3x4').click()">
                                <i class="fas fa-camera text-gray-400 text-2xl mb-2"></i>
                                <p class="text-gray-600 text-sm">Klik untuk upload foto</p>
                                <p class="text-gray-400 text-xs mt-1">JPG, PNG (Max: 2MB)</p>
                            </div>
                            <input type="file" id="pas_foto_3x4" name="pas_foto_3x4" accept="image/*" class="hidden"
                                required>
                            <div id="preview_pas_foto_3x4"
                                class="mt-2 {{ $berkas->where('jenis_berkas', 'Pas Foto 3x4')->first() ? '' : 'hidden' }}">
                                <div class="flex items-center space-x-2 text-sm text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="file-name">
                                        @if($berkas->where('jenis_berkas', 'Pas Foto 3x4')->first())
                                            {{ $berkas->where('jenis_berkas', 'Pas Foto 3x4')->first()->nama_file }}
                                        @endif
                                    </span>
                                    @php $berkasItem = $berkas->where('jenis_berkas', 'Pas Foto 3x4')->first(); @endphp
                                    @if($berkasItem)
                                        <button type="button" onclick="previewFile('{{ $berkasItem->file_path }}')"
                                            class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                            <i class="fas fa-eye mr-1"></i>Lihat
                                        </button>
                                        <button type="button"
                                            onclick="downloadFile('{{ $berkasItem->file_path }}', '{{ $berkasItem->nama_file }}')"
                                            class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                                            <i class="fas fa-download mr-1"></i>Download
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Foto Siswa 2x3 -->
                        <div class="upload-item">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Pas Foto 2x3 <span class="text-red-500">*</span>
                            </label>
                            <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                                onclick="document.getElementById('pas_foto_2x3').click()">
                                <i class="fas fa-camera text-gray-400 text-2xl mb-2"></i>
                                <p class="text-gray-600 text-sm">Klik untuk upload foto</p>
                                <p class="text-gray-400 text-xs mt-1">JPG, PNG (Max: 2MB)</p>
                            </div>
                            <input type="file" id="pas_foto_2x3" name="pas_foto_2x3" accept="image/*" class="hidden"
                                required>
                            <div id="preview_pas_foto_2x3"
                                class="mt-2 {{ $berkas->where('jenis_berkas', 'Pas Foto 2x3')->first() ? '' : 'hidden' }}   ">
                                <div class="flex items-center space-x-2 text-sm text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="file-name">
                                        @if($berkas->where('jenis_berkas', 'Pas Foto 2x3')->first())
                                            {{ $berkas->where('jenis_berkas', 'Pas Foto 2x3')->first()->nama_file }}
                                        @endif
                                    </span>
                                    @php $berkasItem = $berkas->where('jenis_berkas', 'Pas Foto 2x3')->first(); @endphp
                                    @if($berkasItem)
                                        <button type="button" onclick="previewFile('{{ $berkasItem->file_path }}')"
                                            class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                            <i class="fas fa-eye mr-1"></i>Lihat
                                        </button>
                                        <button type="button"
                                            onclick="downloadFile('{{ $berkasItem->file_path }}', '{{ $berkasItem->nama_file }}')"
                                            class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                                            <i class="fas fa-download mr-1"></i>Download
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- SKL -->
                        <div class="upload-item">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                SKL <span class="text-red-500">*</span>
                            </label>
                            <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                                onclick="document.getElementById('skl').click()">
                                <i class="fas fa-scroll text-gray-400 text-2xl mb-2"></i>
                                <p class="text-gray-600 text-sm">Klik untuk upload SKL</p>
                                <p class="text-gray-400 text-xs mt-1">PDF, JPG, PNG (Max: 2MB)</p>
                            </div>
                            <input type="file" id="skl" name="skl" accept=".pdf,image/*" class="hidden" required>
                            <div id="preview_skl"
                                class="mt-2 {{ $berkas->where('jenis_berkas', 'SKL')->first() ? '' : 'hidden' }}">
                                <div class="flex items-center space-x-2 text-sm text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="file-name">
                                        @if($berkas->where('jenis_berkas', 'SKL')->first())
                                            {{ $berkas->where('jenis_berkas', 'SKL')->first()->nama_file }}
                                        @endif
                                    </span>
                                    @php $berkasItem = $berkas->where('jenis_berkas', 'SKL')->first(); @endphp
                                    @if($berkasItem)
                                        <button type="button" onclick="previewFile('{{ $berkasItem->file_path }}')"
                                            class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                            <i class="fas fa-eye mr-1"></i>Lihat
                                        </button>
                                        <button type="button"
                                            onclick="downloadFile('{{ $berkasItem->file_path }}', '{{ $berkasItem->nama_file }}')"
                                            class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                                            <i class="fas fa-download mr-1"></i>Download
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- SKHUN -->
                        <div class="upload-item">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                SKHUN <span class="text-red-500">*</span>
                            </label>
                            <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                                onclick="document.getElementById('skhun').click()">
                                <i class="fas fa-file-alt text-gray-400 text-2xl mb-2"></i>
                                <p class="text-gray-600 text-sm">Klik untuk upload SKHUN</p>
                                <p class="text-gray-400 text-xs mt-1">PDF, JPG, PNG (Max: 2MB)</p>
                            </div>
                            <input type="file" id="skhun" name="skhun" accept=".pdf,image/*" class="hidden" required>
                            <div id="preview_skhun"
                                class="mt-2 {{ $berkas->where('jenis_berkas', 'SKHUN')->first() ? '' : 'hidden' }}">
                                <div class="flex items-center space-x-2 text-sm text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="file-name">
                                        @if($berkas->where('jenis_berkas', 'SKHUN')->first())
                                            {{ $berkas->where('jenis_berkas', 'SKHUN')->first()->nama_file }}
                                        @endif
                                    </span>
                                    @php $berkasItem = $berkas->where('jenis_berkas', 'SKHUN')->first(); @endphp
                                    @if($berkasItem)
                                        <button type="button" onclick="previewFile('{{ $berkasItem->file_path }}')"
                                            class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                            <i class="fas fa-eye mr-1"></i>Lihat
                                        </button>
                                        <button type="button"
                                            onclick="downloadFile('{{ $berkasItem->file_path }}', '{{ $berkasItem->nama_file }}')"
                                            class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                                            <i class="fas fa-download mr-1"></i>Download
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Kartu Keluarga -->
                        <div class="upload-item">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kartu Keluarga <span class="text-red-500">*</span>
                            </label>
                            <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                                onclick="document.getElementById('kartu_keluarga').click()">
                                <i class="fas fa-id-card text-gray-400 text-2xl mb-2"></i>
                                <p class="text-gray-600 text-sm">Klik untuk upload KK</p>
                                <p class="text-gray-400 text-xs mt-1">PDF, JPG, PNG (Max: 2MB)</p>
                            </div>
                            <input type="file" id="kartu_keluarga" name="kartu_keluarga" accept=".pdf,image/*"
                                class="hidden" required>
                            <div id="preview_kartu_keluarga"
                                class="mt-2 {{ $berkas->where('jenis_berkas', 'Kartu Keluarga')->first() ? '' : 'hidden' }}">
                                <div class="flex items-center space-x-2 text-sm text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="file-name">
                                        @if($berkas->where('jenis_berkas', 'Kartu Keluarga')->first())
                                            {{ $berkas->where('jenis_berkas', 'Kartu Keluarga')->first()->nama_file }}
                                        @endif
                                    </span>
                                    @php $berkasItem = $berkas->where('jenis_berkas', 'SKHUN')->first(); @endphp
                                    @if($berkasItem)
                                        <button type="button" onclick="previewFile('{{ $berkasItem->file_path }}')"
                                            class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                            <i class="fas fa-eye mr-1"></i>Lihat
                                        </button>
                                        <button type="button"
                                            onclick="downloadFile('{{ $berkasItem->file_path }}', '{{ $berkasItem->nama_file }}')"
                                            class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                                            <i class="fas fa-download mr-1"></i>Download
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Akta Kelahiran -->
                        <div class="upload-item">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Akta Kelahiran <span class="text-red-500">*</span>
                            </label>
                            <div class="upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                                onclick="document.getElementById('akta_kelahiran').click()">
                                <i class="fas fa-certificate text-gray-400 text-2xl mb-2"></i>
                                <p class="text-gray-600 text-sm">Klik untuk upload akta</p>
                                <p class="text-gray-400 text-xs mt-1">PDF, JPG, PNG (Max: 2MB)</p>
                            </div>
                            <input type="file" id="akta_kelahiran" name="akta_kelahiran" accept=".pdf,image/*"
                                class="hidden" required>
                            <div id="preview_akta_kelahiran"
                                class="mt-2 {{ $berkas->where('jenis_berkas', 'Akta Kelahiran')->first() ? '' : 'hidden' }}">
                                <div class="flex items-center space-x-2 text-sm text-green-600">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="file-name">
                                        @if($berkas->where('jenis_berkas', 'Akta Kelahiran')->first())
                                            {{ $berkas->where('jenis_berkas', 'Akta Kelahiran')->first()->nama_file }}
                                        @endif
                                    </span>
                                    @php $berkasItem = $berkas->where('jenis_berkas', 'SKHUN')->first(); @endphp
                                    @if($berkasItem)
                                        <button type="button" onclick="previewFile('{{ $berkasItem->file_path }}')"
                                            class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                            <i class="fas fa-eye mr-1"></i>Lihat
                                        </button>
                                        <button type="button"
                                            onclick="downloadFile('{{ $berkasItem->file_path }}', '{{ $berkasItem->nama_file }}')"
                                            class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-600">
                                            <i class="fas fa-download mr-1"></i>Download
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                        <a href="{{ route('calon-siswa.data-orangtua') }}"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>

                        <div class="flex space-x-4">
                            <button type="reset" onclick="return confirm('Apakah Anda yakin ingin mereset semua file?')"
                                class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fas fa-undo mr-2"></i>Reset
                            </button>
                            <button type="submit"
                                class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                                <i class="fas fa-save mr-2"></i>Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Mobile Sidebar Toggle (CSS Only) -->
    <style>
        /* CSS-only sidebar toggle for mobile */
        #sidebar-toggle:checked~#sidebar {
            transform: translateX(0);
        }

        #sidebar-toggle:checked~#sidebar-overlay {
            display: block;
        }

        #sidebar-toggle {
            display: none;
        }

        @media (max-width: 1023px) {
            #sidebar {
                transform: translateX(-100%);
                transition: transform 0.2s ease-in-out;
            }

            #sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                z-index: 40;
                background-color: rgba(0, 0, 0, 0.5);
            }
        }

        /* File upload styling */
        .upload-area:hover {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }

        .upload-area.drag-over {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }
    </style>

    <!-- Mobile Sidebar Overlay -->
    <label for="sidebar-toggle" id="sidebar-overlay" class="lg:hidden"></label>

    <script>

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

        function downloadFile(filePath, fileName) {
            const link = document.createElement('a');
            link.href = '/' + filePath;
            link.download = fileName;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function previewFile(filePath) {
            window.open('/' + filePath, '_blank');
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Setup event listeners for all file inputs
            const fileInputs = [
                'pas_foto_3x4', 'pas_foto_2x3', 'skl',
                'skhun', 'kartu_keluarga', 'akta_kelahiran'
            ];

            fileInputs.forEach(id => {
                const input = document.getElementById(id);
                if (input) {
                    input.addEventListener('change', function (e) {
                        if (this.files && this.files[0]) {
                            const previewDiv = document.getElementById(`preview_${id}`);
                            const fileNameSpan = previewDiv.querySelector('.file-name');

                            fileNameSpan.textContent = this.files[0].name;
                            previewDiv.classList.remove('hidden');

                            // For images, you could also show a thumbnail
                            if (this.accept.includes('image')) {
                                const reader = new FileReader();
                                reader.onload = function (e) {
                                    // You could add an img element to show thumbnail
                                }
                                reader.readAsDataURL(this.files[0]);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>