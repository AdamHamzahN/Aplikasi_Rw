@extends('template.layout')
@section('content')
    <div class="content-header text-center">
        <h1 class="text-bold">Daftar Pengurus Rw 09</h1>
        <h2>Kota baru Bekasi Barat</h2>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 mb-3">
            <a href="{{ url('admin/datawarga/tambah') }}">
                <button class="btn btn-success">Tambah Data</button>
            </a>
        </div>
        @foreach ($jabatans as $jabatan)
            <div class="row text-center">
                <h2>{{ $jabatan->nama_jabatan }}</h2>
                <hr>
                @foreach ($pejabats->where('id_jabatan', $jabatan->id_jabatan) as $pejabat)
                    <div class="col-sm profil_pejabar">
                        <h4>Nama: {{ $pejabat->nama }}</h4>
                        <h4>Jabatan: {{ $jabatan->nama_jabatan }}</h4>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
@endsection
