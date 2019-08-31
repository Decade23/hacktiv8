@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Form Pegawai</div>
                  @include('response')
                <form action="{{ route('pegawai.store') }}">
                          <div class="input-field col s6">
                            <input id="nip" name="nip" type="text" class="validate">
                            <label for="nip">NIP</label>
                          </div>

                          <div class="input-field col s6">
                            <input id="noKtp" name="noKtp" type="text" class="validate">
                            <label for="noKtp">Nomor KTP</label>
                          </div>
                          
                          <div class="input-field col s6">
                            <input id="nama" name="nama" type="text" class="validate">
                            <label for="nama">Nama</label>
                          </div>
                          
                          <div class="input-field col s6">
                            <input id="email" name="email" type="text" class="validate">
                            <label for="email">Email</label>
                          </div>
                          
                          <div class="input-field col s6">
                            <input id="phone" name="phone" type="text" class="validate">
                            <label for="phone">Phone</label>
                          </div>
                          
                          <div class="input-field col s2">
                              <input id="tempat_lahir" name="tempat_lahir" type="text" class="validate">
                              <label for="tempat_lahir">Tempat Lahir</label>
                           </div>
                           <div class="input-field col s4">
                              <input id="tanggal_lahir" name="tanggal_lahir" type="text" class="validate">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                           </div>

                           <div class="input-field col s3">
                            <select name="jenis_kelamin" id="jenis_kelamin">
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="M">Pria</option>
                              <option value="F">Wanita</option>
                            </select>
                            <label for="gender">Jenis Kelamin</label>
                          </div>

                          <div class="input-field col s3">
                            <select name="statusKawin" id="statusKawin">
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="1">Jabatan 1</option>
                              <option value="2">Jabatan 2</option>
                            </select>
                            <label for="jabatan">Status Kawin</label>
                          </div>

                          <div class="input-field col s3">
                            <select name="jabatan" id="jabatan">
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="1">Jabatan 1</option>
                              <option value="2">Jabatan 2</option>
                            </select>
                            <label for="jabatan">Jabatan</label>
                          </div>

                          <div class="input-field col s3">
                            <select name="statusKepegawaian" id="statusKepegawaian">
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="aktif">Aktif</option>
                              <option value="tidak aktif">Tidak Aktif</option>
                            </select>
                            <label for="statusKepegawaian">Status Pegawai</label>
                          </div>

                          <div class="input-field col s12">
                            <textarea id="alamat" name="alamat" class="materialize-textarea"></textarea>
                            <label for="alamat">Alamat</label>
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