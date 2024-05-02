@extends('template.layout')
@section('content')
    <div class="row">
        <div>
            <a href="{{ url('/admin/datawarga') }}" class="btn btn-info btn-lg mx-auto kembali">Kembali</a>
        </div>

        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header text-center">

                    <h1>Edit Data Warga dengan Nama</h1><br>
                    <h1>{{ $warga->nama }}</h1>
                </div>
                <form method="post" name="formTambah" action="{{ url('/admin/datawarga/simpan') }} ">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" name="nik" value="{{ $warga->nik }}">
                                <h3>Data Pribadi</h3>
                                <hr>
                                <label for="nama" class="col-form-label">Nama :</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ $warga->nama }}" required /> <br>

                                <label for="jenis_kelamin">Jenis Kelamin :</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                    value="{{ $warga->jenis_kelamin }}" required>
                                    <option value='laki-laki'>laki-laki</option>
                                    <option value='perempuan'>perempuan</option>
                                </select>
                                <br>

                                <label for="tempat_lahir">Tempat Lahir :</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"class="form-control"
                                    value="{{ $warga->tempat_lahir }}" required /><br>

                                <label for="tanggal_lahir">Tanggal Lahir :</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"class="form-control"
                                    value="{{ $warga->tanggal_lahir }}" required /><br>

                                <label for="agama">Agama :</label>
                                <select class="form-control" name="agama" id="agama" value="{{ $warga->agama }}"
                                    required>
                                    <option value='Islam'>Islam</option>
                                    <option value='Kristen Protestan'>Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <br>

                                <label for="pekerjaan">Pekerjaan :</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                    value="{{ $warga->pekerjaan }}" />
                                <p><span class="text-danger ">*</span>Bila belum bekerja/tidak memiliki pekerjaan kosongkan
                                    saja</p>

                                <h3>Alamat</h3>
                                <hr>
                                <label for="alamat">Nama Jalan :</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    value="{{ $warga->alamat }}" required /><br>

                                <label for="rt">RT :</label>
                                <input type="number" name="rt" id="rt" class="form-control"
                                    value="{{ $warga->rt }}" required /><br>
                                <h3>Kontak</h3>
                                <hr>
                                <label for="kontak">kontak :</label>
                                <input type="number" name="kontak" id="kontak" class="form-control"
                                    value="{{ $warga->kontak }}" required /><br>
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
