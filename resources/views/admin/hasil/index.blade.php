<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Laporan Hasil Ranking</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .print-button {
            display: inline-block;
            background-color: #dc2626;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .print-button:hover {
            background-color: #b91c1c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px 10px;
            text-align: center;
        }

        th {
            background-color: #f3f4f6;
            font-weight: 600;
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
            .print-button {
                display: none !important;
            }

            body {
                margin: 0;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <h2>LAPORAN HASIL RANKING AHP</h2>

    <a href="{{ route('admin.hasil.cetak') }}" class="print-button">
        🖨️ Cetak PDF
    </a>

    <table>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Nama Siswa</th>
                <th>Skor Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilFix as $row)
                <tr>
                    <td>{{ $row->ranking }}</td>
                    <td style="text-align: left;">{{ $row->siswa->nama }}</td>
                    <td>{{ number_format($row->skor_akhir, 4) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd">
        <p>Mengetahui,<br><strong>Kepala Sekolah</strong></p>
    </div>

</body>
</html>
