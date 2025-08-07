<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT {{ ucfirst($kategori) }} - MA Al-Muhsinin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header dengan Timer -->
        <div class="bg-white shadow-sm border-b sticky top-0 z-10">
            <div class="max-w-6xl mx-auto px-6 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">CBT {{ ucfirst($kategori) }}</h1>
                        <p class="text-sm text-gray-600">{{ count($soal) }} soal • 30 menit</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-100 px-4 py-2 rounded-lg">
                            <div class="flex items-center text-red-700">
                                <i class="fas fa-clock mr-2"></i>
                                <span id="timer" class="font-mono font-bold">30:00</span>
                            </div>
                        </div>
                        <button onclick="submitTest()"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            <i class="fas fa-paper-plane mr-2"></i>Selesai
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto p-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Navigasi Soal -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm border p-4 sticky top-24">
                        <h3 class="font-semibold text-gray-900 mb-4">Navigasi Soal</h3>
                        <div class="grid grid-cols-5 gap-2">
                            @foreach($soal as $index => $s)
                                <button onclick="goToQuestion({{ $index }})" id="nav-{{ $index }}"
                                    class="nav-btn w-10 h-10 rounded-lg border-2 border-gray-300 text-sm font-medium hover:bg-blue-50 transition-colors">
                                    {{ $index + 1 }}
                                </button>
                            @endforeach
                        </div>
                        <div class="mt-4 text-xs text-gray-600">
                            <div class="flex items-center mb-2">
                                <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                                <span>Sudah dijawab</span>
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="w-4 h-4 bg-yellow-500 rounded mr-2"></div>
                                <span>Soal aktif</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 border-2 border-gray-300 rounded mr-2"></div>
                                <span>Belum dijawab</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Area Soal -->
                <div class="lg:col-span-3">
                    <form id="cbtForm" action="{{ route('calon-siswa.cbt.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kategori" value="{{ $kategori }}">

                        @foreach($soal as $index => $s)
                            <div class="question-container bg-white rounded-xl shadow-sm border p-6 mb-6 {{ $index == 0 ? '' : 'hidden' }}"
                                id="question-{{ $index }}">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm font-medium text-blue-600">Soal {{ $index + 1 }} dari
                                        {{ count($soal) }}</span>
                                    <div class="w-full bg-gray-200 rounded-full h-2 mx-4">
                                        <div class="bg-blue-600 h-2 rounded-full"
                                            style="width: {{ (($index + 1) / count($soal)) * 100 }}%"></div>
                                    </div>
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 mb-6">{{ $s->pertanyaan }}</h3>

                                <div class="space-y-3">
                                    <label
                                        class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer transition-colors">
                                        <input type="radio" name="jawaban[{{ $s->id }}]" value="A"
                                            class="w-4 h-4 text-blue-600" onchange="markAnswered({{ $index }})">
                                        <span class="ml-3 text-gray-700">A. {{ $s->pilihan_a }}</span>
                                    </label>

                                    <label
                                        class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer transition-colors">
                                        <input type="radio" name="jawaban[{{ $s->id }}]" value="B"
                                            class="w-4 h-4 text-blue-600" onchange="markAnswered({{ $index }})">
                                        <span class="ml-3 text-gray-700">B. {{ $s->pilihan_b }}</span>
                                    </label>

                                    <label
                                        class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer transition-colors">
                                        <input type="radio" name="jawaban[{{ $s->id }}]" value="C"
                                            class="w-4 h-4 text-blue-600" onchange="markAnswered({{ $index }})">
                                        <span class="ml-3 text-gray-700">C. {{ $s->pilihan_c }}</span>
                                    </label>

                                    <label
                                        class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer transition-colors">
                                        <input type="radio" name="jawaban[{{ $s->id }}]" value="D"
                                            class="w-4 h-4 text-blue-600" onchange="markAnswered({{ $index }})">
                                        <span class="ml-3 text-gray-700">D. {{ $s->pilihan_d }}</span>
                                    </label>
                                </div>

                                <div class="flex justify-between mt-8">
                                    <button type="button" onclick="previousQuestion()"
                                        class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 {{ $index == 0 ? 'invisible' : '' }}">
                                        <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                                    </button>

                                    @if($index == count($soal) - 1)
                                        <button type="button" onclick="submitTest()"
                                            class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                            <i class="fas fa-check mr-2"></i>Selesai Tes
                                        </button>
                                    @else
                                        <button type="button" onclick="nextQuestion()"
                                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                            Selanjutnya<i class="fas fa-chevron-right ml-2"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Submit -->
    <div id="submitModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md mx-4">
            <div class="text-center">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Selesaikan Tes?</h3>
                <p class="text-gray-600 mb-6">Pastikan semua jawaban sudah benar. Anda tidak dapat mengubah jawaban
                    setelah mengirim.</p>
                <div class="flex space-x-3">
                    <button onclick="closeSubmitModal()"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Batal
                    </button>
                    <button onclick="confirmSubmit()"
                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Ya, Selesai
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentQuestion = 0;
        let totalQuestions = {{ count($soal) }};
        let timeLeft = 30 * 60; // 30 menit dalam detik
        let timerInterval;

        // Inisialisasi
        document.addEventListener('DOMContentLoaded', function () {
            startTimer();
            updateNavigation();
        });

        // Timer
        function startTimer() {
            timerInterval = setInterval(function () {
                timeLeft--;
                updateTimerDisplay();

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    alert('Waktu habis! Tes akan otomatis diselesaikan.');
                    document.getElementById('cbtForm').submit();
                }
            }, 1000);
        }

        function updateTimerDisplay() {
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            document.getElementById('timer').textContent =
                String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
        }

        // Navigasi soal
        function goToQuestion(index) {
            document.getElementById('question-' + currentQuestion).classList.add('hidden');
            document.getElementById('question-' + index).classList.remove('hidden');
            currentQuestion = index;
            updateNavigation();
        }

        function nextQuestion() {
            if (currentQuestion < totalQuestions - 1) {
                goToQuestion(currentQuestion + 1);
            }
        }

        function previousQuestion() {
            if (currentQuestion > 0) {
                goToQuestion(currentQuestion - 1);
            }
        }

        function updateNavigation() {
            // Reset semua button
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('bg-blue-500', 'text-white', 'bg-yellow-500');
                btn.classList.add('border-gray-300');
            });

            // Tandai soal yang sudah dijawab
            document.querySelectorAll('input[type="radio"]:checked').forEach(input => {
                let questionIndex = Array.from(document.querySelectorAll('.question-container')).findIndex(container =>
                    container.contains(input)
                );
                if (questionIndex !== -1) {
                    let navBtn = document.getElementById('nav-' + questionIndex);
                    navBtn.classList.remove('border-gray-300');
                    navBtn.classList.add('bg-blue-500', 'text-white');
                }
            });

            // Tandai soal aktif
            let activeBtn = document.getElementById('nav-' + currentQuestion);
            if (!activeBtn.classList.contains('bg-blue-500')) {
                activeBtn.classList.remove('border-gray-300');
                activeBtn.classList.add('bg-yellow-500', 'text-white');
            }
        }

        function markAnswered(index) {
            setTimeout(updateNavigation, 100);
        }

        // Submit tes
        function submitTest() {
            document.getElementById('submitModal').classList.remove('hidden');
            document.getElementById('submitModal').classList.add('flex');
        }

        function closeSubmitModal() {
            document.getElementById('submitModal').classList.add('hidden');
            document.getElementById('submitModal').classList.remove('flex');
        }

        function confirmSubmit() {
            clearInterval(timerInterval);
            document.getElementById('cbtForm').submit();
        }

        // Prevent back button
        window.addEventListener('beforeunload', function (e) {
            e.preventDefault();
            e.returnValue = '';
        });
    </script>
</body>

</html>