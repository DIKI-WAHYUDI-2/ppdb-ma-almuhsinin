<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Total Pendaftar</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 80px 20px 20px;
            /* Memberi ruang untuk header fixed */
        }

        /* HEADER STYLES */
        .main-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #2563eb;
            /* bg-blue-600 */
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 15px 0;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            font-size: 24px;
        }

        .logo-text {
            font-weight: bold;
            font-size: 18px;
        }

        .nav-menu {
            display: flex;
            gap: 24px;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #e5e7eb;
            /* hover:text-gray-200 */
        }

        /* CONTAINER STYLES */
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(90deg, #4361ee 0%, #3a0ca3 100%);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .header p {
            opacity: 0.9;
            font-size: 16px;
        }

        .content {
            padding: 25px 30px;
        }

        .chart-container {
            position: relative;
            height: 350px;
            width: 100%;
            margin-bottom: 20px;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .stat-card {
            flex: 1;
            min-width: 150px;
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .stat-card h3 {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .stat-card p {
            font-size: 24px;
            font-weight: 700;
            color: #4361ee;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #6c757d;
            font-size: 14px;
            border-top: 1px solid #e9ecef;
        }

        /* RESPONSIVE STYLES */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .header h1 {
                font-size: 24px;
            }

            .chart-container {
                height: 300px;
            }

            .stat-card {
                min-width: 120px;
            }

            .stat-card p {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .nav-menu {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            body {
                padding: 100px 15px 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="main-header">
        <div class="header-container">
            <div class="logo-container">
                <i class="fas fa-graduation-cap logo-icon"></i>
                <span class="logo-text">MA Al-Muhsinin</span>
            </div>
            <nav class="nav-menu">
                <a href="{{ route('login') }}" class="nav-link">Beranda</a>
                <a href="{{ route('informasi.sekolah') }}" class="nav-link">Informasi Sekolah</a>
                <a href="{{ route('informasi.pendaftaran') }}" class="nav-link">Informasi Pendaftaran</a>
                <a href="{{ route('login') }}" class="nav-link">Grafik Jumlah Pendaftar</a>
            </nav>
        </div>
    </header>

    <!-- Konten Utama -->
    <div class="container">
        <div class="header">
            <h1>Grafik Total Pendaftar</h1>
            <p>Tahun <?php echo date('Y'); ?></p>
        </div>

        <div class="content">
            <div class="chart-container">
                <canvas id="pendaftarChart"></canvas>
            </div>

            <div class="stats">
                <div class="stat-card">
                    <h3>Total Pendaftar</h3>
                    <p id="totalPendaftar">0</p>
                </div>
                <div class="stat-card">
                    <h3>Rata-rata/Bulan</h3>
                    <p id="rataRata">0</p>
                </div>
                <div class="stat-card">
                    <h3>Bulan Tertinggi</h3>
                    <p id="bulanTertinggi">-</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Data diperbarui: <?php echo date('d F Y'); ?></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('pendaftarChart').getContext('2d');

            // Data dari PHP - akan diisi oleh Laravel
            // Untuk demo, menggunakan data contoh
            const dataFromPHP = [
                { bulan: 1, total: 85 },
                { bulan: 2, total: 112 },
                { bulan: 3, total: 96 },
                { bulan: 4, total: 128 },
                { bulan: 5, total: 143 },
                { bulan: 6, total: 156 },
                { bulan: 7, total: 178 },
                { bulan: 8, total: 198 },
                { bulan: 9, total: 165 },
                { bulan: 10, total: 142 },
                { bulan: 11, total: 120 },
                { bulan: 12, total: 95 }
            ];

            // Format data untuk chart
            const namaBulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const dataTotal = new Array(12).fill(0);

            // Isi data dari PHP
            dataFromPHP.forEach(item => {
                dataTotal[item.bulan - 1] = item.total;
            });

            // Hitung statistik
            const totalPendaftar = dataTotal.reduce((acc, curr) => acc + curr, 0);
            const rataRata = Math.round(totalPendaftar / 12);
            const maxPendaftar = Math.max(...dataTotal);
            const bulanTertinggi = namaBulan[dataTotal.indexOf(maxPendaftar)];

            // Update statistik di HTML
            document.getElementById('totalPendaftar').textContent = totalPendaftar.toLocaleString();
            document.getElementById('rataRata').textContent = rataRata.toLocaleString();
            document.getElementById('bulanTertinggi').textContent = bulanTertinggi;

            // Buat chart
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: namaBulan,
                    datasets: [{
                        label: 'Jumlah Pendaftar',
                        data: dataTotal,
                        borderColor: '#4361ee',
                        backgroundColor: 'rgba(67, 97, 238, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#4361ee',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            titleFont: {
                                size: 14
                            },
                            bodyFont: {
                                size: 14
                            },
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: function (context) {
                                    return `Jumlah: ${context.raw} pendaftar`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    size: 12
                                },
                                // Memastikan angka bulat pada sumbu Y
                                callback: function (value) {
                                    if (value % 1 === 0) {
                                        return value;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: 'Jumlah Pendaftar',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 12
                                }
                            },
                            title: {
                                display: true,
                                text: 'Bulan',
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
        });
    </script>
</body>

</html>