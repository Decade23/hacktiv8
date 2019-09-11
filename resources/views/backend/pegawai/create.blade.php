@extends('layouts.index')

@section('content')
<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
               <div class="col s12">
                  <!-- Current Balance -->
                  <div class="card animate fadeRight">
                     <div class="card-content">
                        <h4 class="card-title">Form Pegawai</h4>
                     </div>

                     <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                          <div class="input-field col s12">
                            <input id="nip" name="nip" type="text" class="validate">
                            <label for="nip">NIP/PEG.ID</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="ktp" name="ktp" type="text" class="validate">
                            <label for="ktp">Nomor KTP</label>
                          </div>

                          <div class="col m6 s6 file-field input-field">
                            <div class="btn float-right">
                              <span>File Photo User</span>
                              <input type="file" id="photo" name="photo">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>

                          <div class="input-field col s12">
                            <input id="nama" name="nama" type="text" class="validate">
                            <label for="nama">Nama Pegawai</label>
                          </div>

                          <div class="input-field col s6">
                              <input id="tempat_lahir" name="tempat_lahir" type="text" class="validate">
                              <label for="tempat_lahir">Tempat Lahir</label>
                           </div>
                           <div class="input-field col s6">
                              <input id="tanggal_lahir" name="tanggal_lahir" type="text" placeholder="dob" class="validate">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                           </div>
                          
                           <div class="input-field col s12">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="browser-default" data-placeholder="Pilih Jenis Kelamin">
                              <option value=""></option>
                              <option value="pria">Pria</option>
                              <option value="wanita">Wanita</option>
                            </select>
                            <hr/>
                            {{-- <label for="gender">Jenis Kelamin</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <select name="statusKawin" id="statusKawin" class="browser-default" data-placeholder="Pilih Status Perkawinan">
                              <option value=""></option>
                              <option value="lajang">Lajang</option>
                              <option value="menikah">Menikah</option>
                              <option value="bercerai">Bercerai</option>
                            </select>
                            <hr/>
                            {{-- <label for="jabatan">Status Kawin</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <select name="statusKepegawaian" id="statusKepegawaian" class="browser-default" data-placeholder="Pilih Status Kepegawaian">
                              <option value=""></option>
                              <option value="pns">PNS</option>
                              <option value="ptt">PTT</option>
                            </select>
                            <hr />
                            {{-- <label for="statusKepegawaian">Status Pegawai</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <input id="alamat" name="alamat" type="text" class="validate">
                            <label for="alamat">Alamat</label>
                          </div>
                          
                          <div class="input-field col s12">
                            <input id="noTelepon" name="noTelepon" type="text" class="validate">
                            <label for="noTelepon">No Telepon</label>
                          </div>
                                          
                          <div class="input-field col s12">
                            <a class="btn waves-effect waves-light" href="{{ url()->previous() }}">Back</a>
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
  <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endpush

@push('js')
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      
      $('#tanggal_lahir').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0",
        autoclose:true,
      });

      $('#statusKawin, #jenis_kelamin, #statusKepegawaian').select2({
          theme: "bootstrap",
          placeholder: "Select",
          width: '100%',
          // containerCssClass: ':all:',
      });
    });
  </script>
@endpush