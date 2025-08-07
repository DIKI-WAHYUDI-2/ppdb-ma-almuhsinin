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
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-white/30 backdrop-blur-3xl"></div>
        <div class="absolute inset-0"
            style="background-image: url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%239C92AC%22%20fill-opacity%3D%220.05%22%3E%3Ccircle%20cx%3D%2230%22%20cy%3D%2230%22%20r%3D%224%22%20/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>


        <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl w-full space-y-8">
                <div class="">
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
                                <p class="text-gray-600">Silakan masukkan password baru Anda</p>
                            </div>

                            @if (session('error'))
                                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('verify-otp.lupa-password') }}" class="space-y-6">
                                @csrf
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-envelope mr-2 text-gray-400"></i>Masukkan Email
                                    </label>
                                    <div class="relative">
                                        <input id="email" name="email" type="text" autocomplete="email" required
                                            class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 transition-all duration-200 pr-12"
                                            placeholder="Masukkan Email">
                                    </div>
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-lock mr-2 text-gray-400"></i>Masukkan Password Baru
                                    </label>
                                    <div class="relative">
                                        <input id="password" name="password_baru" type="password"
                                            autocomplete="current-password" required
                                            class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 transition-all duration-200 pr-12"
                                            placeholder="Masukkan Password Baru Anda">
                                        <button type="button" onclick="togglePassword('password','password-icon')"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i id="password-icon"
                                                class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200"></i>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label for="password-confirmation"
                                        class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-lock mr-2 text-gray-400"></i>Konfirmasi Password
                                    </label>
                                    <div class="relative">
                                        <input id="password-confirm" name="password_konfirmasi" type="password"
                                            autocomplete="current-password" required
                                            class="form-input appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 transition-all duration-200 pr-12"
                                            placeholder="Konfirmasi Password Baru Anda">
                                        <button type="button"
                                            onclick="togglePassword('password-confirm','password-icon2')"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i id="password-icon2"
                                                class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200"></i>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit"
                                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            <i class="fas fa-sign-in-alt text-blue-300 group-hover:text-blue-200"></i>
                                        </span>
                                        Submit
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-sm text-gray-600">
                                        <a href="{{ route('login') }}"
                                            class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                                            Kembali Ke Login
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
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>