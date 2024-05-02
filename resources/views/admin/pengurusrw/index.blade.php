@extends('template.layout')
@section('content')
    <div class="content-header text-center">
        <h1 class="text-bold">Daftar Pengurus Rw 09</h1>
        <h2>Kota baru Bekasi Barat</h2>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 mb-3">
            <a href="{{ url('admin/pengurusrw/tambah') }}">
                <button class="btn btn-success">Tambah Data</button>
            </a>
        </div>
        @foreach ($jabatans as $jabatan)
            <div class="row text-center justify-content-center">
                <h2 class="mb-4">{{ $jabatan->nama_jabatan }}</h2>
                <hr>
                @foreach ($pejabats->where('id_jabatan', $jabatan->id_jabatan) as $pejabat)
                    @foreach ($datawargas->where('nik', $pejabat->nik) as $datapejabat)
                        <div class="col-sm-4 profil_pejabat">

                            <h5>Nama: {{ $datapejabat->nama }}</h5>
                            <h5>Tanggal Lahir : {{ $datapejabat->tgl_lahir }}</h5>
                            <h5>Alamat : {{ $datapejabat->alamat }}</h5>
                            <h5>Kontak : {{ $datapejabat->kontak }}</h5>
                            <h5>Jabatan: {{ $jabatan->nama_jabatan }}
                                @if ($jabatan->nama_jabatan == 'ketua rt')
                                    {{ $datapejabat->rt }}
                            </h5>
                    @endif
                    <br>
                    <a href="{{ url('/pengurusrw/edit/' . $pejabat->id_pengurus_rw) }}">
                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
                    </a>
                    <a href="{{ url('/pengurusrw/hapus/' . $pejabat->id_pengurus_rw) }}">
                        <button class="btn btn-danger hpsBtn" attr-id="{{ $pejabat->id_pengurus_rw }}"><i
                                class="bi bi-trash"></i> Hapus</button>
                    </a>

            </div>
        @endforeach
        @endforeach
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
