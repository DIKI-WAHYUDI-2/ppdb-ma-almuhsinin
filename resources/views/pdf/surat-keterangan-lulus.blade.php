<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 14px;
        }

        .kop {
            text-align: center;
            line-height: 1.4;
        }

        .logo {
            position: absolute;
            left: 50px;
            top: 20px;
            width: 80px;
        }

        .judul {
            font-size: 18px;
            font-weight: bold;
        }

        .garis {
            border-top: 2px solid black;
            margin: 5px 0;
        }

        .isi {
            margin-top: 30px;
            line-height: 1.6;
            text-align: justify;
        }

        .ttd {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>

<body>
    <table width="100%" style="border-collapse: collapse;">
        <tr>
            <td style="width: 80px; text-align: center;">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo-sekolah.jpg'))) }}"
                    style="width:70px; height:auto;">
            </td>
            <td style="text-align: center;">
                <div style="font-size: 18px; font-weight: bold;">MADRASAH ALIYAH AL-MUHSININ</div>
                <div>JL. Rimba Utama, Tlk. Pulau Hilir, Kec. Rimba Melintang, Kabupaten Rokan Hilir, Riau 28953</div>
                <div>Telp. 0813-7047-9255</div>
            </td>
        </tr>
    </table>
    <hr style="border: 1px solid black; margin-top: 5px; margin-bottom: 5px;">

    {{-- Judul Surat --}}
    <div style="text-align:center; margin-top:20px; font-weight:bold; text-decoration: underline;">
        SURAT KETERANGAN LULUS SELEKSI
    </div>
    <div style="text-align:center;">Nomor: {{ '421.3/' . rand(100, 999) . '/PPDB/' . date('Y') }}</div>

    {{-- Isi Surat --}}
    <div class="isi">
        Yang bertanda tangan di bawah ini, Kepala Madrasah Aliyah Al-Muhsinin, menerangkan bahwa:

        <table style="margin-top:15px;">
            <tr>
                <td style="width: 180px;">Nama</td>
                <td>:</td>
                <td>{{ $siswa->nama }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td>{{ $siswa->nisn }}</td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{ $siswa->asal_sekolah }}</td>
            </tr>
        </table>

        <p style="margin-top:15px;">
            Berdasarkan hasil seleksi Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran
            {{ date('Y') }}/{{ date('Y') + 1 }},
            yang bersangkutan dinyatakan <b>LULUS</b> dan <b>DITERIMA</b> sebagai peserta didik baru
            di Madrasah Aliyah Al-Muhsinin Contoh.
        </p>

        <p>
            Demikian surat keterangan ini dibuat untuk dapat digunakan sebagai bukti resmi kelulusan seleksi.
        </p>
    </div>

    {{-- Tanda Tangan --}}
    <div class="ttd">
        Rimba Melintang, {{ now()->translatedFormat('d F Y') }}<br>
        Kepala Sekolah<br><br><br>
        <b>Drs. Ahmad Kepala</b><br>
        NIP. 19650101 199003 1 001
    </div>
</body>

</html>