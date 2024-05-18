@extends('template.layoutwarga')
@section('content')
    <div class="row profile">
        <h4>Selamat Datang <span class="text-primary">{{ $data_warga->nama }}</span></h4>
        <h5> <span class="border border-warning rounded bg-warning">{{ $data_warga->nik }}</span></h5>
    </div>
    <hr>
    <div class="col-md-6">
        <div class="row">
            <div class="col card m-1">
                <a href="/warga/{{ $data_warga->nik }}/profil" style="text-decoration: none; color: black;">
                    <div class="card-body text-center">
                        <h4><i class="bi bi-person-fill"></i></h4>
                        <h4>Profil</h4>
                    </div>
                </a>
            </div>
            <div class="col card m-1">
                <a href="/warga/{{ $data_warga->nik }}/pejabat" style="text-decoration: none; color: black;">
                    <div class="card-body text-center">
                        <h4><i class="bi bi-person-badge-fill"></i></h4>
                        <h4>Pejabat RW</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <style>
        hr {
            border: 3px solid rgb(0, 115, 255);
            border-radius: 5px;
            margin: 0;
            padding: 0;
            width: 100%;
        }
    </style>
@endsection
