@extends('template.layout')
@section('content')
    <div class="row ">
        <div class="col-lg-12">
            <div class="col-lg-12 text-center mb-4 background-blue mt-10">
                <h1>Daftar Jabatan Pengurus Rw 09</h1>
                <h2>Kota baru Bekasi Barat</h2>
            </div>

            <div class="col-lg-12 mb-3">
                <a href="{{ url('/admin/jabatan/tambah') }}">
                    <button class="btn btn-success">Tambah Jabatan</button>
                </a>
            </div>

            <table class="table DataTable table-hovered table-bordered">
                <thead>
                    <tr>
                        <th>
                            Aksi
                        </th>
                        <th>
                            Nama Jabatan
                        </th>
                        <th>
                            Tanggal Di Buat
                        </th>
                        <th>
                            Tanggal Update
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar_jabatan as $jabatan)
                        <tr>
                            {{-- <td>
                                <a href="{{ url('/admin/jabatan/edit/' . $jabatan->id_jabatan) }}">
                                    <button class="btn btn-primary"><i class="bi bi-pencil-square"></i>Edit</button>
                                </a>
                                <button class="btn btn-danger hpsBtn" attr-id="{{ $jabatan->id_jabatan }}"><i
                                        class="bi bi-trash "></i>Hapus</button>
                            </td>
                            <td>{{ $jabatan->id_jabatan }}</td>
                            <td>{{ $jabatan->nama_jabatan }}</td>
                            <td>{{ $jabatan->created_at }}</td>
                            <td>{{ $jabatan->updated_at }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        var table = $('.DataTable').DataTable({
            responsive: true,
            processing: true,
            ServerSide: true,
            ajax: "{!! route('jabatan.data') !!}",
            columns: [{
                    // data: null,
                    render: function(data, type, row) {
                        return '<a href="/admin/jabatan/edit/' + row.id_pejabat +
                            '"><button class="btn btn-primary"><i class="bi bi-pencil-square"></i>Edit</button></a>' +
                            '<a href="/admin/jabatan/hapus/' + row.id_pejabat +
                            '"><button class="btn btn-danger hpsBtn" attr-id="' + row.id_pejabat +
                            '"><i class="bi bi-trash"></i>Hapus</button></a>';
                    }
                },
                {
                    data: 'nama_jabatan',
                    name: 'nama_jabatan',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'updated_at',
                    name: 'updated_at',
                }
            ]
        });
        $('.table tbody').on('click', '.hpsBtn', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            let id_pejabat = $(this).attr('attr-id');
            swal.fire({
                title: "Apakah ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'setuju',
                cancelButtonText: 'Batal',
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //jalankan ajax post untuk hapus
                    axios.post('/admin/jabatan/hapus', {
                        'id_pejabat': id_pejabat
                    }).then(function(response) {
                        if (response.status) {
                            // alert(response.data.pesan);
                            swal.fire({
                                title: "Hapus data",
                                text: response.data.pesan,
                                icon: "success"
                            }).then(() => {
                                location.reload();
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
