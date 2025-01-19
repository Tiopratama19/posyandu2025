<!-- resources/views/admin/jadwalkonselingprint.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Jadwal Konseling</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .content {
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Jadwal Konseling</h2>
        <p>Tanggal: {{ $tanggal }}</p>
    </div>

    <div class="content">
        <table>
            <tr>
                <th>Nama Kegiatan</th>
                <td>{{ $jadwal->NamaKegiatan }}</td>
            </tr>
            <tr>
                <th>Nama Bidan</th>
                <td>{{ $jadwal->NamaBidan }}</td>
            </tr>
            <tr>
                <th>Tanggal Kegiatan</th>
                <td>{{ $tanggal }}</td>
            </tr>
        </table>

        @if($jadwal->pesertaKonselings->count() > 0)
        <h3>Daftar Peserta</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal->pesertaKonselings as $index => $peserta)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $peserta->nama }}</td>
                    <td>{{ $peserta->nik }}</td>
                    <td>{{ $peserta->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div style="margin-top: 50px;">
            <p>Dicetak pada: {{ $created_at }}</p>
        </div>
    </div>
</body>
</html>