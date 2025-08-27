<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - PPDB MA Al-Muhsinin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="bg-blue-600 text-white p-4">
    </div>
    <header class="fixed top-0 left-0 w-full bg-blue-600 text-white shadow-md z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex items-center space-x-3">
                <i class="fas fa-graduation-cap text-2xl"></i>
                <span class="font-bold text-lg">MA Al-Muhsinin</span>
            </div>
            <nav class="hidden md:flex space-x-6">
                <a href="{{ (route('informasi.sekolah')) }}" class="hover:text-gray-200">Informasi Sekolah</a>
                <a href="{{ route('informasi.pendaftaran') }}" class="hover:text-gray-200">Informasi Pendaftaran</a>
                <a href="{{ route('informasi.grafik') }}" class="hover:text-gray-200">Grafik Jumlah Pendaftar</a>
            </nav>
        </div>
    </header>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-white/30 backdrop-blur-3xl"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width=60 height=60"
            viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" fill-rule="evenodd">
                <g fill="%239C92AC" fill-opacity="0.05">
                    <circle cx="30" cy="30" r="4" />
                </g>
            </g></svg>
        </div>

        <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl w-full space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                    <!-- Left Side - School Info & Illustration -->
                    <div class="hidden lg:block">
                        <div class="text-center mb-8">
                            <div
                                class="mx-auto h-32 w-32 school-gradient rounded-full flex items-center justify-center mb-6 shadow-2xl transform hover:scale-105 transition-transform duration-300">
                                <i class="fas fa-graduation-cap text-white text-5xl"></i>
                            </div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">MA Al-Muhsinin</h1>
                            <p class="text-xl text-gray-600 mb-6">Sistem Penerimaan Peserta Didik Baru</p>
                            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full">
                            </div>
                        </div>

                        <!-- School Features -->
                        <div class="space-y-4">
                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-book text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Pendidikan Berkualitas</h3>
                                    <p class="text-gray-600 text-sm">Kurikulum terdepan dengan fasilitas modern</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-users text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Tenaga Pengajar Profesional</h3>
                                    <p class="text-gray-600 text-sm">Guru berpengalaman dan berdedikasi tinggi</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-trophy text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Prestasi Gemilang</h3>
                                    <p class="text-gray-600 text-sm">Berbagai penghargaan akademik dan non-akademik</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Login Form -->
                    <div class="w-full max-w-md mx-auto">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-white/20">
                            <!-- Mobile Header -->
                            <div class="lg:hidden text-center mb-8">
                                <div
                                    class="mx-auto h-20 w-20 school-gradient rounded-full flex items-center justify-center mb-4 shadow-xl">
                                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">MA Al-Muhsinin</h2>
                                <p class="text-gray-600">PPDB Online</p>
                            </div>

                            <div class="text-center mb-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang</h2>
                                <p class="text-gray-600">Silakan masuk ke akun Anda</p>
                            </div>

                            @if (session('error'))
                                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                                @csrf

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-envelope mr-2 text-gray-400"></i>Email
                                    </label>
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 transition-all duration-200"
                                        placeholder="Masukkan email Anda" value="{{ old('email') }}">
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-lock mr-2 text-gray-400"></i>Password
                                    </label>
                                    <div class="relative">
                                        <input id="password" name="password" type="password"
                                            autocomplete="current-password" required
                                            class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 transition-all duration-200 pr-12"
                                            placeholder="Masukkan password Anda">
                                        <button type="button" onclick="togglePassword()" aria-label="Tampilkan password"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i id="password-icon"
                                                class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">


                                    </div>

                                    <div class="text-sm">
                                        <a href="{{ route('lupa-password') }}"
                                            class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                                            Lupa password?
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit"
                                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            <i class="fas fa-sign-in-alt text-blue-300 group-hover:text-blue-200"></i>
                                        </span>
                                        Masuk
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-sm text-gray-600">
                                        Belum punya akun?
                                        <a href="{{ route('register') }}"
                                            class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                                            Daftar sekarang
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>

                        <!-- Footer Info -->
                        <div class="mt-8 text-center">
                            <p class="text-sm text-gray-500">
                                © 2025 MA Al-Muhsinin. Semua hak dilindungi.
                            </p>
                            <div class="mt-2 flex justify-center space-x-4">
                                <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                    <i class="fab fa-facebook text-lg"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                    <i class="fab fa-instagram text-lg"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                    <i class="fab fa-youtube text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>