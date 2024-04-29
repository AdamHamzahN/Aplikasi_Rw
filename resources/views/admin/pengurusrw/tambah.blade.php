@extends('template.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/pengurusrw') }}" class="btn btn-info btn-lg mx-auto kembali">Kembali</a>
                    <h1 class="text-center">Tambah Pengurus RW</h1>
                </div>
                <form method="post" name="formTambah" action="{{ url('/admin/pengurusrw/simpan') }} ">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nik"><h4>Nama :</h4></label>
                                <select class="form-control nik" name="nik" id="nik" required>
                                    @foreach ($datawargas as $warga)
                                        <option value={{ $warga->nik }}>{{ $warga->nama }}</option>
                                    @endforeach
                                </select>

                                <br><br>

                                <label for="id_jabatan"><h4>Jabatan :</h4></label>
                                <select class="form-control jabatan" name="id_jabatan" id="id_jabatan" required>
                                    @foreach ($jabatans as $jabatan)
                                        <option value={{ $jabatan->id_jabatan }}>{{ $jabatan->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                                
                                <br>
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

@section('footer')
    <script>
            $(document).ready(function() {
                $('.nik').select2({
                    placeholder:'masukkan nama'
                });
            });
    </script>
@endsection
