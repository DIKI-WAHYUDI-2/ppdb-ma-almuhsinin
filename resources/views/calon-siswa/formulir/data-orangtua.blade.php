<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Orang Tua - MA Al-Muhsinin</title>
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
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
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
                    <label for="sidebar-toggle" class="lg:hidden text-gray-600 hover:text-gray-900 mr-4 cursor-pointer">
                        <i class="fas fa-bars text-xl"></i>
                    </label>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Data Orang Tua</h1>
                        <p class="text-sm text-gray-500">Lengkapi data orang tua/wali calon siswa</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-900">
                            {{ old('nama_lengkap', $calon_siswa->nama_lengkap ?? "calon siswa") }}
                        </p>
                        <p class="text-xs text-gray-500">{{ old('email', $email ?? '') }}</p>
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
                    <span class="text-sm text-blue-600 font-medium">2 dari 3 langkah</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 66%"></div>
                </div>
                <div class="flex justify-between mt-2 text-sm">
                    <span class="text-green-600 font-medium">✓ Data Pribadi</span>
                    <span class="text-blue-600 font-medium">Data Orang Tua</span>
                    <span class="text-gray-400">Upload Berkas</span>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Data Orang Tua</h3>
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
                    action="{{$calon_siswa ? route('orangtua.update', $calon_siswa->id) : route('orangtua.store') }}"
                    class="space-y-6">
                    @csrf
                    @if ($calon_siswa)
                        @method('PUT')
                    @endif

                    <!-- Data Ayah -->
                    <div class="border-b border-gray-200 pb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-male text-blue-600 mr-2"></i>
                            Data Ayah
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Ayah -->
                            <div class="md:col-span-2">
                                <label for="nama_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap Ayah <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_ayah" name="nama_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan nama lengkap ayah"
                                    value="{{ old('nama_ayah', $ayah->nama ?? '') }}">
                            </div>

                            <!-- Tempat Lahir Ayah -->
                            <div>
                                <label for="tempat_lahir_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tempat Lahir Ayah <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan tempat lahir ayah"
                                    value="{{ old('tempat_lahir_ayah', $ayah->tempat_lahir ?? '') }}">
                            </div>

                            <!-- Tanggal Lahir Ayah -->
                            <div>
                                <label for="tanggal_lahir_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Lahir Ayah <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    value="{{ old('tanggal_lahir_ayah', $ayah->tanggal_lahir ?? '') }}">
                            </div>

                            <!-- Agama Ayah -->
                            <div>
                                <label for="agama_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Agama Ayah <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="agama_ayah" name="agama_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan agama ayah"
                                    value="{{ old('agama_ayah', $ayah->agama ?? '') }}">
                            </div>

                            <!-- Pendidikan Ayah -->
                            <div>
                                <label for="pendidikan_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pendidikan Terakhir Ayah <span class="text-red-500">*</span>
                                </label>
                                <select id="pendidikan_ayah" name="pendidikan_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">Pilih pendidikan terakhir</option>
                                    <option value="SD" {{ old('pendidikan_ayah', $ayah->pendidikan ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('pendidikan_ayah', $ayah->pendidikan ?? '') == 'SMP' ? 'selected' : '' }}>SMP
                                    </option>
                                    <option value="SMA/SMK" {{ old('pendidikan_ayah', $ayah->pendidikan ?? '') == 'SMA/SMK' ? 'selected' : '' }}>
                                        SMA/SMK</option>
                                    <option value="D3" {{ old('pendidikan_ayah', $ayah->pendidikan ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="S1" {{ old('pendidikan_ayah', $ayah->pendidikan ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('pendidikan_ayah', $ayah->pendidikan ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('pendidikan_ayah', $ayah->pendidikan ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                            </div>

                            <!-- Pekerjaan Ayah -->
                            <div>
                                <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pekerjaan Ayah <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan pekerjaan ayah"
                                    value="{{ old('pekerjaan_ayah', $ayah->pekerjaan ?? '') }}">
                            </div>

                            <!-- Penghasilan Ayah -->
                            <div>
                                <label for="penghasilan_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Penghasilan Ayah <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="penghasilan_ayah" name="penghasilan_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan penghasilan ayah"
                                    value="{{ old('penghasilan_ayah', $ayah->penghasilan ?? '') }}">
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-map-marker text-blue-600 mr-2"></i>
                                    Alamat
                                </h4>


                                <div class="flex flex-col md:flex-row gap-4">
                                    <!-- DUSUN (60%) -->
                                    <div class="basis-full md:basis-3/5">
                                        <label for="dusun_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                            Dusun <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="dusun_ayah" name="dusun_ayah" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="Masukkan dusun"
                                            value="{{ old('dusun_ayah', $ayah->dusun ?? '') }}">
                                    </div>

                                    <!-- RT (20%) -->
                                    <div class="basis-full md:basis-1/5">
                                        <label for="rt_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                            RT <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="rt_ayah" name="rt_ayah" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="RT" value="{{ old('rt_ayah', $ayah->rt ?? '') }}">
                                    </div>

                                    <!-- RW (20%) -->
                                    <div class="basis-full md:basis-1/5">
                                        <label for="rw_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                            RW <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="rw_ayah" name="rw_ayah" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="RW" value="{{ old('rw_ayah', $ayah->rw ?? '') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- KELURAHAN -->
                            <div>
                                <label for="kelurahan_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kelurahan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="kelurahan_ayah" name="kelurahan_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan kelurahan"
                                    value="{{ old('kelurahan_ayah', $ayah->kelurahan ?? '') }}">
                            </div>

                            <!-- KECAMATAN -->
                            <div>
                                <label for="kecamatan_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kecamatan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="kecamatan_ayah" name="kecamatan_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan kecamatan"
                                    value="{{ old('kecamatan_ayah', $ayah->kecamatan ?? '') }}">
                            </div>

                            <!-- NO HP -->
                            <div>
                                <label for="no_hp_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    No. HP <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="no_hp_ayah" name="no_hp_ayah" required pattern="[0-9]{10,13}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan nomor HP (08xxxxxxxxxx)"
                                    value="{{ old('no_hp_ayah', $ayah->no_hp ?? '') }}"
                                    title="Nomor HP harus berupa angka 10-13 digit">
                            </div>

                            <!-- STATUS KEHIDUPAN -->
                            <div>
                                <label for="status_kehidupan_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status Kehidupan <span class="text-red-500">*</span>
                                </label>
                                <select id="status_kehidupan_ayah" name="status_kehidupan_ayah" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">Pilih status kehidupan</option>
                                    <option value="Hidup" {{ old('status_kehidupan_ayah', $ayah->status_kehidupan ?? '') == 'Hidup' ? 'selected' : '' }}>
                                        Hidup
                                    </option>
                                    <option value="Meninggal" {{ old('status_kehidupan_ayah', $ayah->status_kehidupan ?? '') == 'Meninggal' ? 'selected' : '' }}>
                                        Meninggal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="border-b border-gray-200 pb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-female text-pink-600 mr-2"></i>
                            Data Ibu
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Ibu -->
                            <div class="md:col-span-2">
                                <label for="nama_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap Ibu <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_ibu" name="nama_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan nama lengkap ibu"
                                    value="{{ old('nama_ibu', $ibu->nama ?? '') }}">
                            </div>

                            <!-- Tempat Lahir Ibu -->
                            <div>
                                <label for="tempat_lahir_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tempat Lahir Ibu <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan tempat lahir ibu"
                                    value="{{ old('tempat_lahir_ibu', $ibu->tempat_lahir ?? '') }}">
                            </div>

                            <!-- Tanggal Lahir Ibu -->
                            <div>
                                <label for="tanggal_lahir_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Lahir Ibu <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    value="{{ old('tanggal_lahir_ibu', $ibu->tanggal_lahir ?? '') }}">
                            </div>

                            <!-- Agama Ibu -->
                            <div>
                                <label for="agama_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Agama Ibu <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="agama_ibu" name="agama_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan agama ibu" value="{{ old('agama_ibu', $ibu->agama ?? '') }}">
                            </div>

                            <!-- Pendidikan Ibu -->
                            <div>
                                <label for="pendidikan_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pendidikan Terakhir Ibu <span class="text-red-500">*</span>
                                </label>
                                <select id="pendidikan_ibu" name="pendidikan_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">Pilih pendidikan terakhir</option>
                                    <option value="SD" {{ old('pendidikan_ibu', $ibu->pendidikan ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('pendidikan_ibu', $ibu->pendidikan ?? '') == 'SMP' ? 'selected' : '' }}>SMP
                                    </option>
                                    <option value="SMA/SMK" {{ old('pendidikan_ibu', $ibu->pendidikan ?? '') == 'SMA/SMK' ? 'selected' : '' }}>
                                        SMA/SMK</option>
                                    <option value="D3" {{ old('pendidikan_ibu', $ibu->pendidikan ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="S1" {{ old('pendidikan_ibu', $ibu->pendidikan ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('pendidikan_ibu', $ibu->pendidikan ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('pendidikan_ibu', $ibu->pendidikan ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                            </div>

                            <!-- Pekerjaan Ibu -->
                            <div>
                                <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pekerjaan Ibu <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan pekerjaan ibu"
                                    value="{{ old('pekerjaan_ibu', $ibu->pekerjaan ?? '') }}">
                            </div>

                            <!-- Penghasilan Ibu -->
                            <div>
                                <label for="penghasilan_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Penghasilan Ibu <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="penghasilan_ibu" name="penghasilan_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan penghasilan ibu"
                                    value="{{ old('penghasilan_ibu', $ibu->penghasilan ?? '') }}">
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-map-marker text-blue-600 mr-2"></i>
                                    Alamat
                                </h4>


                                <div class="flex flex-col md:flex-row gap-4">
                                    <!-- DUSUN (60%) -->
                                    <div class="basis-full md:basis-3/5">
                                        <label for="dusun_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                            Dusun <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="dusun_ibu" name="dusun_ibu" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="Masukkan dusun"
                                            value="{{ old('dusun_ibu', $ibu->dusun ?? '') }}">
                                    </div>

                                    <!-- RT (20%) -->
                                    <div class="basis-full md:basis-1/5">
                                        <label for="rt_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                            RT <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="rt_ibu" name="rt_ibu" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="RT" value="{{ old('rt_ibu', $ibu->rt ?? '') }}">
                                    </div>

                                    <!-- RW (20%) -->
                                    <div class="basis-full md:basis-1/5">
                                        <label for="rw_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                            RW <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="rw_ibu" name="rw_ibu" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="RW" value="{{ old('rw_ibu', $ibu->rw ?? '') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- KELURAHAN -->
                            <div>
                                <label for="kelurahan_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kelurahan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="kelurahan_ibu" name="kelurahan_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan kelurahan"
                                    value="{{ old('kelurahan_ibu', $ibu->kelurahan ?? '') }}">
                            </div>

                            <!-- KECAMATAN -->
                            <div>
                                <label for="kecamatan_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kecamatan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="kecamatan_ibu" name="kecamatan_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan kecamatan"
                                    value="{{ old('kecamatan_ibu', $ibu->kecamatan ?? '') }}">
                            </div>

                            <!-- NO HP -->
                            <div>
                                <label for="no_hp_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    No. HP <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="no_hp_ibu" name="no_hp_ibu" required pattern="[0-9]{10,13}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan nomor HP (08xxxxxxxxxx)"
                                    value="{{ old('no_hp_ibu', $ibu->no_hp ?? '') }}"
                                    title="Nomor HP harus berupa angka 10-13 digit">
                            </div>

                            <!-- STATUS KEHIDUPAN -->
                            <div>
                                <label for="status_kehidupan_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status Kehidupan <span class="text-red-500">*</span>
                                </label>
                                <select id="status_kehidupan_ibu" name="status_kehidupan_ibu" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">Pilih status kehidupan</option>
                                    <option value="Hidup" {{ old('status_kehidupan_ibu', $ibu->status_kehidupan ?? '') == 'Hidup' ? 'selected' : '' }}>
                                        Hidup
                                    </option>
                                    <option value="Meninggal" {{ old('status_kehidupan_ibu', $ibu->status_kehidupan ?? '') == 'Meninggal' ? 'selected' : '' }}>
                                        Meninggal</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between items-center pt-6">
                        <a href="{{ route('calon-siswa.data-diri') }}"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>

                        <div class="flex space-x-4">
                            <button type="reset" onclick="return confirm('Apakah Anda yakin ingin mereset form?')"
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
    </script>
</body>

</html>