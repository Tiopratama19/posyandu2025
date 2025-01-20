<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jadwal Konseling</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            border-bottom: 2px solid #ddd;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
        }
        .content {
            margin: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .summary {
            margin-top: 30px;
            font-weight: bold;
            font-size: 16px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #555;
        }
        .footer p {
            margin: 0;
        }
        .no-participants {
            font-style: italic;
            color: #888;
            margin-top: 20px;
        }
    
        /* Perbaikan lebar kolom email */
        td, th {
            word-wrap: break-word;  /* Agar teks panjang seperti email tidak keluar dari kolom */
        }
    
        .email-column {
            width: 20%; /* Menetapkan lebar kolom email agar lebih pas */
            white-space: normal;  /* Menghindari teks email terpotong */
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Jadwal Konseling</h2>
        <p>Tanggal: {{ $tanggal }}</p>
    </div>

    <div class="content">
        <h3>Detail Jadwal</h3>
        <table>
            <tr>
                <th>Nama Kegiatan</th>
                <td>{{ $jadwal->NamaKegiatan }}</td>
            </tr>
            <tr>
                <th>Nama Pemateri</th>
                <td>{{ $jadwal->NamaBidan }}</td>
            </tr>
            <tr>
                <th>Tanggal Kegiatan</th>
                <td>{{ $tanggal }}</td>
            </tr>
            <tr>
                <th>Jumlah Peserta</th>
                <td>{{ $jumlah_peserta }}</td>
            </tr>
        </table>

        @if($jumlah_peserta > 0)
        <h3>Daftar Peserta</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    {{-- <th>Tempat, Tanggal Lahir</th> --}}
                    <th class="email-column">Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesertaKonselings as $index => $peserta)
                @php
                   $tanggalLahir = \Carbon\Carbon::parse($peserta->TanggalLahir);
                   $umur = $tanggalLahir->diffInYears(\Carbon\Carbon::now());
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->nik }}</td>                    
                    <td class="email-column">{{ $peserta->email }}</td>
                    {{-- <td>{{ $peserta->TempatLahir }}, {{ $peserta->TanggalLahir }}</td> --}}
                    <td>{{ $peserta->JenisKelamin }}</td>
                    <td>{{ $umur }} tahun</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="no-participants">Tidak ada peserta yang terdaftar untuk jadwal ini.</p>
        @endif

        <div class="summary">
            Total Peserta: {{ $jumlah_peserta }} orang
        </div>

        <div class="footer">
            <p>Dicetak pada: {{ $created_at }}</p>
            <p>&copy; {{ date('Y') }} Sistem Informasi Konseling</p>
        </div>
    </div>
</body>
</html>
