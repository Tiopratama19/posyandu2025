<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Bergabung!</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f7f4ef;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-wrapper {
            max-width: 700px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            border: 1px solid #e2dede;
        }

        .email-header {
            background-image: linear-gradient(120deg, #84fab0, #8fd3f4);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }

        .email-header h1 {
            font-size: 32px;
            margin: 0;
            font-weight: bold;
        }

        .email-header p {
            font-size: 18px;
            margin: 10px 0 0;
        }

        .email-body {
            padding: 30px 20px;
            font-size: 16px;
            line-height: 1.8;
            text-align: justify;
        }

        .email-body p {
            margin: 15px 0;
        }

        .email-body strong {
            color: #4caf50;
        }

        .btn {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background-color: #43a047;
        }

        .email-footer {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .email-footer a {
            color: #4caf50;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .email-wrapper {
                padding: 10px;
            }

            .email-header h1 {
                font-size: 24px;
            }

            .email-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <h1>Selamat Bergabung!</h1>
            <p>Kami senang menyambut Anda di komunitas kami.</p>
        </div>
        <div class="email-body">
            <p>Halo,</p>
            <p>Terima kasih telah bergabung dengan platform kami! Kami sangat senang Anda ada di sini. Berikut adalah password sementara Anda:</p>
            <p style="text-align: center; font-size: 20px; font-weight: bold;">
                Password: <strong>{{ $password }}</strong>
            </p>
            <p>Gunakan password ini untuk login ke akun Anda. Demi keamanan, kami sangat menyarankan Anda segera mengubah password setelah login pertama kali.</p>
            <p>Jika Anda memiliki pertanyaan atau butuh bantuan, jangan ragu untuk <a href="mailto:support@example.com">menghubungi kami</a>.</p>
            <div style="text-align: center;">
                <a href="{{ route('loginUser') }}" class="btn">Masuk Sekarang</a>
            </div>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Platform Kami. Semua hak dilindungi.</p>
            <p>
                <a href="#">Kebijakan Privasi</a> | <a href="#">Ketentuan Layanan</a>
            </p>
        </div>
    </div>
</body>
</html>