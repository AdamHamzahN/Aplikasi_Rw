<!DOCTYPE html>
<html>

<head>
    <title>Super Admin</title>
    @vite(['resources/css/superadmin.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <h1>Selamat Datang Admin</h1>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Move the logout button to the left -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/login">
                        <h3 class="text-dark"><i class="bi bi-box-arrow-left"></i> Logout</h3>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">

            <div class="row ">
                <div class="col-lg-12">
                    <div class="col-lg-12 text-center mb-4 background-blue mt-10">
                        <h1>Data Admin RW 009</h1>
                        <h2>Kota baru Bekasi Barat</h2>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <button class="btn btn-success btnTambahAdmin" data-bs-target="#modalForm"
                            data-bs-toggle="modal" attr-href={{ route('superadmin.tambah') }}><i
                                class="bi bi-plus-lg"></i>Tambah Admin</button>
                    </div>

                    <table class="table DataTable table-hovered table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    Aksi
                                </th>
                                <th>
                                    Admin
                                </th>
                                <th>
                                    Password
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btnSimpan"><i class="bi bi-save"></i>Simpan</button>
                    <button class="btn btn-primary " data-bs-dismiss="modal">Batal</button>
                </div>
            </div>

        </div>

    </div>
</body>
<footer>
    <script type="module">
        const superadminModal = document.querySelector('#modalForm');
        const modal = bootstrap.Modal.getOrCreateInstance(superadminModal);

        var table = $('.DataTable').DataTable({
            responsive: true,
            processing: true,
            ServerSide: true,
            ajax: "{!! route('superadmin.data') !!}",
            columns: [{
                    // data: null,
                    // data: 'admin',
                    // name: 'admin',

                    render: function(data, type, row) {
                        return "<btn class='btn btn-primary editBtn' data-bs-toggle='modal' data-bs-target='#modalForm' attr-href='{!! url('/superadmin/edit/"+row.id_admin+"') !!}'><i class='bi bi-pencil'></i>Edit</btn>" +
                        '<a href="/superadmin/hapus/' + row.id_admin +
                            '"><button class="btn btn-danger hpsBtn" attr-id="' + row.id_admin +
                            '"><i class="bi bi-trash"></i>Hapus</button></a>';

                    }
                },
                {
                    data: 'username',
                    name: 'username',
                },
                {
                    data: 'role',
                    name: 'role',
                },
            ]
        });
        $('.table tbody').on('click', '.hpsBtn', function(event) {
            event.preventDefault();
            event.stopImmediatePropagation();

            let id_admin = $(this).closest('.hpsBtn').attr('attr-id');
            //alert(id_admin);
            swal.fire({
                title: "Apakah ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'setuju',
                cancelButtonText: 'Batal',
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //jalankan ajax post untuk hapus
                    axios.post('/superadmin/hapus', {
                        'id_admin': id_admin
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

        //Tambah Admin
        $('.btnTambahAdmin').on('click', function(a) {
            changeHTML('#modalForm', '.modal-title', 'Tambah Data Admin');
            const modalForm = document.getElementById('modalForm');
            modalForm.addEventListener('shown.bs.modal', function(eventTambah) {
                eventTambah.preventDefault();
                eventTambah.stopImmediatePropagation();
                const link = eventTambah.relatedTarget.getAttribute('attr-href');
                axios.get(link).then(response => {
                    $("#modalForm .modal-body").html(response.data);
                });

                //simpan
                $('.btnSimpan').on('click', function(submitEvent) {
                    submitEvent.stopImmediatePropagation();
                    var data = {
                        'username': $('#username').val(),
                        'password': $('#password').val(),
                        'role': $('#role').val(),
                        '_token': "{{ csrf_token() }}"
                    }
                    if (data.role !=='', data.username !== '' && data.password !== '') {
                        axios.post('{{ url('/superadmin/simpan') }}', data).then(resp => {
                            if (resp.data.status == 'success') {
                                //tampilkan pop up berhasil;
                                swal.fire({
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
                                swal.fire({
                                    title: "GAGAL",
                                    text: resp.data.pesan,
                                    icon: "error"
                                });
                            }
                        });
                    } else {
                        alert('data tidak boleh kosong');
                    }

                });
            });
            modalForm.addEventListener('hidden.bs.modal', function(closeEvent) {
                closeEvent.preventDefault();
                closeEvent.stopImmediatePropagation();

                $('#modalForm').removeData();
            });
        });

        //tombol edit
        $('.DataTable tbody').on('click', '.editBtn', function(event) {
            changeHTML('#modalForm', '.modal-title', 'Edit Data Admin');
            let modalForm = document.getElementById('modalForm');
            modalForm.addEventListener('shown.bs.modal', function(eventEdit) {
                eventEdit.preventDefault();
                eventEdit.stopImmediatePropagation();
                const link = eventEdit.relatedTarget.getAttribute('attr-href');

                axios.get(link).then(response => {
                    $('#modalForm .modal-body').html(response.data);
                });

                //simpan
                $('.btnSimpan').on('click', function(submitEvent) {
                    submitEvent.stopImmediatePropagation();
                    var data = {
                        'id_admin': $('#id_admin').val(),
                        'username': $('#username').val(),
                        'password': $('#password').val(),
                        'role': $('#role').val(),
                        '_token': "{{ csrf_token() }}"
                    }
                    if (data.id_admin!=='' ,data.username !== '' && data.role !== '' && data.password !== '') {
                        axios.post('{{ url('/superadmin/simpan') }}', data).then(resp => {
                            if (resp.data.status == 'success') {
                                //tampilkan pop up berhasil;
                                swal.fire({
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
                                swal.fire({
                                    title: "GAGAL",
                                    text: resp.data.pesan,
                                    icon: "error"
                                });
                            }
                        });
                    } else {
                        alert('data tidak boleh kosong');
                    }

                });
            });
            modalForm.addEventListener('hidden.bs.modal', function(closeEvent) {
                closeEvent.preventDefault();
                closeEvent.stopImmediatePropagation();

                $('#modalForm').removeData();
            });
        });

        function changeHTML(element, find, text) {
            $(element).find(find).html();
            return $(element).find(find).html(text).promise().done();
        }
    </script>
</footer>

</html>
