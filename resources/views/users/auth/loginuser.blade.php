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
        <h2 class="text-center">Login</h2>
        <form id="form-login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" pattern="\d{16}" maxlength="16"
                    onkeypress="return hanyaAngka(event)" id="nik" name="nik" placeholder="Masukkan NIK Anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukkan password Anda" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" id="button_login">Login</button>
            </div>
        </form>
    </div>

    <script src="{{ url('/') }}/fe/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('alert/js/sweetalert.js') }}"></script>
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function harusHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
                return false;
            return true;
        }

        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            $('#form-login').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('user.login') }}',
                    type: 'post',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {
                        $('#button_login').html("Memproses....");
                        $('#button_login').attr('disabled', true);
                    },
                    success: function (response) {
                        $('#button_login').removeAttr('disabled');
                        $('#button_login').html("Login");
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Berhasil Login!',
                            });
                            window.location.href ='/'; // Redirect to the dashboard or desired page
                        } else if (response.status === 'error') {
                            Toast.fire({
                                icon: 'warning',
                                title: 'Nik Atau Password Salah !'
                            })
                        }
                    },
                    error: function (response) {
                        var errors = response.responseJSON.errors;
                        Toast.fire({
                            icon: 'error',
                            title: errors.login ? errors.login[0] : 'Login failed.'
                        })
                        $('#button_login').removeAttr('disabled');
                        $('#button_login').html("Login");
                    }
                });
            });
        });

    </script>
</body>

</html>
