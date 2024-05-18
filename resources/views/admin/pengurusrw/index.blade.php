@extends('template.layout')
@section('content')
    <div class="content-header text-center">
        <h1 class="text-bold">Daftar Pengurus Rw 09</h1>
        <h2>Kota baru Bekasi Barat</h2>
    </div>
    <br>
    <div class="row">
        <div class="row">
            @foreach ($pejabats as $pejabat)
                <div class="col-sm-6 col-md-4 col-lg-2 m-2">
                    <div class="card h-100 m-10">
                        <div class="card-header text-center">
                            <h4>{{ $pejabat->nama_jabatan }}</h4>
                        </div>
                        <div class="card-item h-100 text-center">
                            @if ($pejabat->nik !== null)
                                @foreach ($datawargas->where('nik', $pejabat->nik) as $datapejabat)
                                    <div class="foto my-3">
                                        <img src="{{ asset('storage/' . $datapejabat->foto) }}"
                                            alt="foto {{ $datapejabat->nama }} " width="150" height="200" />
                                    </div>

                                    <h5>Nama : </h5>
                                    <h5>{{ $datapejabat->nama }}</h5>
                                    <h5>Kontak :</h5>
                                    <h5><a href='http://wa.me/62{{ $datapejabat->kontak }}'> 0{{ $datapejabat->kontak }}</a>
                                    </h5>

                                    @php break; @endphp <!-- Break out of the inner loop once a match is found -->
                                @endforeach
                            @else
                                <div class="foto my-3">
                                    <img src="{{ asset('storage/default_profile_picture.png')  }}"
                                        alt="foto pejabat " width="150" height="200" />
                                </div>
                                <h5>Nama :</h5>
                                <h5>Kosong</h5>
                                <h5>Kontak :</h5>
                                <h5>Kosong</h5>
                            @endif
                        </div>
                        <div class="card-footer text-center"> <a href="/admin/pengurusrw/edit/{{ $pejabat->id_pejabat }}">
                                <button class="btn btn-primary btnEdit">Edit</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
@endsection
