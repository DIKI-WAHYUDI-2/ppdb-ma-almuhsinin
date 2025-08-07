<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi OTP - MA Al-Muhsinin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            padding: 20px;
            color: #334155;
        }

        .container {
            max-width: 560px;
            margin: auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .header {
            background-color: #2563eb;
            color: white;
            text-align: center;
            padding: 32px 24px;
        }

        .header h1 {
            font-size: 22px;
            margin-bottom: 4px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .content {
            padding: 32px 24px;
        }

        .title {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 12px;
        }

        .message {
            font-size: 15px;
            text-align: center;
            color: #64748b;
            margin-bottom: 24px;
        }

        .otp-box {
            background-color: #f0f9ff;
            border: 2px dashed #2563eb;
            color: #2563eb;
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            padding: 20px;
            border-radius: 12px;
            letter-spacing: 8px;
            margin-bottom: 24px;
        }

        .info {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .info p {
            margin: 6px 0;
            font-size: 14px;
            color: #475569;
        }

        .alert {
            display: flex;
            align-items: flex-start;
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 16px;
            border-radius: 8px;
            font-size: 14px;
            color: #92400e;
        }

        .alert-icon {
            font-weight: bold;
            margin-right: 10px;
        }

        .footer {
            background: #1e293b;
            color: #94a3b8;
            text-align: center;
            padding: 24px 20px;
            font-size: 13px;
        }

        .footer h4 {
            color: white;
            margin-bottom: 8px;
        }

        .footer p {
            margin: 4px 0;
        }

        @media (max-width: 600px) {
            .otp-box {
                font-size: 28px;
                letter-spacing: 6px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>MA Al-Muhsinin</h1>
            <p>PPDB Online</p>
        </div>

        <div class="content">
            <div class="title">Kode Verifikasi OTP</div>
            <div class="message">
                Silakan gunakan kode berikut untuk melanjutkan proses pendaftaran Anda.
            </div>

            <div class="otp-box">{{ $otp }}</div>

            <div class="info">
                <p>• Kode hanya berlaku selama <strong>5 menit</strong></p>
                <p>• Masukkan kode di halaman verifikasi</p>
                <p>• Jangan bagikan kode kepada siapa pun</p>
            </div>

            <div class="alert">
                <div class="alert-icon">⚠️</div>
                <div>
                    Tim MA Al-Muhsinin <strong>tidak akan pernah meminta</strong> kode OTP melalui telepon, SMS, atau
                    WhatsApp.
                </div>
            </div>
        </div>

        <div class="footer">
            <h4>MA Al-Muhsinin</h4>
            <p>Jl. Pendidikan No. 123, Kota Pendidikan</p>
            <p>Telp: (021) 1234-5678 | Email: info@ma-almuhsinin.sch.id</p>
            <br />
            <p>&copy; {{ date('Y') }} MA Al-Muhsinin. Semua hak dilindungi.</p>
            <p><em>Email ini dikirim otomatis, mohon tidak dibalas.</em></p>
        </div>
    </div>
</body>

</html>