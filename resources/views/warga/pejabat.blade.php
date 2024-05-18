@extends('template.layoutwarga')
@section('content')
    <div class="container"></div>
    <div class="content-header text-center">
        <h1 class="text-bold">Daftar Pengurus Rw 09</h1>
        <h2>Kota baru Bekasi Barat</h2>
    </div>
    <br>
    <div class="row">
        <div class="row">
            @foreach ($pejabats as $pejabat)
                <div class="col-sm-6 col-md-4 col-lg-2 m-2">
                    <div class="col card h-100 m-10">
                        <div class="card-header text-center h-100 ">
                            <h4>{{ $pejabat->nama_jabatan }}</h4>
                        </div>
                        <div class="card-item h-100 text-center">
                            @if ($pejabat->nik !== null)
                                @foreach ($datawargas->where('nik', $pejabat->nik) as $datapejabat)
                                    <h5>Nama : </h5>
                                    <h5>{{ $datapejabat->nama }}</h5>
                                    <h5>Kontak :</h5>
                                    <h6><a href='http://wa.me/62{{ $datapejabat->kontak }}'>
                                            0{{ $datapejabat->kontak }}</a>
                                    </h6>

                                    @php break; @endphp <!-- Break out of the inner loop once a match is found -->
                                @endforeach
                            @else
                                <h5>Nama :</h5>
                                <h5>Kosong</h5>
                                <h5>Kontak :</h5>
                                <h5>Kosong</h5>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
