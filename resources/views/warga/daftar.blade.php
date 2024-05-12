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
            background: linear-gradient(#40dff4, #4582f4);
            /* background-color: rgb(86, 173, 231); */
            /* background: rgb(44, 172, 246); */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: rgba(16, 243, 194, 0.3);
            /* Ubah warna latar belakang card */
            padding: 20px;
            border-radius: 10px;
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

            .swal2 {
                z-index: 9999;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="logo">
                    <img src="{{ asset('image/logo_bekasi.png') }}" alt="Logo" width="60" class="mr-5">
                    <img src="{{ asset('image/logo_jabar.png') }}" alt="Logo" width="60">
                </div>
                <div class="card">
                    <div class="text-center mb-4">
                        <h4>Masukkan Password Baru</h4>
                        <h4></h4>
                    </div>
                    {{-- <form method="post" name="formTambah" action="{{ url('/registrasi/simpan')}}"> --}}
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Masukkan Username" value= {{$nik}} readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan password" required>
                    </div>
                    @csrf
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btnSimpan">Simpan</button>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
</body>
<footer>
    <script type="module">
        $('.btnSimpan').on('click', function(a) {
            a.preventDefault()
            axios.post('/registrasi/simpan', {
                username: $('#username').val(),
                password: $('#password').val(),
                _token: "{{ csrf_token() }}",
            }).then(function(response) {
                //alert(nik)
                if (response.data.success) {
                    swal.fire({
                        title: "Aktivasi Berhasil",
                        icon: "success"
                    }).then(function(response) {
                        window.location.href = `/loginwarga`;
                    });
                } else {
                    swal.fire({
                        title: "Username Tidak DiTemukan",
                        text: "Mohon Registrasi Terlebih Dahulu ke Admin Rw 009",
                        icon: "error"
                    });
                }
            }).catch(function(error) {
                if (error.response.status === 422) {
                    swal.fire(error.response.data.message, '', 'error');
                } else {
                    swal.fire('Gagal Aktivasi');
                }
            });
        });
    </script>
</footer>

</html>
