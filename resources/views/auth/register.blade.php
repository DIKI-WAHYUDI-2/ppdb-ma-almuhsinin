<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar Akun - PPDB MA Al-Muhsinin</title>

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
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-white/30 backdrop-blur-3xl"></div>
        <div class="absolute inset-0"
            style="background-image: url('data:image/svg+xml,<svg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;><g fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;><g fill=&quot;%2334D399&quot; fill-opacity=&quot;0.05&quot;><circle cx=&quot;30&quot; cy=&quot;30&quot; r=&quot;4&quot;/></g></g></svg>');">
        </div>

        <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl w-full space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                    <!-- Left Side - School Info & Illustration -->
                    <div class="hidden lg:block">
                        <div class="text-center mb-8">
                            <div
                                class="mx-auto h-32 w-32 bg-gradient-to-br from-emerald-600 to-teal-700 rounded-full flex items-center justify-center mb-6 shadow-2xl transform hover:scale-105 transition-transform duration-300">
                                <i class="fas fa-user-plus text-white text-5xl"></i>
                            </div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Bergabung dengan Kami</h1>
                            <p class="text-xl text-gray-600 mb-6">Daftar untuk mengakses PPDB MA Al-Muhsinin</p>
                            <div class="w-24 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 mx-auto rounded-full">
                            </div>
                        </div>

                        <!-- Registration Benefits -->
                        <div class="space-y-4">
                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-file-alt text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Pendaftaran Online</h3>
                                    <p class="text-gray-600 text-sm">Daftar kapan saja, dimana saja dengan mudah</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-teal-400 to-teal-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-clock text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Proses Cepat</h3>
                                    <p class="text-gray-600 text-sm">Verifikasi dan konfirmasi dalam waktu singkat</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-cyan-400 to-cyan-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-shield-alt text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Data Aman</h3>
                                    <p class="text-gray-600 text-sm">Informasi pribadi terlindungi dengan baik</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Register Form -->
                    <div class="w-full max-w-md mx-auto">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-white/20">
                            <!-- Mobile Header -->
                            <div class="lg:hidden text-center mb-8">
                                <div
                                    class="mx-auto h-20 w-20 bg-gradient-to-br from-emerald-600 to-teal-700 rounded-full flex items-center justify-center mb-4 shadow-xl">
                                    <i class="fas fa-user-plus text-white text-2xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">MA Al-Muhsinin</h2>
                                <p class="text-gray-600">PPDB Online</p>
                            </div>

                            <div class="text-center mb-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Akun Baru</h2>
                                <p class="text-gray-600">Silakan isi data untuk membuat akun</p>
                            </div>

                            @if ($errors->any())
                                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                                        <span class="text-red-700 font-medium">Terjadi kesalahan:</span>
                                    </div>
                                    <ul class="mt-2 text-red-600 text-sm list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register.post') }}" class="space-y-6">
                                @csrf

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-envelope mr-2 text-gray-400"></i>Email
                                    </label>
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 transition-all duration-200"
                                        placeholder="Masukkan email Anda" value="{{ old('email') }}">
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-lock mr-2 text-gray-400"></i>Password
                                    </label>
                                    <div class="relative">
                                        <input id="password" name="password" type="password"
                                            autocomplete="new-password" required
                                            class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 transition-all duration-200 pr-12"
                                            placeholder="Masukkan password Anda">
                                        <button type="button" onclick="togglePassword('password', 'password-icon')"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i id="password-icon"
                                                class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200"></i>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label for="password_confirmation"
                                        class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-lock mr-2 text-gray-400"></i>Konfirmasi Password
                                    </label>
                                    <div class="relative">
                                        <input id="password_confirmation" name="password_confirmation" type="password"
                                            autocomplete="new-password" required
                                            class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 transition-all duration-200 pr-12"
                                            placeholder="Ulangi password Anda">
                                        <button type="button"
                                            onclick="togglePassword('password_confirmation', 'password-confirmation-icon')"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i id="password-confirmation-icon"
                                                class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <input id="terms" name="terms" type="checkbox" required
                                        class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                                        Saya setuju dengan
                                        <a href="#" class="text-emerald-600 hover:text-emerald-500 font-medium">
                                            syarat dan ketentuan
                                        </a>
                                    </label>
                                </div>

                                <div>
                                    <button type="submit"
                                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            <i class="fas fa-user-plus text-emerald-300 group-hover:text-emerald-200"></i>
                                        </span>
                                        Daftar Sekarang
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-sm text-gray-600">
                                        Sudah punya akun?
                                        <a href="{{ route('login') }}"
                                            class="font-medium text-emerald-600 hover:text-emerald-500 transition-colors duration-200">
                                            Masuk di sini
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>

                        <!-- Footer Info -->
                        <div class="mt-8 text-center">
                            <p class="text-sm text-gray-500">
                                © 2024 MA Al-Muhsinin. Semua hak dilindungi.
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
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);

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
