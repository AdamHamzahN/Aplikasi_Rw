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
                                 {{ $datapejabat->rt }}</h5>
                            @endif
                            <br>
                            <a href="{{ url('/pengurusrw/edit/'.$pejabat->id_pengurus_rw) }}">
                                <button class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
                            </a>
                            <a href="{{ url('/pengurusrw/hapus/'.$pejabat->id_pengurus_rw) }}">
                                <button class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                            </a>
                            
                        </div>
                    @endforeach
                @endforeach
            </div>
        @endforeach
    </div>
@endsection

@section('footer')
$('.DataTable tbody').on('click', '.btnHapusBarang', function(eventHapus) {
    let idBarang = $(this).closest('.btnHapusBarang').attr('attr-id');
    Swal.fire({
        title: "Yakin Hapus data?",
        text: "Data Yang Sudah DiHapus Tidak Akan Bisa Kembali",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Setuju,Hapus Data"
    }).then((result) => {
        if (result.isConfirmed) {
            let hapusData = {
                'id_barang': idBarang,
                '_token': '{{ csrf_token() }}'
            };
            axios.post('{{ url('barang/hapus') }}', hapusData).then(resp => {
                if (resp.data.status == 'success') {
                    //tampilkan pop up berhasil;
                    Swal.fire({
                        title: "berhasil!",
                        text: resp.data.pesan,
                        icon: "success"
                    }).then(() => {
                        //close modal
                        modal.hide();
                        //reload tabel
                        table.ajax.reload();

                    });
                } else {
                    //tampilkan pop up gagal
                    Swal.fire({
                        title: "GAGAL",
                        text: resp.data.pesan,
                        icon: "error"
                    });
                }
            });
        } else {
            alert('data tidak boleh kosong');
        }
    })
    // Swal.fire({
    //     title: "Deleted!",
    //     text: "Your file has been deleted.",
    //     icon: "success"
    // });
});
@endsection