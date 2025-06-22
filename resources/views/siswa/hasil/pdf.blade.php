<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Bukti Hasil Seleksi</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, sans-serif;
        font-size: 14px;
        color: #333;
        margin: 40px;
    }

    .judul {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 30px;
        color: #1e3a8a;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 6px 8px;
        vertical-align: top;
    }

    .label {
        width: 150px;
        font-weight: 500;
        color: #374151;
    }

    .value {
        font-weight: 600;
        color: #111827;
    }

    .status {
        font-weight: bold;
    }

    .lolos {
        color: green;
    }

    .tidak {
        color: red;
    }

    .ttd {
        margin-top: 60px;
        text-align: right;
    }

    .ttd strong {
        display: inline-block;
        margin-top: 60px;
    }

    @media print {
        body {
            margin: 0;
            font-size: 12px;
        }
    }
    </style>
</head>

<body>
    <div class="judul">Bukti Hasil Seleksi Pertukaran Pelajar</div>

    <table>
        <tr>
            <td class="label">Nama</td>
            <td class="value">: {{ $siswa->nama }}</td>
        </tr>
        <tr>
            <td class="label">NISN</td>
            <td class="value">: {{ $siswa->nisn }}</td>
        </tr>
        <tr>
            <td class="label">Skor Akhir</td>
            <td class="value">: {{ number_format($hasil->skor_akhir, 4) }}</td>
        </tr>
        <tr>
            <td class="label">Ranking</td>
            <td class="value">: {{ $hasil->ranking }}</td>
        </tr>
        <tr>
            <td class="label">Status</td>
            <td class="value">
                :
                <span class="status {{ $hasil->ranking <= 2 ? 'lolos' : 'tidak' }}">
                    @if($hasil->ranking <= 2)  LOLOS @else  TIDAK LOLOS @endif </span>
            </td>
        </tr>
        <tr>
            <td class="label">Tanggal Cetak</td>
            <td class="value">: {{ $tanggal }}</td>
        </tr>
    </table>

    <div class="ttd">
        <p>Mengetahui,<br><strong>Kepala Sekolah</strong></p>
    </div>
</body>

</html>