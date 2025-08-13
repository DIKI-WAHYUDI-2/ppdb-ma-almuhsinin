<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Calon Siswa - MA Al-Muhsinin</title>
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
                    class="flex items-center px-4 py-3 text-blue-600 bg-blue-50 rounded-lg">
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
                    <label for="sidebar-toggle" class="lg:hidden text-gray-600 hover:text-gray-900 mr-4 cursor-pointer">
                        <i class="fas fa-bars text-xl"></i>
                    </label>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Formulir Data Diri</h1>
                        <p class="text-sm text-gray-500">Lengkapi data pribadi calon siswa</p>
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
            <!-- Welcome Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-hand-wave text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Selamat Datang!</h2>
                        <p class="text-gray-600">Lengkapi formulir pendaftaran untuk melanjutkan proses PPDB</p>
                    </div>
                </div>
            </div>

            <!-- Progress Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Progress Pendaftaran</h3>
                    <span class="text-sm text-blue-600 font-medium">1 dari 3 langkah</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: 33%"></div>
                </div>
                <div class="flex justify-between mt-2 text-sm">
                    <span class="text-blue-600 font-medium">Data Pribadi</span>
                    <span class="text-blue-600 font-medium">Data Orang Tua</span>
                    <span class="text-gray-400">Upload Berkas</span>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-edit text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Formulir Data Pribadi</h3>
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

                <form method="POST"
                    action="{{ $calon_siswa ? route('calon-siswa.update', $calon_siswa->id) : route('calon-siswa.store') }}"
                    class="space-y-6">
                    @csrf
                    @if ($calon_siswa)
                        @method('PUT')

                    @endif
                    <!-- Data Identitas -->
                    <div class="border-b border-gray-200 pb-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-id-card text-blue-600 mr-2"></i>
                            Data Identitas Diri Siswa
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Lengkap -->
                            <div class="md:col-span-2">
                                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan nama lengkap"
                                    value="{{ old('nama_lengkap', $calon_siswa->nama_lengkap ?? '') }}">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis Kelamin <span class="text-red-500">*</span>
                                </label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin', $calon_siswa->jenis_kelamin ?? '') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $calon_siswa->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <!-- Agama -->
                            <div>
                                <label for="agama" class="block text-sm font-medium text-gray-700 mb-2">
                                    Agama <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="agama" name="agama" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan agama" value="{{ old('agama', $calon_siswa->agama ?? '') }}">
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tempat Lahir <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan tempat lahir"
                                    value="{{ old('tempat_lahir', $calon_siswa->tempat_lahir ?? '') }}">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Lahir <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    value="{{ old('tanggal_lahir', $calon_siswa->tanggal_lahir ?? '') }}">
                            </div>

                            <!-- ANAK KE -->
                            <div>
                                <label for="anak_keberapa" class="block text-sm font-medium text-gray-700 mb-2">
                                    Anak Keberapa <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="anak_keberapa" name="anak_keberapa" required maxlength="2"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan anak keberapa"
                                    value="{{ old('anak_keberapa', $calon_siswa->anak_keberapa ?? '') }}">
                            </div>

                            <!-- JUMLAH SAUDARA -->
                            <div>
                                <label for="jumlah_saudara" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jumlah Saudara <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="jumlah_saudara" name="jumlah_saudara" required maxlength="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan jumlah saudara"
                                    value="{{ old('jumlah_saudara', $calon_siswa->jumlah_saudara ?? '') }}">
                            </div>

                            <!-- HOBI -->
                            <div>
                                <label for="hobi" class="block text-sm font-medium text-gray-700 mb-2">
                                    Hobi <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="hobi" name="hobi" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan hobi" value="{{ old('hobi', $calon_siswa->hobi ?? '') }}">
                            </div>

                            <!-- CITA-CITA -->
                            <div>
                                <label for="cita_cita" class="block text-sm font-medium text-gray-700 mb-2">
                                    Cita-cita <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="cita_cita" name="cita_cita" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan cita-cita"
                                    value="{{ old('cita_cita', $calon_siswa->cita_cita ?? '') }}">
                            </div>

                            <!-- ALAMAT SESUAI KK -->
                            <div class="col-span-1 md:col-span-2">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-map-marker text-blue-600 mr-2"></i>
                                    Alamat Sesuai KK
                                </h4>


                                <div class="flex flex-col md:flex-row gap-4">
                                    <!-- DUSUN (60%) -->
                                    <div class="basis-full md:basis-3/5">
                                        <label for="dusun" class="block text-sm font-medium text-gray-700 mb-2">
                                            Dusun <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="dusun" name="dusun" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="Masukkan dusun"
                                            value="{{ old('dusun', $calon_siswa->dusun ?? '') }}">
                                    </div>

                                    <!-- RT (20%) -->
                                    <div class="basis-full md:basis-1/5">
                                        <label for="rt" class="block text-sm font-medium text-gray-700 mb-2">
                                            RT <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="rt" name="rt" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="RT" value="{{ old('rt', $calon_siswa->rt ?? '') }}">
                                    </div>

                                    <!-- RW (20%) -->
                                    <div class="basis-full md:basis-1/5">
                                        <label for="rw" class="block text-sm font-medium text-gray-700 mb-2">
                                            RW <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="rw" name="rw" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="RW" value="{{ old('rw', $calon_siswa->rw ?? '') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- KELURAHAN -->
                            <div>
                                <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kelurahan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="kelurahan" name="kelurahan" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan kelurahan"
                                    value="{{ old('kelurahan', $calon_siswa->kelurahan ?? '') }}">
                            </div>

                            <!-- KECAMATAN -->
                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kecamatan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="kecamatan" name="kecamatan" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan kecamatan"
                                    value="{{ old('kecamatan', $calon_siswa->kecamatan ?? '') }}">
                            </div>

                            <!-- TEMPAT TINGGAL SEKARANG -->
                            <div>
                                <label for="tempat_tinggal_sekarang"
                                    class="block text-sm font-medium text-gray-700 mb-2">
                                    Tempat Tinggal Sekarang <span class="text-red-500">*</span>
                                </label>
                                <select id="tempat_tinggal_sekarang" name="tempat_tinggal_sekarang" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">Pilih tempat tinggal sekarang</option>
                                    <option value="Orang Tua" {{ old('tempat_tinggal_sekarang', $calon_siswa->tempat_tinggal_sekarang ?? '') == 'Orang Tua' ? 'selected' : '' }}>
                                        Orang Tua</option>
                                    <option value="Asrama" {{ old('tempat_tinggal_sekarang', $calon_siswa->tempat_tinggal_sekarang ?? '') == 'Asrama' ? 'selected' : '' }}>
                                        Asrama</option>
                                </select>
                            </div>

                            <!-- NO HP -->
                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">
                                    No. HP <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="no_hp" name="no_hp" required pattern="[0-9]{10,13}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    placeholder="Masukkan nomor HP (08xxxxxxxxxx)"
                                    value="{{ old('no_hp', $calon_siswa->no_hp ?? '') }}"
                                    title="Nomor HP harus berupa angka 10-13 digit">
                            </div>

                            <!-- DATA PENDIDIKAN -->
                            <div class="col-span-1 md:col-span-2">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-graduation-cap text-blue-600 mr-2"></i>
                                    Data Pendidikan
                                </h4>

                                <!-- Grid 2 Kolom -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- ASAL SEKOLAH -->
                                    <div>
                                        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-2">
                                            Asal Sekolah <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="asal_sekolah" name="asal_sekolah" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="Masukkan asal sekolah"
                                            value="{{ old('asal_sekolah', $calon_siswa->asal_sekolah ?? '') }}">
                                    </div>

                                    <!-- STATUS SEKOLAH -->
                                    <div>
                                        <label for="status_sekolah"
                                            class="block text-sm font-medium text-gray-700 mb-2">
                                            Status Sekolah <span class="text-red-500">*</span>
                                        </label>
                                        <select id="status_sekolah" name="status_sekolah" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                            <option value="">Pilih status sekolah</option>
                                            <option value="Negeri" {{ old('status_sekolah', $calon_siswa->status_sekolah ?? '') == 'Negeri' ? 'selected' : '' }}>
                                                Negeri</option>
                                            <option value="Swasta" {{ old('status_sekolah', $calon_siswa->status_sekolah ?? '') == 'Swasta' ? 'selected' : '' }}>
                                                Swasta</option>
                                        </select>
                                    </div>

                                    <!-- NISN -->
                                    <div>
                                        <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">
                                            NISN <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="nisn" name="nisn" required pattern="[0-9]{10}"
                                            maxlength="10"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="Masukkan NISN (10 digit)"
                                            value="{{ old('nisn', $calon_siswa->nisn ?? '') }}"
                                            title="NISN harus berupa 10 digit angka">
                                    </div>

                                    <!-- NOMOR PESERTA UN -->
                                    <div>
                                        <label for="nomor_peserta_un"
                                            class="block text-sm font-medium text-gray-700 mb-2">
                                            Nomor Peserta UN <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="nomor_peserta_un" name="nomor_peserta_un" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="Masukkan nomor peserta UN"
                                            value="{{ old('nomor_peserta_un', $calon_siswa->nomor_peserta_un ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4 pt-6">
                        <button type="reset" onclick="return confirm('Apakah Anda yakin ingin mereset form?')"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            <i class="fas fa-undo mr-2"></i>Reset
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
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