@extends('template.layout')
@section('content')
    <div class="row">
        <div>
            <a href="{{ url('/pengurusrw/jabatan/') }}" class="btn btn-info btn-lg mx-auto kembali">Kembali</a>
        </div>

        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Tambah Jabatan Baru</h1><br>
                </div>
                <form method="post" name="formTambah" action="{{ url('admin/jabatan/simpan') }} ">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama_jabatan">Jabatan :</label>
                                <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" placeholder="masukan jabatan baru" required /><br>
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
