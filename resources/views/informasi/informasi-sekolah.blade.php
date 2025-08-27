<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah - MA Al-Muhsinin</title>
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
                <a href="{{ (route('login')) }}" class="hover:text-gray-200">Beranda</a>
                <a href="{{ (route('informasi.sekolah')) }}" class="hover:text-gray-200">Informasi Sekolah</a>
                <a href="{{ route('informasi.pendaftaran') }}" class="hover:text-gray-200">Informasi Pendaftaran</a>
                <a href="{{ route('informasi.grafik') }}" class="hover:text-gray-200">Grafik Jumlah Pendaftar</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-blue-700 text-white pt-28 pb-20 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di MA Al-Muhsinin</h1>
            <p class="text-lg text-blue-100">
                Sekolah berbasis Islam yang unggul dalam pendidikan akademik, berkarakter, dan berprestasi.
            </p>
        </div>
    </section>

    <!-- Fasilitas -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Fasilitas Sekolah</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-6 rounded-2xl shadow">
                    <i class="fas fa-book-open text-3xl text-blue-600 mb-4"></i>
                    <h3 class="font-semibold text-xl mb-2">Perpustakaan Modern</h3>
                    <p>Ruang baca dengan koleksi buku lengkap dan suasana nyaman.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-2xl shadow">
                    <i class="fas fa-flask text-3xl text-blue-600 mb-4"></i>
                    <h3 class="font-semibold text-xl mb-2">Laboratorium Sains</h3>
                    <p>Laboratorium biologi, kimia, dan fisika untuk mendukung pembelajaran.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-2xl shadow">
                    <i class="fas fa-futbol text-3xl text-blue-600 mb-4"></i>
                    <h3 class="font-semibold text-xl mb-2">Lapangan Olahraga</h3>
                    <p>Lapangan sepak bola, voli, dan basket untuk aktivitas olahraga siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Prestasi Siswa</h2>
            <ul class="space-y-6 max-w-2xl mx-auto">
                <li class="bg-white shadow p-6 rounded-xl">
                    🏆 Juara 1 Olimpiade Sains Kabupaten 2024
                </li>
                <li class="bg-white shadow p-6 rounded-xl">
                    🥇 Juara Umum Lomba MTQ Antar Madrasah 2023
                </li>
                <li class="bg-white shadow p-6 rounded-xl">
                    🎨 Juara 2 Lomba Desain Poster Nasional 2022
                </li>
            </ul>
        </div>
    </section>

    <!-- Ekstrakurikuler -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Ekstrakurikuler</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <i class="fas fa-microphone text-3xl text-indigo-600 mb-3"></i>
                    <h3 class="font-semibold">Paduan Suara</h3>
                </div>
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <i class="fas fa-paint-brush text-3xl text-indigo-600 mb-3"></i>
                    <h3 class="font-semibold">Seni & Lukis</h3>
                </div>
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <i class="fas fa-quran text-3xl text-indigo-600 mb-3"></i>
                    <h3 class="font-semibold">Rohis & Tahfidz</h3>
                </div>
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <i class="fas fa-drum text-3xl text-indigo-600 mb-3"></i>
                    <h3 class="font-semibold">Marawis</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-6 text-center">
        <p>&copy; 2025 MA Al-Muhsinin. Semua Hak Dilindungi.</p>
    </footer>

</body>

</html>