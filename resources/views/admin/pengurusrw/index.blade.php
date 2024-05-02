@extends('template.layout')
@section('content')
    <div class="content-header text-center">
        <h1 class="text-bold">Daftar Pengurus Rw 09</h1>
        <h2>Kota baru Bekasi Barat</h2>
    </div>
    <br>
    <div class="row">
        <div class="row ">
            @foreach ($jabatans as $jabatan)
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="card h-100">
                        <div class="card-item text-center">
                            @php
                                $pejabatExists = false;
                            @endphp
                            @foreach ($pejabats as $pejabat)
                                @if ($pejabat->id_jabatan == $jabatan->id_jabatan)
                                    @php
                                        $pejabatExists = true;
                                    @endphp

                                    @foreach ($datawargas->where('nik', $pejabat->nik) as $datapejabat)
                                        <h6>Jabatan: </h6>
                                        <h6>{{ $jabatan->nama_jabatan }}</h6>
                                        <h6>Nama: </h6>
                                        <h6>{{ $datapejabat->nama }}</h6>
                                        <h6>Kontak: </h6>
                                        <h6> {{ $datapejabat->kontak }}</h6>
                                    @endforeach
                                @break
                            @endif
                        @endforeach

                        @if (!$pejabatExists)
                            <h6>Jabatan: </h6>
                            <h6>{{ $jabatan->nama_jabatan }}</h6>
                            <h6>Nama: </h6>
                            <h6>(kosong)</h6>
                            <h6>Kontak: </h6>
                            <h6>(kosong)</h6>
                        @endif
                    </div>
                    <!-- Tombol ditempatkan di bagian bawah card -->
                    <div class="card-button d-flex justify-content-center align-items-center">
                        <a href="{{ url('/pengurusrw/edit/' . $pejabat->id_pengurus_rw) }}" class="mx-2">
                            <button class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
                        </a>
                        <a href="{{ url('/pengurusrw/hapus/' . $pejabat->id_pengurus_rw) }}" class="mx-2">
                            <button class="btn btn-danger hpsBtn" attr-id="{{ $pejabat->id_pengurus_rw }}"><i
                                    class="bi bi-trash"></i> Hapus</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('footer')
    <script type="module">
        $('.profil_pejabat').on('click', '.hpsBtn', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            let nik = $(this).closest('.hpsBtn').attr('attr-id');
            //alert(nik);
            swal.fire({
                title: "Apakah ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'setuju',
                cancelButtonText: 'Batal',
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //jalankan ajax post untuk hapus
                    axios.post('pengurusrw/hapus', {
                        'nik': nik
                    }).then(function(response) {
                        if (response.status) {
                            // alert(response.data.pesan);
                            swal.fire({
                                title: "Hapus data",
                                text: response.data.pesan,
                                icon: "success"
                            }).then(() => {
                                window.location.reload();
                            })
                        } else {
                            alert(response.data.pesan);
                        }

                    }).catch(function(error) {

                    });
                } else {

                }
            })

        })
    </script>
@endsection
