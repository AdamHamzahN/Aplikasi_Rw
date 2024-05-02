<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>Data Warga</title>
</head>




<body id="body-pd">

    <header class="header" id="header">
        <div class="header_toggle"> <i class='bi bi-list-task' id="header-toggle"></i> </div>

    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="admin/dashboard/" class="nav_logo"> <i class='bi bi-buildings nav_logo-icon'></i>
                    <span class="nav_logo-name">RW 09</span> </a>
                <div class="nav_list">
                    <a href="/admin/dashboard/" class="nav_link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="bi bi-grid-fill"></i><span class="nav_name">Dashboard</span> </a>

                    <a href="/admin/datawarga/" class="nav_link {{ Request::is('admin/datawarga*') ? 'active' : '' }}">
                        <i class="bi bi-database"></i><span class="nav_name">Data Warga</span> </a>

                    <a href="/admin/pengurusrw/"
                        class="nav_link {{ Request::is('admin/pengurusrw*') ? 'active' : '' }}">
                        <i class='bi bi-person-circle'></i> <span class="nav_name">Daftar Pengurus Rw</span> </a>

                    <a href="/admin/jabatan/" class="nav_link {{ Request::is('admin/jabatan*') ? 'active' : '' }}">
                        <i class='bi bi-person-badge'></i> <span class="nav_name">Daftar Jabatan</span> </a>

                    <a href="/admin/logs/" class="nav_link {{ Request::is('admin/logs*') ? 'active' : '' }}">
                        <i class='bi bi-clock-history'></i> <span class="nav_name">Logs</span> </a>

                </div>
            </div>
            <a href="admin/login" class="nav_link"> <i class='bi bi-box-arrow-in-left nav_icon'></i>
                <span class="nav_name">Log out</span> </a>
        </nav>
    </div>
    <div class="container-main">
        @yield('content')
    </div>
</body>
<footer>
    @yield('footer')
</footer>
