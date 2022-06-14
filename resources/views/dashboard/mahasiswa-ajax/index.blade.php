@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Mahasiswa</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
        Tambah Data
      </button>
    </div>
</div>
    @if (session()->has('success'))     
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
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

        </tbody>
      </table>
  </div>
      <!-- Button trigger modal -->


  <!-- Modal untuk Tambah Data -->
  <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formTambah">
          <div class="modal-body">
          @csrf
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="nim" required value="{{ old('nim') }}">
              <div id="nim_input_invalid" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama" required value="{{ old('nama') }}">
              <div id="nama_input_invalid" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
              <div id="tanggal_lahir_input_invalid" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan</label>
              <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="jurusan" required value="{{ old('jurusan') }}">
              <div id="jurusan_input_invalid" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
              <label for="program_studi" class="form-label">Program Studi</label>
              <input type="text" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" placeholder="program studi" required value="{{ old('program_studi') }}">
              <div id="program_studi_input_invalid" class="invalid-feedback"></div>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
          
          
      </form>
        
        
      </div>
    </div>
  </div>

  <!-- Modal untuk Edit Data -->
  <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formTambah">
          <div class="modal-body">
          @csrf
          <input type="hidden" id="edit_nim_mahasiswa">
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" id="edit_nim" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="nim" required value="{{ old('nim') }}">
            <div id="nim_invalid_feedback" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" id="edit_nama" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama" required value="{{ old('nama') }}">
              <div id="nama_invalid_feedback" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" id="edit_tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
              <div id="tanggal_lahir_invalid_feedback" class="invalid-feedback"></div>
          </div>
          <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan</label>
              <input type="text" id="edit_jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="jurusan" required value="{{ old('jurusan') }}">
              <div id="jurusan_invalid_feedback" class="invalid-feedback"></div>

          </div>
          <div class="mb-3">
              <label for="program_studi" class="form-label">Program Studi</label>
              <input type="text" id="edit_program_studi" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" placeholder="program studi" required value="{{ old('program_studi') }}">
              <div id="program_studi_invalid_feedback" class="invalid-feedback"></div>

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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary update_mahasiswa">Update</button>
        </div>
          
          
      </form>
        
        
      </div>
    </div>
  </div>

  <!-- Modal untuk Hapus Data -->
  <div class="modal fade" id="deleteDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
          <input type="hidden" id="delete_nim_mahasiswa">
          <h5>Apakah Anda ingin menghapus data ini?</h5>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary hapus_mahasiswa">Hapus</button>
        </div>
        
        
      </div>
    </div>
  </div>

    <!-- Modal untuk Tampilkan Data -->
    <div class="modal fade" id="viewDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewModalLabel">Biodata Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table>
              <tbody class="isi-biodata">
               
              </tbody>
            </table>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
          
          
        </div>
      </div>
    </div>

