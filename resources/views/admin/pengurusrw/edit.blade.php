@extends('template.layout')
@section('content')
    <div class="row">
        <div class="mx-auto">

            <div class="card">
                <div class="card-header">
                    <div class="col mb-10">
                        <a href="{{ url('/admin/pengurusrw/') }}" class="btn btn-info btn-lg kembali">Kembali</a>
                    </div>
                    <br>
                    <div class="col text-center">
                        <h1>Edit Pengurus RW dengan Jabatan </h1>
                        <h1>{{ $pejabat->nama_jabatan }}</h1>
                    </div>
                </div>
                <form method="post" name="formTambah" action="{{ url('/admin/pengurusrw/simpan') }} ">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" name="id_pejabat" value="{{ $pejabat->id_pejabat }}">
                                <input type="hidden" name="nama_jabatan" class="form-control" id="nama_jabatan"
                                    value='{{ $pejabat->nama_jabatan }}' />
                                
                                <label for="nik">
                                    <h3>Nama :</h3>
                                </label>
                                @if ($pejabat->nik != null)
                                    <select class="form-control nama nik" name="nik" id="nik"
                                        data-placeholder="Pilih Nama" required>
                                        <option value="{{ $datawarga->where('nik', $pejabat->nik)->first()->nama }}">
                                            {{ $datawarga->where('nik', $pejabat->nik)->first()->nama }}</option>
                                        @foreach ($datawarga as $warga)
                                            <option value='{{ $warga->nik }}'>{{ $warga->nama }} - {{ $warga->nik }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    <select class="form-control nama nik" name="nik" id="nik"
                                        data-placeholder="Pilih Nama" required data-live-search="true">
                                        <option value="">Kosong</option>
                                        @foreach ($datawarga as $warga)
                                            <option value='{{ $warga->nik }}'>{{ $warga->nama }}</option>
                                        @endforeach
                                    </select>
                                @endif
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
<script type="module">
    $(document).ready(function() {
        $('.nama').select2({
            placeholder: "masukkan nama",
            allowClear: true,
        });
    });
</script>
