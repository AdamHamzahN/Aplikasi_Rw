@extends('template.layout')
@section('content')
    <div class="row">
        <div>
            <a href="{{ url('/admin/datawarga') }}" class="btn btn-info btn-lg mx-auto kembali">Kembali</a>
        </div>

        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Tambah Data Warga</h1><br>
                </div>
                <form method="post" name="formTambah" action="{{ url('/admin/datawarga/simpan') }} ">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <h3>Data Pribadi</h3>
                                <hr>
                                <label for="nik">NIK :</label>
                                <input type="text" name="nik" class="form-control" id="nik" required /><br>


                                <label for="nama" class="col-form-label">Nama :</label>
                                <input type="text" name="nama" class="form-control" id="nama" required />
                                <br>

                                <label for="jenis_kelamin">Jenis Kelamin :</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value='laki-laki'>laki-laki</option>
                                    <option value='perempuan'>perempuan</option>
                                </select>
                                <br>

                                <label for="tempat_lahir">Tempat Lahir :</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"class="form-control"
                                    required /><br>

                                <label for="tgl_lahir">Tanggal Lahir :</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir"class="form-control" required /><br>

                                <label for="agama">Agama :</label>
                                <select class="form-control" name="agama" id="agama" required>
                                    <option value='Islam'>Islam</option>
                                    <option value='Kristen Protestan'>Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <br>

                                <label for="pekerjaan">Pekerjaan :</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" />
                                <p><span class="text-danger ">*</span>Bila belum bekerja/tidak memiliki pekerjaan
                                    kosongkan saja</p><br>

                                <h3>Alamat Rumah</h3>
                                <hr>
                                <label for="alamat">Nama Jalan :</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" required /><br>

                                <label for="rt">RT :</label>
                                <input type="number" name="rt" id="rt" class="form-control" required /><br><br>
                                <h3>Kontak</h3>
                                <hr>
                                <label for="kontak">kontak :</label>
                                <input type="number" name="kontak" id="kontak" class="form-control" required /><br>
                                @csrf

                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
