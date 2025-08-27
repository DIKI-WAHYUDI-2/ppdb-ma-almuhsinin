<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil CBT - MA Al-Muhsinin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen p-6">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm border p-8 text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-green-600 text-3xl"></i>
                </div>

                <h1 class="text-2xl font-bold text-gray-900 mb-2">Tes Selesai!</h1>
                <p class="text-gray-600 mb-8">Terima kasih telah mengikuti tes CBT</p>

                <div class="bg-blue-50 rounded-lg p-6 mb-8">
                    <div class="text-3xl font-bold text-blue-600 mb-2">{{ number_format($skor, 1) }}</div>
                    <div class="text-blue-800">Skor Anda</div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ $benar }}</div>
                        <div class="text-sm text-gray-600">Jawaban Benar</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ $total }}</div>
                        <div class="text-sm text-gray-600">Total Soal</div>
                    </div>
                </div>

                <a href="{{ route('calon-siswa.cbt') }}"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke CBT
                </a>
            </div>
        </div>
    </div>
</body>

</html>