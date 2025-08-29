<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT - MA Al-Muhsinin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen p-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Computer Based Test (CBT)</h1>
                <p class="text-gray-600">Ikuti tes online untuk melengkapi proses pendaftaran</p>
            </div>

            @error('error')
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                        <span class="text-red-800">{{ $message }}</span>
            @enderror

                    @if($hasil_cbt)
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                <span class="text-green-800">Tes sudah diselesaikan dengan skor:
                                    {{ $hasil_cbt->skor }}</span>
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-6">
                        <div class="bg-white rounded-xl shadow-sm border p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-brain text-blue-600"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900"></h3>
                                    <p class="text-sm text-gray-600">20 Soal • 30 menit</p>
                                </div>
                            </div>

                            <!-- Petunjuk Pengerjaan -->
                            <div
                                class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4 text-sm text-gray-700 leading-relaxed">
                                <h4 class="font-semibold text-gray-900 mb-2">Petunjuk Pengerjaan:</h4>
                                <ul class="list-decimal list-inside space-y-1">
                                    <li>Jumlah soal: <span class="font-medium">20</span>.</li>
                                    <li>Waktu pengerjaan: <span class="font-medium">30 menit</span>.</li>
                                    <li>Setiap soal memiliki bobot nilai yang sama.</li>
                                    <li>Soal terdiri dari beberapa kategori:
                                        <ul class="list-disc list-inside ml-6 mt-1">
                                            @foreach($soal as $k)
                                                <li>{{ $k->kategori }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>Pilih jawaban yang menurut Anda paling tepat.</li>
                                    <li>Gunakan tombol <span class="italic">Next</span> / <span
                                            class="italic">Previous</span>
                                        untuk berpindah soal.</li>
                                    <li>Pastikan menekan tombol <span class="font-medium">Selesai</span> sebelum waktu
                                        habis.
                                    </li>
                                    <li>Jika waktu habis, sistem otomatis menyimpan jawaban Anda.</li>
                                </ul>
                            </div>

                            @if ($sudah_cbt)
                                <span class="w-full bg-gray-400 text-white py-2 px-4 rounded-lg 
                                 inline-block text-center cursor-not-allowed opacity-50">
                                    Mulai Tes
                                </span>
                            @else
                                <a href="{{ route('calon-siswa.cbt.mulai') }}"
                                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors inline-block text-center">
                                    Mulai Tes
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="m-[300px] mt-8">
                    <a href="{{ route('calon-siswa.dashboard') }}"
                        class="font-medium text-gray-600 hover:text-gray-500 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-1"></i>Kembali ke Dashboard
                    </a>
                </div>
            </div>
</body>

</html>