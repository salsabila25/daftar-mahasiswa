@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah data baru</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard-data/mahasiswa">
        @csrf
        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="nim" required value="{{ old('nim') }}">
            @error('nim')
            <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama" required value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir')
            <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="jurusan" required value="{{ old('jurusan') }}">
            @error('jurusan')
            <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="program_studi" class="form-label">Program Studi</label>
            <input type="text" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" placeholder="program studi" required value="{{ old('program_studi') }}">
            @error('program_studi')
            <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="program" class="form-label">Status Mahasiswa Saat Ini</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="statusAktif" value="1" checked>
                <label class="form-check-label" for="statusAktif">
                  Aktif
                </label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusLulus" value="0">
                <label class="form-check-label" for="statusLulus">
                  Lulus
                </label>
              </div>
        </div>

        
        <button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
    </form>
</div>
@endsection