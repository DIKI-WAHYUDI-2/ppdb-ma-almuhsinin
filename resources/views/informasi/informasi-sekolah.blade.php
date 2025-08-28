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

                <!-- Perpustakaan -->
                <div class="bg-blue-50 p-6 rounded-2xl shadow text-center">
                    <img src="https://sman1baturraden.sch.id/wp-content/uploads/2023/08/Perpus-1-scaled-1.jpg"
                        alt="Perpustakaan Modern" class="w-full h-48 object-cover rounded-xl mb-4">
                    <h3 class="font-semibold text-xl mb-2">Perpustakaan Modern</h3>
                    <p>Ruang baca dengan koleksi buku lengkap dan suasana nyaman.</p>
                </div>

                <!-- Laboratorium -->
                <div class="bg-blue-50 p-6 rounded-2xl shadow text-center">
                    <img src="https://ponpesnurulhayah.com/wp-content/uploads/2022/03/WhatsApp-Image-2022-03-12-at-06.10.34-1.jpeg"
                        alt="Laboratorium Komputer" class="w-full h-48 object-cover rounded-xl mb-4">
                    <h3 class="font-semibold text-xl mb-2">Laboratorium Komputer</h3>
                    <p>Dilengkapi komputer modern untuk mendukung pembelajaran berbasis teknologi.</p>
                </div>

                <!-- Lapangan -->
                <div class="bg-blue-50 p-6 rounded-2xl shadow text-center">
                    <img src="https://asset-2.tribunnews.com/makassar/foto/bank/images/hari-santri_20171022_135828.jpg"
                        alt="Lapangan Olahraga" class="w-full h-48 object-cover rounded-xl mb-4">
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
                    🏅 Juara 2 Olimpiade Sains Tingkat Kecamatan Rimba Melintang 2023
                </li>
                <li class="bg-white shadow p-6 rounded-xl">
                    🕌 Juara 1 MTQ (Musabaqah Tilawatil Qur’an) Tingkat Kecamatan 2024
                </li>
                <li class="bg-white shadow p-6 rounded-xl">
                    📖 Harapan 2 Lomba Tahfidz Juz 30 Tingkat Kabupaten Rokan Hilir 2023
                </li>
                <li class="bg-white shadow p-6 rounded-xl">
                    🎤 Juara 3 Lomba Pidato Bahasa Arab Tingkat Kabupaten 2022
                </li>
                <li class="bg-white shadow p-6 rounded-xl">
                    ⚽ Juara 2 Futsal Antar Madrasah se-Kecamatan Rimba Melintang 2023
                </li>
            </ul>
        </div>
    </section>

    <!-- Ekstrakurikuler -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Ekstrakurikuler</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">

                <!-- Tahfidzul Qur’an -->
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <img src="https://pesantrenterbaikindonesia.home.blog/wp-content/uploads/2019/02/hafalanoke.jpg?w=448"
                        alt="Tahfidzul Qur’an" class="w-full h-40 object-cover rounded-xl mb-3">
                    <h3 class="font-semibold">Tahfidzul Qur’an</h3>
                </div>

                <!-- Qiro’ah -->
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <img src="https://lh4.googleusercontent.com/proxy/jTDbIYX77VIU0Or7bjRU3QED6DAGq4QoyRgJSGqwvXixSLEyM5TVYF8VKEIghPrZ5NXxMvRl_cfqTaLDMcVyzWldke0xgx7hnVYkTQ4hJv659X6XopyBrbAoo3Pp8Ys7PFaiaL8P"
                        alt="Qiro’ah / Tilawah" class="w-full h-40 object-cover rounded-xl mb-3">
                    <h3 class="font-semibold">Qiro’ah / Tilawah</h3>
                </div>

                <!-- Kitab Kuning -->
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <img src="https://static.republika.co.id/uploads/images/xlarge/029368800-1658589446-1280-856.jpg"
                        alt="Kajian Kitab Kuning" class="w-full h-40 object-cover rounded-xl mb-3">
                    <h3 class="font-semibold">Kajian Kitab Kuning</h3>
                </div>

                <!-- Hadrah / Marawis -->
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <img src="https://www.darussalam-tasik.or.id/blogimages/img_2310_1568355624.jpg"
                        alt="Hadrah / Marawis" class="w-full h-40 object-cover rounded-xl mb-3">
                    <h3 class="font-semibold">Pencak Silat</h3>
                </div>

                <!-- Hadrah / Marawis -->
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <img src="https://darunnajah.com/wp-content/uploads/2017/10/WhatsApp-Image-2017-10-21-at-14.02.28.jpeg"
                        alt="Hadrah / Marawis" class="w-full h-40 object-cover rounded-xl mb-3">
                    <h3 class="font-semibold">Paskibra</h3>
                </div>

                <!-- Hadrah / Marawis -->
                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <img src="https://darulistiqamah.ponpes.id/wp-content/uploads/2022/12/WhatsApp-Image-2022-12-21-at-09.45.57-1-1-1024x768.jpeg"
                        alt="Hadrah / Marawis" class="w-full h-40 object-cover rounded-xl mb-3">
                    <h3 class="font-semibold">Futsal</h3>
                </div>

                <div class="p-6 bg-indigo-50 rounded-2xl shadow">
                    <img src="https://alamanah.or.id/wp-content/uploads/2023/08/photo_2023-08-19_21-52-15.jpg"
                        alt="Hadrah / Marawis" class="w-full h-40 object-cover rounded-xl mb-3">
                    <h3 class="font-semibold">Panahan</h3>
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