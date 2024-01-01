@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header text-center bg-info">
                    <h1 class="text-white">Detail Data Warga</h1>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>NIK:</strong> {{ $warga->nik }}</p>
                    <p class="card-text"><strong>Nama Lengkap:</strong> {{ $warga->nama }}</p>
                    <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $warga->jns_kelamin }}</p>
                    <p class="card-text"><strong>Tempat/Tanggal Lahir:</strong> {{ $warga->tempat_lahir }},{{ $warga->tgl_lahir }}</p>
                    <p class="card-text"><strong>Ayah Kandung:</strong> {{ $warga->ayah }}</p>
                    <p class="card-text"><strong>Ibu Kandung:</strong> {{ $warga->ibu }}</p>
                    <p class="card-text"><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $warga->alamat }}</p>
                    <p class="card-text"><strong>RT:</strong> {{ $warga->rt }}</p>
                    <p class="card-text"><strong>Kontak:</strong> {{ $warga->kontak }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ url('/datawarga') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
