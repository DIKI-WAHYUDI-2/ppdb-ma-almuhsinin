<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pendaftaran - MA Al-Muhsinin</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="{{ (route('login')) }}" class="hover:text-gray-200">Beranda</a>
                <a href="{{ (route('informasi.sekolah')) }}" class="hover:text-gray-200">Informasi Sekolah</a>
                <a href="{{ route('informasi.pendaftaran') }}" class="hover:text-gray-200">Informasi Pendaftaran</a>
                <a href="{{ route('informasi.grafik') }}" class="hover:text-gray-200">Grafik Jumlah Pendaftar</a>
            </nav>
        </div>
    </header>

    <!-- Konten -->
    <main class="pt-28 pb-16 px-6 max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-10">Informasi Pendaftaran Peserta Didik Baru</h1>

        <!-- Persyaratan -->
        <section class="bg-white p-8 rounded-2xl shadow-md mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Persyaratan Pendaftaran</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>Fotokopi Ijazah & SKHU (legalisir) sebanyak 2 lembar</li>
                <li>Fotokopi Akta Kelahiran & Kartu Keluarga</li>
                <li>Pas Foto ukuran 3x4 (3 lembar) & 2x3 (2 lembar)</li>
                <li>Fotokopi KTP Orang Tua/Wali</li>
                <li>Mengisi formulir pendaftaran secara lengkap</li>
            </ul>
        </section>

        <!-- Jadwal -->
        <section class="bg-white p-8 rounded-2xl shadow-md mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Jadwal Pendaftaran</h2>
            <table class="w-full border border-gray-200 text-gray-700">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border">Kegiatan</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border">Pendaftaran Dibuka</td>
                        <td class="px-4 py-2 border">1 Juni 2025</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border">Penutupan Pendaftaran</td>
                        <td class="px-4 py-2 border">30 Juli 2025</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">Seleksi & Wawancara</td>
                        <td class="px-4 py-2 border">5 - 7 Agustus 2025</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border">Pengumuman</td>
                        <td class="px-4 py-2 border">10 Agustus 2025</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Biaya -->
        <section class="bg-white p-8 rounded-2xl shadow-md mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Biaya Pendaftaran</h2>
            <p class="text-gray-700 mb-2">Biaya pendaftaran sebesar:</p>
            <p class="text-2xl font-bold text-blue-600">Rp 150.000,-</p>
            <p class="text-gray-600 mt-2">* Biaya dapat dibayarkan langsung di sekretariat sekolah saat menyerahkan
                berkas.</p>
        </section>

        <!-- CTA -->
        <div class="text-center mt-12">
            <a href="{{ route('register') }}"
                class="px-8 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Daftar Sekarang
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-6 text-center">
        <p>&copy; 2025 MA Al-Muhsinin. Semua hak dilindungi.</p>
    </footer>

</body>

</html>