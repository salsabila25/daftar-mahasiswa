@extends('dashboard.layouts/.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Biodata Mahasiswa</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a class="btn btn-sm btn-outline-warning" href="/dashboard-data/mahasiswa/{{ $data->nim }}/edit">Edit</a>
          <form action="/dashboard-data/mahasiswa/{{ $data->nim }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data ini?')">Delete</button>
          </form>

        </div>
    </div>
</div>
<table class="table">
    <tbody>
      <tr>
        <th>NIM</th>
        <td>{{ $data->nim }}</td>
      </tr>
      <tr>
        <th>Nama Lengkap</th>
        <td>{{ $data->nama }}</td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th>
        <td>{{ date('d-m-Y', strtotime($data->tanggal_lahir))}}</td>
      </tr>
      <tr>
        <th>Jurusan</th>
        <td>{{ $data->jurusan }}</td>
      </tr>
      <tr>
        <th>Program Studi</th>
        <td>{{ $data->program_studi }}</td>
      </tr>
      <tr>
        <th>Status Mahasiswa Saat Ini</th>
        <td>{{ ($data->status === 1) ? 'Aktif' : 'Lulus' }}</td>
      </tr>
    </tbody>
  </table>

  <a href="/dashboard-data/mahasiswa" class="btn btn-secondary">Kembali ke Halaman Utama</a>
@endsection