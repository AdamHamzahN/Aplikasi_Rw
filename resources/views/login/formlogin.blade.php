<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
  @vite(['resources/css/app.css','resources/js/app.js'])
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
        <div class="col-md-8 ">
            <div class="card mx-auto"> 
                <div class="card-header text-center">
                    <h1>Login Admin</h1>
                </div>
                <div class="card-body">
                    <div class="logo">
                        <img src="{{ asset('image/logo_rw.png') }}" alt="Logo" width="190">
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
                        </div>
                        <br>
                        <div class="align-items-center">
                            <a href="/datawarga"><button type="submit" class="btn btn-primary btn-block center">Login</button></a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
