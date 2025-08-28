<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alur Pendaftaran - MA Al-Muhsinin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-50">

    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-blue-600 text-white shadow-md z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex items-center space-x-3">
                <i class="fas fa-graduation-cap text-2xl"></i>
                <span class="font-bold text-lg">MA Al-Muhsinin</span>
            </div>
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('login') }}" class="hover:text-gray-200">Beranda</a>
                <a href="{{ route('informasi.sekolah') }}" class="hover:text-gray-200">Informasi Sekolah</a>
                <a href="{{ route('informasi.pendaftaran') }}" class="hover:text-gray-200">Alur Pendaftaran</a>
                <a href="{{ route('informasi.grafik') }}" class="hover:text-gray-200">Grafik Pendaftar</a>
            </nav>
            <!-- mobile menu (simple) -->
            <div class="md:hidden">
                <button id="mobileMenuBtn" class="focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- mobile dropdown -->
        <div id="mobileMenu" class="hidden bg-blue-600 text-white md:hidden">
            <div class="px-6 py-4 space-y-2">
                <a href="{{ route('login') }}" class="block">Beranda</a>
                <a href="{{ route('informasi.sekolah') }}" class="block">Informasi Sekolah</a>
                <a href="{{ route('informasi.pendaftaran') }}" class="block">Alur Pendaftaran</a>
                <a href="{{ route('informasi.grafik') }}" class="block">Grafik Pendaftar</a>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="pt-28 pb-16 px-6 max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Alur Pendaftaran Peserta Didik Baru (PPDB Online)
        </h1>
        <p class="text-center text-gray-600 mb-10">Pendaftaran dilaksanakan secara <strong>online</strong> melalui
            website resmi PPDB MA Al-Muhsinin. Ikuti langkah berikut agar proses pendaftaran lancar.</p>

        <!-- Timeline / Steps -->
        <div class="space-y-8">

            <!-- Step 1 -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold">
                    1</div>
                <div class="flex-1 bg-white p-6 rounded-2xl shadow">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-globe text-2xl text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Akses Website PPDB</h3>
                            <p class="text-gray-700 mt-2">Buka laman pendaftaran online sekolah. Jika belum ada akun,
                                pilih menu <em>Daftar</em> untuk membuat akun pendaftaran.</p>
                            <p class="text-sm text-gray-500 mt-2">Contoh: <code>https://ppdb.ma-almuhsinin.sch.id</code>
                                (ganti sesuai domain sebenarnya)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold">
                    2</div>
                <div class="flex-1 bg-white p-6 rounded-2xl shadow">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-user-plus text-2xl text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Daftar dengan Email</h3>
                            <p class="text-gray-700 mt-2">
                                Masukkan alamat email aktif yang akan digunakan untuk proses pendaftaran.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold">
                    3</div>
                <div class="flex-1 bg-white p-6 rounded-2xl shadow">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-file-lines text-2xl text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Isi Formulir Online</h3>
                            <p class="text-gray-700 mt-2">Lengkapi biodata calon siswa, data orang tua/wali, riwayat
                                pendidikan dll.</p>
                            <p class="text-sm text-gray-500 mt-1">Pastikan data diisi sesuai dokumen asli untuk
                                mempercepat verifikasi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold">
                    4</div>
                <div class="flex-1 bg-white p-6 rounded-2xl shadow">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-upload text-2xl text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Unggah Dokumen</h3>
                            <p class="text-gray-700 mt-2">Upload scan/foto dokumen yang diminta (format JPG/PNG/PDF),
                                SKHU, SKL, Akta Kelahiran, KK, Pas Foto 2x3, dan Pas Foto 3x4.</p>
                            <p class="text-sm text-gray-500 mt-1">Periksa ukuran file dan nama file sesuai ketentuan
                                agar tidak gagal upload.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-6">
                <div
                    class="flex-shrink-0 w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold">
                    5
                </div>
                <div class="flex-1 bg-white p-6 rounded-2xl shadow">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-laptop-code text-2xl text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Mengikuti Ujian CBT</h3>
                            <p class="text-gray-700 mt-2">
                                Calon peserta didik wajib mengikuti ujian Computer Based Test (CBT)
                                sesuai jadwal yang telah ditentukan. Ujian dilaksanakan secara online
                                di sistem.
                            </p>
                            <p class="text-sm text-gray-500 mt-1">
                                Pastikan perangkat terhubung internet stabil dan login menggunakan akun
                                yang sudah diberikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Step 6 -->
            <div class="flex gap-4">
                <div
                    class="flex-shrink-0 w-14 h-14 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold">
                    6</div>
                <div class="flex-1 bg-white p-6 rounded-2xl shadow">
                    <div class="flex items-start gap-4">
                        <i class="fas fa-user-check text-2xl text-blue-600 mt-1"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Pengumuman Kelulusan</h3>
                            <p class="text-gray-700 mt-2">
                                Jika dinyatakan <strong>lulus seleksi</strong>, pemberitahuan resmi akan langsung muncul
                                di
                                <strong>dashboard calon siswa</strong>. Calon siswa dapat login untuk melihat status
                                kelulusannya tanpa menunggu email/WA.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="text-center mt-12">
            <a href="{{ route('register') }}"
                class="inline-flex items-center gap-3 px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                <i class="fas fa-pencil-alt"></i>
                Daftar Sekarang (PPDB Online)
            </a>
        </div>

        <!-- Notes -->
        <div class="max-w-3xl mx-auto mt-8 text-gray-600 text-sm">
            <p><strong>Catatan:</strong> Pastikan data dan dokumen yang diunggah jelas terbaca. Untuk bantuan teknis
                atau pertanyaan, hubungi sekretariat sekolah atau panitia PPDB melalui kontak resmi.</p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-6 text-center mt-12">
        <p>&copy; 2025 MA Al-Muhsinin. Semua hak dilindungi.</p>
    </footer>

    <script>
        // mobile menu toggle
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        btn?.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>