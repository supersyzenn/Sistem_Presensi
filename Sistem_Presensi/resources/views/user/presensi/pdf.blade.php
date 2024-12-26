<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Presensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-item {
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        .signature {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN PRESENSI SISWA</h2>
        <p>{{ $presensi->jadwal->tahunAjaran->tahun_ajar }}</p>
    </div>

    <div class="info-section">
        <div class="info-item">
            <strong>Mata Pelajaran:</strong> {{ $presensi->jadwal->mapel->nama_mapel }}
        </div>
        <div class="info-item">
            <strong>Kelas:</strong> {{ $presensi->jadwal->kelas->nama_kelas }}
        </div>
        <div class="info-item">
            <strong>Guru:</strong> {{ $presensi->jadwal->guru->user->name }}
        </div>
        <div class="info-item">
            <strong>Tanggal:</strong> {{ $presensi->tanggal->format('d F Y') }}
        </div>
        <div class="info-item">
            <strong>Pertemuan Ke:</strong> {{ $presensi->pertemuan }}
        </div>
        <div class="info-item">
            <strong>Materi:</strong> {{ $presensi->materi }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presensi->presensiDetails as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->siswa->nama_siswa }}</td>
                    <td>{{ $detail->siswa->nis }}</td>
                    <td>{{ ucfirst($detail->status) }}</td>
                    <td>{{ $detail->keterangan ?: '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d F Y H:i') }}</p>
        <div class="signature">
            <p>Guru Mata Pelajaran</p>
            <br><br><br>
            <p>{{ $presensi->jadwal->guru->user->name }}</p>
        </div>
    </div>
</body>
</html>
