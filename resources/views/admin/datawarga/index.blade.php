@extends('template.layout')
@section('content')
    <div class="row ">
        <div class="col-lg-12">
            <div class="col-lg-12 text-center mb-4 background-blue mt-10">
                <h1>Data Warga RW 09</h1>
                <h2>Kota baru Bekasi Barat</h2>
            </div>

            <div class="col-lg-12 mb-3">
                <a href="{{ url('admin/datawarga/tambah') }}">
                    <button class="btn btn-success">Tambah Data</button>
                </a>
            </div>

            <table class="table DataTable table-hovered table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            Aksi
                        </th>
                        <th>
                            NIK
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Jenis Kelamin
                        </th>
                        <th>
                            Tanggal Lahir
                        </th>
                        <th>
                            Alamat
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_warga as $warga)
                        <tr>
                            {{-- <td>
                                <a href="{{ url('/datawarga/detail/'.$warga->nik) }}">
                                    <button class="btn btn-info "><i class="bi bi-search"></i></i>Detail</button>
                                </a>
                                <a href="{{ url('/datawarga/edit/'.$warga->nik) }}">
                                    <button class="btn btn-primary"><i class="bi bi-pencil-square"></i>Edit</button>
                                </a>
                                <a href="{{ url('/datawarga/hapus' ) }}">
                                    <button class="btn btn-danger hpsBtn" attr-id="{{$warga->nik}}"><i class="bi bi-trash "></i>Hapus</button>
                                </a>
                                
                            </td> --}}
                            {{-- <td>{{ $warga->nik }}</td>
                            <td>{{ $warga->nama }}</td>
                            <td>{{ $warga->jns_kelamin }}</td>
                            <td>{{ $warga->tgl_lahir }}</td>
                            <td>{{ $warga->alamat }}</td>  --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @endsection --}}

    {{-- @section('footer') --}}


    <script type="module">
        var table = $('.DataTable').DataTable({
            responsive: true,
            processing: true,
            ServerSide: true,
            ajax: "{!! route('datawarga.data') !!}",
            columns: [{
                    // data: null,
                    render: function(data, type, row) {
                        return '<a href="/admin/datawarga/detail/' + row.nik +
                            '"><button class="btn btn-info"><i class="bi bi-search"></i>Detail</button></a>' +
                            '<a href="/admin/datawarga/edit/' + row.nik +
                            '"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i>Edit</button></a>' +
                            '<a href="/admin/datawarga/hapus/' + row.nik +
                            '"><button class="btn btn-danger hpsBtn" attr-id="' + row.nik +
                            '"><i class="bi bi-trash"></i>Hapus</button></a>';
                    }
                },
                {
                    data: 'nik',
                    name: 'nik',
                },
                {
                    data: 'nama',
                    name: 'nama',
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
                },
                {
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir',
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                },
            ]
        });
        $('.table tbody').on('click', '.hpsBtn', function(event) {
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
                    axios.post('datawarga/hapus', {
                        'nik': nik
                    }).then(function(response) {
                        if (response.status) {
                            // alert(response.data.pesan);
                            swal.fire({
                                title: "Hapus data",
                                text: response.data.pesan,
                                icon: "success"
                            }).then(() => {
                                table.ajax.reload();
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
