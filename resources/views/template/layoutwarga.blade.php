<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])

</head>


<body>
    <div class="container-main">
        <div class="row">
            <div class="header pt-2 bg-info bg-gradient">
                <img src="{{ asset('image/logo_rw.png') }}" alt="Logo" width="100">
                <h4>Aplikasi Rukun Warga Rw 009</h4>
            </div>
        </div>
        @yield('content')
    </div>
</body>

</html>
