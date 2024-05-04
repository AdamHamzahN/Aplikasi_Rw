@extends('template.layout')
@section('content')
    <div class="row ">
        <div class="col-lg-12">
            <div class="col-lg-12 text-center mb-4 background-blue mt-10">
                <h1>Akun Warga RW 09</h1>
                <h2>Kota baru Bekasi Barat</h2>
            </div>

            <table class="table DataTable table-hovered table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            Id Akun
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Nik
                        </th>
                        <th>
                            Password
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kirim Ke Whatsapp</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="module">
        var table = $('.DataTable').DataTable({
            responsive: true,
            processing: true,
            ServerSide: true,
            ajax: "{!! route('akunwarga.data') !!}",
            columns: [{
                    data: 'id_akun_warga',
                    name: 'id_akun_warga',
                },

                {
                    render: function(data, type, row) {
                        return row.nik.nama;
                    }
                },
                {
                    render: function(data, type, row) {
                        return row.nik.nik;
                    }
                },
                {
                    data: 'password',
                    name: 'password',
                },
                {
                    render: function(data, type, row) {
                        return "<btn class='btn btn-primary kirimWa' data-bs-toggle='modal' data-bs-target='#modalForm' attr-href='{!! url('/admin/akunwarga/kirimwa/"+ row.nik.nik+"') !!}'><i class='bi bi-whatsapp'></i> Kirim Wa</btn>"
                    }
                }
            ]
        });


        $('.DataTable tbody').on('click', '.kirimWa', function(event) {
            let modalForm = document.getElementById('modalForm');
            modalForm.addEventListener('shown.bs.modal', function(event) {
                event.preventDefault();
                event.stopImmediatePropagation();
                const link = event.relatedTarget.getAttribute('attr-href');

                axios.get(link).then(response => {
                    $('#modalForm .modal-body').html(response.data);
                });

                modalForm.addEventListener('hidden.bs.modal', function(closeEvent) {
                    closeEvent.preventDefault();
                    closeEvent.stopImmediatePropagation();

                    $('#modalForm').removeData();
                });
            });
        });
    </script>
@endsection
