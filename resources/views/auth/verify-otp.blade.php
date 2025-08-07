<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Verifikasi OTP - PPDB MA Al-Muhsinin</title>

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
    <div class="min-h-screen bg-gradient-to-br from-purple-50 via-violet-50 to-indigo-50">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-white/30 backdrop-blur-3xl"></div>
        <div class="absolute inset-0"
            style="background-image: url('data:image/svg+xml,<svg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;><g fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;><g fill=&quot;%238B5CF6&quot; fill-opacity=&quot;0.05&quot;><circle cx=&quot;30&quot; cy=&quot;30&quot; r=&quot;4&quot;/></g></g></svg>');">
        </div>

        <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl w-full space-y-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                    <!-- Left Side - OTP Info & Illustration -->
                    <div class="hidden lg:block">
                        <div class="text-center mb-8">
                            <div
                                class="mx-auto h-32 w-32 bg-gradient-to-br from-purple-600 to-violet-700 rounded-full flex items-center justify-center mb-6 shadow-2xl transform hover:scale-105 transition-transform duration-300">
                                <i class="fas fa-shield-alt text-white text-5xl"></i>
                            </div>
                            <h1 class="text-4xl font-bold text-gray-900 mb-2">Verifikasi Keamanan</h1>
                            <p class="text-xl text-gray-600 mb-6">Masukkan kode OTP untuk melanjutkan</p>
                            <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-violet-500 mx-auto rounded-full">
                            </div>
                        </div>

                        <!-- OTP Info -->
                        <div class="space-y-4">
                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-envelope text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Kode Dikirim via Email</h3>
                                    <p class="text-gray-600 text-sm">Periksa inbox atau folder spam Anda</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-violet-400 to-violet-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-clock text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Berlaku 5 Menit</h3>
                                    <p class="text-gray-600 text-sm">Kode akan kedaluwarsa dalam 5 menit</p>
                                </div>
                            </div>

                            <div
                                class="flex items-center space-x-4 p-4 bg-white/70 rounded-xl backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div
                                    class="h-12 w-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-redo text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Kirim Ulang</h3>
                                    <p class="text-gray-600 text-sm">Tidak menerima kode? Kirim ulang</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - OTP Form -->
                    <div class="w-full max-w-md mx-auto">
                        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-white/20">
                            <!-- Mobile Header -->
                            <div class="lg:hidden text-center mb-8">
                                <div
                                    class="mx-auto h-20 w-20 bg-gradient-to-br from-purple-600 to-violet-700 rounded-full flex items-center justify-center mb-4 shadow-xl">
                                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900">MA Al-Muhsinin</h2>
                                <p class="text-gray-600">Verifikasi OTP</p>
                            </div>

                            <div class="text-center mb-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-2">Masukkan Kode OTP</h2>
                                <p class="text-gray-600 mb-4">Kami telah mengirim kode 6 digit ke</p>
                                <p class="text-purple-600 font-semibold">{{ session('email', 'email@example.com') }}</p>
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

                            @if (session('success'))
                                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                        <span class="text-green-700 font-medium">{{ session('success') }}</span>
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('verify-otp.post') }}" class="space-y-6">
                                @csrf

                                <!-- OTP Input Fields -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-4 text-center">
                                        <i class="fas fa-key mr-2 text-gray-400"></i>Kode Verifikasi
                                    </label>
                                    <div class="flex justify-center space-x-3">
                                        <input type="text" name="otp_1" id="otp_1" maxlength="1" 
                                               class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                               oninput="moveToNext(this, 'otp_2')" onkeydown="moveToPrev(event, this, null)">
                                        <input type="text" name="otp_2" id="otp_2" maxlength="1"
                                               class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                               oninput="moveToNext(this, 'otp_3')" onkeydown="moveToPrev(event, this, 'otp_1')">
                                        <input type="text" name="otp_3" id="otp_3" maxlength="1"
                                               class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                               oninput="moveToNext(this, 'otp_4')" onkeydown="moveToPrev(event, this, 'otp_2')">
                                        <input type="text" name="otp_4" id="otp_4" maxlength="1"
                                               class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                               oninput="moveToNext(this, 'otp_5')" onkeydown="moveToPrev(event, this, 'otp_3')">
                                        <input type="text" name="otp_5" id="otp_5" maxlength="1"
                                               class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                               oninput="moveToNext(this, 'otp_6')" onkeydown="moveToPrev(event, this, 'otp_4')">
                                        <input type="text" name="otp_6" id="otp_6" maxlength="1"
                                               class="w-12 h-12 text-center text-xl font-bold border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                               oninput="moveToNext(this, null)" onkeydown="moveToPrev(event, this, 'otp_5')">
                                    </div>
                                    <input type="hidden" name="otp" id="otp_combined">
                                </div>

                                <!-- Timer -->
                                <div class="text-center">
                                    <p class="text-sm text-gray-600 mb-2">Kode akan kedaluwarsa dalam</p>
                                    <div class="text-2xl font-bold text-purple-600" id="timer">05:00</div>
                                </div>

                                <div>
                                    <button type="submit" id="verify-btn"
                                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-purple-600 to-violet-600 hover:from-purple-700 hover:to-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            <i class="fas fa-check text-purple-300 group-hover:text-purple-200"></i>
                                        </span>
                                        Verifikasi
                                    </button>
                                </div>

                                <div class="text-center space-y-2">
                                    <p class="text-sm text-gray-600">Tidak menerima kode?</p>
                                    <button type="button" id="resend-btn" onclick="resendOTP()"
                                        class="font-medium text-purple-600 hover:text-purple-500 transition-colors duration-200 disabled:text-gray-400 disabled:cursor-not-allowed">
                                        Kirim Ulang (<span id="resend-timer">60</span>s)
                                    </button>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('login') }}"
                                        class="font-medium text-gray-600 hover:text-gray-500 transition-colors duration-200">
                                        <i class="fas fa-arrow-left mr-1"></i>Kembali ke Login
                                    </a>
                                </div>
                            </form>
                        </div>

                        <!-- Footer Info -->
                        <div class="mt-8 text-center">
                            <p class="text-sm text-gray-500">
                                © 2024 MA Al-Muhsinin. Semua hak dilindungi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // OTP Input Navigation
        function moveToNext(current, nextFieldId) {
            if (current.value.length >= current.maxLength) {
                if (nextFieldId) {
                    document.getElementById(nextFieldId).focus();
                }
                updateCombinedOTP();
            }
        }

        function moveToPrev(event, current, prevFieldId) {
            if (event.key === 'Backspace' && current.value.length === 0 && prevFieldId) {
                document.getElementById(prevFieldId).focus();
            }
            setTimeout(updateCombinedOTP, 10);
        }

        function updateCombinedOTP() {
            const otp = [];
            for (let i = 1; i <= 6; i++) {
                otp.push(document.getElementById(`otp_${i}`).value);
            }
            document.getElementById('otp_combined').value = otp.join('');
        }

        // Timer functionality
        let timeLeft = 300; // 5 minutes in seconds
        let resendTimeLeft = 60; // 1 minute for resend

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            document.getElementById('timer').textContent = 
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 0) {
                document.getElementById('timer').textContent = '00:00';
                document.getElementById('verify-btn').disabled = true;
                document.getElementById('verify-btn').classList.add('opacity-50', 'cursor-not-allowed');
                return;
            }
            timeLeft--;
        }

        function updateResendTimer() {
            document.getElementById('resend-timer').textContent = resendTimeLeft;
            if (resendTimeLeft <= 0) {
                document.getElementById('resend-btn').disabled = false;
                document.getElementById('resend-btn').textContent = 'Kirim Ulang';
                return;
            }
            resendTimeLeft--;
        }

        function resendOTP() {
            // Reset resend timer
            resendTimeLeft = 60;
            document.getElementById('resend-btn').disabled = true;
            
            // Here you would make an AJAX call to resend OTP
            // For now, just show a message
            alert('Kode OTP baru telah dikirim ke email Anda');
            
            // Reset main timer
            timeLeft = 300;
            document.getElementById('verify-btn').disabled = false;
            document.getElementById('verify-btn').classList.remove('opacity-50', 'cursor-not-allowed');
        }

        // Initialize timers
        document.getElementById('resend-btn').disabled = true;
        setInterval(updateTimer, 1000);
        setInterval(updateResendTimer, 1000);

        // Auto-focus first input
        document.getElementById('otp_1').focus();

        // Prevent form submission if OTP is incomplete
        document.querySelector('form').addEventListener('submit', function(e) {
            const otpValue = document.getElementById('otp_combined').value;
            if (otpValue.length !== 6) {
                e.preventDefault();
                alert('Silakan masukkan kode OTP 6 digit lengkap');
            }
        });
    </script>
</body>

</html>
