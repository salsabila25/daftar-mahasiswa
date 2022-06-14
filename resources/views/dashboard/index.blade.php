@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Mahasiswa</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="/dashboard-data/mahasiswa/create" class="btn btn-sm btn-outline-secondary">
        <span data-feather="plus-square" class="align-text-bottom"></span>
        Tambah Data
      </a>
    </div>
</div>
    @if (session()->has('success'))     
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      {{-- @if (session()->has('loginError'))     
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif --}}
  <div class="table-responsive">
      <table class="table table-striped table-sm">
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
        <tbody id="tbody-data">
          @foreach ($dataMahasiswa as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nim }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->jurusan }}</td>
            <td>{{ ($data->status === 1) ? 'Aktif' : 'Lulus' }}</td>
            <td>
                <a class="badge bg-secondary" href="/dashboard-data/mahasiswa/{{ $data->nim }}">
                    <span data-feather="eye"></span> View
                </a>
                <a class="badge bg-info" href="/dashboard-data/mahasiswa/{{ $data->nim }}/edit">
                    <span data-feather="edit"></span> Edit
                </a>
                <form action="/dashboard-data/mahasiswa/{{ $data->nim }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Hapus data ini?')">
                    <span data-feather="x-circle"></span> Delete
                  </button>
                </form>

            </td>
        </tr>
          @endforeach
          
          
        </tbody>
      </table>
  </div>
      <!-- Button trigger modal -->

@endsection
