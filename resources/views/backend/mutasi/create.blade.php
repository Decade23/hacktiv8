@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Form Mutasi</div>
                  @include('response')
                <form action="{{ route('pegawai.store') }}">
                          <div class="input-field col s12">
                            <select name="jenisMutasi" id="jenisMutasi">
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="mutasiMasuk">Mutasi Masuk</option>
                              <option value="mutasiKeluar">Mutasi Keluar</option>
                              <option value="pindahAntarInstansi">Pindah Antar Instansi</option>
                              <option value="pensiun">Pensiun</option>
                              <option value="wafat">Wafat</option>
                            </select>
                            <label for="mutasi">Mutasi</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="namaSekolah" name="namaSekolah" type="text" class="validate">
                            <label for="namaSekolah">Nama Sekolah/Universitas</label>
                          </div>
                          
                          <div class="input-field col s12">
                            <input id="alamatSekolah" name="alamatSekolah" type="text" class="validate">
                            <label for="alamatSekolah">Alamat Sekolah/Universitas</label>
                          </div>
                          
                          <div class="input-field col s12">
                            <input id="jurusan" name="jurusan" type="text" class="validate">
                            <label for="jurusan">Jurusan</label>
                          </div>
                          
                          <div class="input-field col s6">
                            <input id="noIjazah" name="noIjazah" type="text" class="validate">
                            <label for="noIjazah">No.Ijazah</label>
                          </div>

                          <div class="input-field col s6">
                            <input id="tanggalIjazah" name="tanggalIjazah" type="text" class="validate">
                            <label for="tanggalIjazah">Tanggal Ijazah</label>
                          </div>

                          <div class="col m6 s6 file-field input-field">
                            <div class="btn float-right">
                              <span>File Ijazah</span>
                              <input type="file" id="fileIjazah" name="fileIjazah">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>

                          <div class="col m6 s6 file-field input-field">
                            <div class="btn float-right">
                              <span>File Transkip Ijazah</span>
                              <input type="file" id="fileTranskipIjazah" name="fileTranskipIjazah">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>

                          <div class="col m6 s6 file-field input-field">
                            <div class="btn float-right">
                              <span>File Sertifikat Pendidik</span>
                              <input type="file" id="fileSertifikatPendidik" name="fileSertifikatPendidik">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>

                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                              <i class="material-icons right">send</i>
                            </button>
                          </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
  
@endsection

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}"> --}}
@endpush

@push('js')
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  {{-- <script src="{{ asset('js/select2.min.js') }}"></script> --}}
  <script>
    $(document).ready(function(){
      
      $('#tanggal_lahir').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0",
        autoclose:true,
      });

      // $('#jabatan').select2();
    });
  </script>
@endpush