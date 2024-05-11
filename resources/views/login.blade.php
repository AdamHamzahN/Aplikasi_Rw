<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4A90E2, #8E44AD);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {
            .card {
                width: 400px;
                margin: 0 auto;
                margin-top: 50px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Login Admin</h1>
                    </div>
                    <div class="card-body">
                        <div class="logo">
                            <img src="{{ asset('image/logo_rw.png') }}" alt="Logo" width="300">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Masukkan username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan password" required>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary btnLogin">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <script type="module">
        $('.btnLogin').on('click', function(a) {
            axios.post('login/check', {
                username: $('#username').val(),
                password: $('#password').val(),
                _token: "{{ csrf_token() }}",
            }).then(function(response) {
                //alert(username)
                if (response.data.success) {
                    window.location.href = response.data.redirect_url;
                } else {
                    swal.fire('Gagal Login ,Username / Password Salah', '', 'error');
                }
            }).catch(function(error) {
                if(error.response.status === 422) {
                    swal.fire(error.response.data.message,'', 'error');
                }else{
                    swal.fire('Gagal Login ,Username / Password salah');
                }
            })
        })
    </script>
</footer>

</html>
