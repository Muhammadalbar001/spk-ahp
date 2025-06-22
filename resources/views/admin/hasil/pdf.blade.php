<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Hasil Ranking</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">LAPORAN HASIL RANKING AHP</h2>
    <p>Tanggal Cetak: {{ $tanggal }}</p>

    <table>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Nama Siswa</th>
                <th>Skor Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil as $row)
            <tr>
                <td>{{ $row->ranking }}</td>
                <td>{{ $row->siswa->nama }}</td>
                <td>{{ number_format($row->skor_akhir, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 40px;">Ttd,<br><br><br><strong>Kepala Sekolah</strong></p>
</body>
</html>
