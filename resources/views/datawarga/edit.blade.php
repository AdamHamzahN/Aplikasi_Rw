@extends('template.layout')
@section('content')
    <div class="row">
        <div>
            <a href="{{ url('/datawarga') }}" class="btn btn-info btn-lg mx-auto">Kembali</a>
        </div>
        
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header text-center">

                    <h1>Edit Data Warga dengan NIK</h1><br>
                    <h1>{{ $warga->nik }}</h1>
                </div>
                <form method="post" name="formTambah" action="{{ url('datawarga/simpan') }} ">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" name="nik" value="{{$warga ->nik}}">

                                <label for="nama" class="col-form-label">Nama :</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ $warga->nama }}" required /> <br>

                                <label for="jns_kelamin">Jenis Kelamin :</label>
                                <select class="form-control" name="jns_kelamin" id="jns_kelamin"
                                    value="{{ $warga->jns_kelamin }}" required>
                                    <option value='laki-laki'>laki-laki</option>
                                    <option value='perempuan'>perempuan</option>
                                </select>
                                <br>

                                <label for="tempat_lahir">Tempat Lahir :</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"class="form-control"
                                    value="{{ $warga->tempat_lahir }}" required /><br>

                                <label for="tgl_lahir">Tanggal Lahir :</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir"class="form-control"
                                    value="{{ $warga->tgl_lahir }}" required /><br>

                                <label for="ayah">Nama Ayah :</label>
                                <input type="text" name="ayah" id="ayah"class="form-control"
                                    value="{{ $warga->ayah }}" required /><br>

                                <label for="ibu">Nama Ibu :</label>
                                <input type="text" name="ibu" id="ibu"class="form-control"
                                    value="{{ $warga->ibu }}" required /><br>

                                <label for="pekerjaan">Pekerjaan :</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                    value="{{ $warga->pekerjaan }}" />
                                <p><span class="text-danger ">*</span>Bila belum bekerja/tidak memiliki pekerjaan kosongkan
                                    saja</p>


                                <label for="alamat">Alamat :</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    value="{{ $warga->alamat }}" required /><br>

                                <label for="rt">RT :</label>
                                <input type="number" name="rt" id="rt" class="form-control"
                                    value="{{ $warga->rt }}" required /><br>

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