<script type="text/javascript">
  $(document).ready(function(){
    fetchDataMahasiswa();
    function fetchDataMahasiswa(){
      $.ajax({
        type: "GET",
        url: "/fetchdatamahasiswa",
        datatype: "json",
        success: function(response) {
          console.log(response.mahasiswa)
          var no = 1;
          $('#tbody-data').html("");
          $.each(response.mahasiswa, function(key,item){
            $('#tbody-data').append('<tr>\
          <td>'+(no++)+'</td>\
          <td>'+item.nim+'</td>\
          <td>'+item.nama+'</td>\
          <td>'+item.jurusan+'</td>\
          <td>'+(item.status === 1 ? "Aktif" : "Lulus") +'</td>\
          <td>\
              <button class="lihatMahasiswa badge bg-info border-0" value="'+item.nim+'">\
                  <span data-feather="edit"></span> View\
              </button>\
              <button class="editMahasiswa badge bg-warning border-0" value="'+item.nim+'">\
                  <span data-feather="edit"></span> Edit\
              </button>\
              <button class="hapusMahasiswa badge bg-danger border-0" value="'+item.nim+'">\
                  <span data-feather="edit"></span> Hapus\
              </button>\
          </td>\
      </tr>');
          })
        },
        error: function(error) {
          console.log(error)
        }
      });
    }

    $(document).on('click', '.editMahasiswa', function(e){
      e.preventDefault();
      
      $('#nim_invalid_feedback, #nama_invalid_feedback, #tanggal_lahir_invalid_feedback').text("");
      $('#jurusan_invalid_feedback, #program_studi_invalid_feedback').text("");

      var nimMahasiswa = $(this).val();
      console.log(nimMahasiswa);
      $("#editDataModal").modal("show");
      $.ajax({
        type: "GET",
        url: "/dashboard/mahasiswa/"+nimMahasiswa,
        success: function(response) {
          console.log(response)
          if (response.status == 404) {
            $('#success_message').html("");
            $('#success_message').addClass("alert alert-danger");
            $('#success_message').text(response.message);
          } else {
            $('#edit_nim_mahasiswa').val(response.nim);
            $('#edit_nim').val(response.nim);
            $('#edit_nama').val(response.nama);
            $('#edit_tanggal_lahir').val(response.tanggal_lahir);
            $('#edit_jurusan').val(response.jurusan);
            $('#edit_program_studi').val(response.program_studi);
            if(response.status == 1){
              $('input[name=status]:eq(2)').prop('checked', true);
            }else{
              $('input[name=status]:eq(3)').prop('checked', true);
            }
          }
        },
        error: function(error) {
          console.log(error)
          alert("Data mahasiswa tidak ditemukan");
        }
      });
    });
    
    
    $(document).on('click', '.update_mahasiswa', function(e){
      e.preventDefault();
      
      var nimMahasiswa = $('#edit_nim_mahasiswa').val();
      var data = {
        'nim' : $('#edit_nim').val(),
        'nama' : $('#edit_nama').val(),
        'tanggal_lahir' : $('#edit_tanggal_lahir').val(),
        'jurusan' : $('#edit_jurusan').val(),
        'program_studi' : $('#edit_program_studi').val(),
        'status' : $('input[name="status"]:checked').val(),
      }
      console.log(nimMahasiswa);
      console.log(data);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type: "PUT",
        url: "/dashboard/mahasiswa/"+nimMahasiswa,
        data: data,
        datatype: 'json',
        success: function(response) {
          //console.log(response)
          if (response.status == 404) {
            // $('#success_message').html("");
            // $('#success_message').addClass("alert alert-danger");
            // $('#success_message').text(response.message);
            alert(response.message);
          } else if(response.status == 400){
            // $('#success_message').html("");
            // $('#success_message').addClass("alert alert-danger");
            // $('#success_message').text(response.error);
            alert(response.error);
          }else {
            alert(response.message);
            $('#editDataModal').modal('hide');
            fetchDataMahasiswa();
          }
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseJSON.errors)
          //$('#nim-invalid-feedback').html('');
          $('#nim_invalid_feedback, #nama_invalid_feedback, #tanggal_lahir_invalid_feedback').text("");
          $('#jurusan_invalid_feedback, #program_studi_invalid_feedback').text("");
          var idInvalidFeedback = "";
          $.each(xhr.responseJSON.errors, function(key,value) {
            idInvalidFeedback = '#'+key+"_invalid_feedback";
            console.log(idInvalidFeedback);
            $(idInvalidFeedback).text(value);
            $(idInvalidFeedback).css("display", "block");
          });
        }
      });
    });
    $(document).on('click', '.hapusMahasiswa', function(e){
      e.preventDefault();
      var nimMahasiswa = $(this).val();
      console.log(nimMahasiswa);
      $("#deleteDataModal").modal("show");
      $("#delete_nim_mahasiswa").val(nimMahasiswa);
    });

    $(document).on('click', '.hapus_mahasiswa', function(e){
      e.preventDefault();
      var nimMahasiswa = $('#delete_nim_mahasiswa').val();
      
      console.log(nimMahasiswa);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        type: "DELETE",
        url: "/dashboard/mahasiswa/"+nimMahasiswa,
        success: function(response) {
          console.log(response)
          if (response.status == 404) {
            // $('#success_message').html("");
            // $('#success_message').addClass("alert alert-danger");
            // $('#success_message').text(response.message);
            alert(response.message);
          } else if(response.status == 400){
            // $('#success_message').html("");
            // $('#success_message').addClass("alert alert-danger");
            // $('#success_message').text(response.error);
            alert(response.error);
          }else {
            //alert(response.message);
            $('#deleteDataModal').modal('hide');
            fetchDataMahasiswa();
          }
        },
        error: function(error) {
          console.log(error)
          alert("Data Mahasiswa gagal dihapus");
          
        }
      });
    });

    $( "#formTambah" ).on( "submit", function(event) {
    //Membatalkan event default
      event.preventDefault();
      

      $.ajax({
        type: "POST",
        url: "/dashboard/mahasiswa",
        data: $("#formTambah").serialize(),
        success: function(response) {
          console.log(response.message)
          $('#tambahDataModal').modal('hide')
          $('#formTambah')[0].reset();
          fetchDataMahasiswa();
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseJSON.errors)
          $('#nim_input_invalid, #nama_input_invalid, #tanggal_lahir_input_invalid').text("");
          $('#jurusan_input_invalid, #program_studi_input_invalid').text("");
          var idInvalidFeedback = "";
          $.each(xhr.responseJSON.errors, function(key,value) {
            idInvalidFeedback = '#'+key+"_input_invalid";
            console.log(idInvalidFeedback);
            $(idInvalidFeedback).text(value);
            $(idInvalidFeedback).css("display", "block");
          });
        }
      });
    });

    $(document).on('click', '.lihatMahasiswa', function(e){
        e.preventDefault();
        var nimMahasiswa = $(this).val();
        console.log(nimMahasiswa);
        $("#viewDataModal").modal("show");
        $.ajax({
          type: "GET",
          url: "/dashboard/mahasiswa/"+nimMahasiswa,
          success: function(response) {
            //console.log(response)
            if (response.status == 404) {
              alert("Data mahasiswa tidak ditemukan");
              // $('#success_message').html("");
              // $('#success_message').addClass("alert alert-danger");
              // $('#success_message').text(response.message);
            } else {
              $('.isi-biodata').html("");
              $('.isi-biodata').append('\
              <tr>\
                  <th>NIM</th>\
                  <td>'+ response.nim +'</td>\
                </tr>\
                <tr>\
                  <th>Nama Lengkap</th>\
                  <td>'+ response.nama +'</td>\
                </tr>\
                <tr>\
                  <th>Tanggal Lahir</th>\
                  <td>'+ response.tanggal_lahir +'</td>\
                </tr>\
                <tr>\
                  <th>Jurusan</th>\
                  <td>'+ response.jurusan +'</td>\
                </tr>\
                <tr>\
                  <th>Program Studi</th>\
                  <td>'+ response.program_studi +'</td>\
                </tr>\
                <tr>\
                  <th>Status Mahasiswa Saat Ini</th>\
                  <td>'+ (response.status == 1 ? "Aktif" : "Lulus") +'</td>\
                </tr>');
            }
          },
          error: function(error) {
            console.log(error)
            alert("Data tidak ditemukan");
          }
        });
      });
  

  });

</script>

@endsection
