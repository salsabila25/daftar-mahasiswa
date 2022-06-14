@extends('layouts.main')

@section('container')
    <h1>Daftar Mahasiswa</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftar as $mahasiswa)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                    <td>{{ ($mahasiswa->status === 1) ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td><a href="mahasiswa/{{ $mahasiswa->nim }}" class="btn btn-primary">Lihat</a></td>
                </tr>
            @endforeach
          
        </tbody>
      </table>
@endsection