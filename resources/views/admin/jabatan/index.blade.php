@extends('template.layout')
@section('content')
    <div class="row ">
        <div class="col-lg-12">
            <div class="col-lg-12 text-center mb-4 background-blue mt-10">
                <h1>Daftar Jabatan Pengurus Rw 09</h1>
            </div>

            <div class="col-lg-12 mb-3">
                <a href="{{ url('/pengurusrw/jabatan/tambah') }}">
                    <button class="btn btn-success">Tambah Jabatan</button>
                </a>
            </div>

            <table class="table table-hovered table-bordered">
                <thead>
                    <tr>
                        <th>
                            Aksi
                        </th>
                        <th>
                            Id Jabatan
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
                            <td>
                                <a href="{{ url('/pengurusrw/jabatan/edit/'.$jabatan->id_jabatan) }}">
                                    <button class="btn btn-primary"><i class="bi bi-pencil-square"></i>Edit</button>
                                </a>
                                {{-- <a href="{{ url('/datawarga/hapus' ) }}">
                                    <button class="btn btn-danger hpsBtn" attr-id="{{$warga->nik}}"><i class="bi bi-trash "></i>Hapus</button>
                                </a> --}}
                                
                            </td>
                            <td>{{ $jabatan->id_jabatan }}</td>
                            <td>{{ $jabatan->nama_jabatan }}</td>
                            <td>{{ $jabatan->created_at }}</td>
                            <td>{{ $jabatan->updated_at }}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


    

