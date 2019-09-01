@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Form Riwayat Hidup</div>
                  @include('response')
                <form action="{{ route('pegawai.store') }}">
                          <div class="input-field col s12">
                            <input id="tingkatPendidikan" name="tingkatPendidikan" type="text" class="validate">
                            <label for="tingkatPendidikan">Tingkat Pendidikan</label>
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
                          
                          <div class="input-field col s2">
                              <input id="ijazah" name="ijazah" type="text" class="validate">
                              <label for="ijazah">File Ijazah</label>
                           </div>
                          <div class="input-field col s4">
                              <input id="transkripNilai" name="transkripNilai" type="text" class="validate">
                              <label for="transkripNilai">File Transkrip Ijazah</label>
                           </div>

                           <div class="input-field col s4">
                              <input id="sertifikatPendidik" name="sertifikatPendidik" type="text" class="validate">
                              <label for="sertifikatPendidik">File Sertifikat Pendidik</label>
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