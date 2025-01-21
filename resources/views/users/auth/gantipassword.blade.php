<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('alert/css/sweetalert2.css') }} " rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #2ac0c0, #a3a1ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: #fff;
            color: #333;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #2ac0c0;
        }

        .form-control:focus {
            border-color: #2ac0c0;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }

        .btn-primary {
            background: #6c63ff;
            border: none;
        }

        .btn-primary:hover {
            background: #2ac0c0;
        }

        .login-footer {
            margin-top: 1rem;
            text-align: center;
        }

        .login-footer a {
            color: #6c63ff;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">Ganti Password</h2>
        <form id="change-password-form">
            <div class="mb-3">
                <label for="oldPassword" class="form-label">Password Lama</label>
                <input type="password" name="oldPassword" id="oldPassword" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Password Baru</label>
                <input type="password" name="newPassword" id="newPassword" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confirmNewPassword" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" name="confirmNewPassword" id="confirmNewPassword" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ganti Password</button>
            </div>
        </form>
    </div>

    <script src="{{ url('/') }}/fe/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('alert/js/sweetalert.js') }}"></script>

    <script>
        document.getElementById('change-password-form').addEventListener('submit', function(event) {
            event.preventDefault();

            var oldPassword = document.getElementById('oldPassword').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmNewPassword = document.getElementById('confirmNewPassword').value;

            if (newPassword !== confirmNewPassword) {
                alert('Password baru dan konfirmasi password tidak cocok.');
                return;
            }

            fetch('/change-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        oldPassword: oldPassword,
                        newPassword: newPassword,
                        newPassword_confirmation: confirmNewPassword // Untuk validasi 'confirmed'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Password berhasil diubah.',
                            confirmButtonText: 'OK'
                        });
                        window.location.href = '/';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Gagal mengubah password: ' + data.message,
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan',
                        text: 'Terjadi kesalahan: ' + error,
                        confirmButtonText: 'OK'
                    });
                });

        });
    </script>
</body>

</html>
