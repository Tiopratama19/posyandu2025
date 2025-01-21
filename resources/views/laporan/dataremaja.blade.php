<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="utf-8" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 700px;
            margin: 0 auto;
            padding: 20px;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .subtitle {
            text-align: center;
            font-size: 16px;
        }

        .section-title {
            font-size: 18px;
            margin-top: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .no-border {
            border: none;
            padding: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="title">LAPORAN BULANAN POSYANDU REMAJA MENTARI</div>
        <div class="subtitle">
            Jl Cupu No.47b, RW.08, Rancamanyar, Kec. Baleendah<br>
            Kabupaten Bandung, Jawa Barat 40375
        </div>

        <div class="section-title">BULAN: {{ \Carbon\Carbon::parse($remaja->Tanggal)->translatedFormat('F') }}</div>
        <div class="section-title">TANGGAL: {{ \Carbon\Carbon::parse($remaja->Tanggal)->translatedFormat('d') }}</div>

        <div class="section-title">BIODATA REMAJA</div>
        <table>
            <tr>
                <td>Nama</td>
                <td>{{ $remaja->Nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{{ $remaja->nik }}</td>
            </tr>
            <tr>
                <td>Tgl. Lahir</td>
                <td>{{ $remaja->TanggalLahir }}</td>
            </tr>
        </table>

        <div class="section-title">KETERANGAN</div>
        <table>
            <tr>
                <td>BB</td>
                <td>{{ $remaja->BB }}</td>
            </tr>
            <tr>
                <td>TB</td>
                <td>{{ $remaja->TB }}</td>
            </tr>
            <tr>
                <td>Tensi</td>
                <td>{{ $remaja->TTD }}</td>
            </tr>
            <tr>
                <td>LILA</td>
                <td>{{ $remaja->LILA }}</td>
            </tr>
            <tr>
                <td>LP</td>
                <td>{{ $remaja->LP }}</td>
            </tr>
            <tr>
                <td>Keluhan</td>
                <td>{{ $remaja->Anemia }}</td>
            </tr>
        </table>
    </div>

</body>

</html>
