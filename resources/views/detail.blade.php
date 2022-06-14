@extends('layouts.main')

@section('container')
    <h1>Halaman Detail Mahasiswa</h1>
    <table class="table">
        <tbody>
          <tr>
            <th>NIM</th>
            <td>{{ $daftar->nim }}</td>
          </tr>
          <tr>
            <th>Nama Lengkap</th>
            <td>{{ $daftar->nama }}</td>
          </tr>
          <tr>
            <th>Tanggal Lahir</th>
            <td>{{ date('d-m-Y', strtotime($daftar->tanggal_lahir))}}</td>
          </tr>
          <tr>
            <th>Jurusan</th>
            <td>{{ $daftar->jurusan }}</td>
          </tr>
          <tr>
            <th>Program Studi</th>
            <td>{{ $daftar->program_studi }}</td>
          </tr>
          <tr>
            <th>Status Mahasiswa Saat Ini</th>
            <td>{{ ($daftar->status === 1) ? 'Aktif' : 'Lulus' }}</td>
          </tr>
        </tbody>
      </table>

      <a href="/" class="btn btn-danger">Kembali ke Halaman Utama</a>
@endsection