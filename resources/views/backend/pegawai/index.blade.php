@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Form Pegawai</div>
                <form action="{{ route('') }}">
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
                            <label for="name">Nama</label>
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
                              <input id="dob" name="dob" type="text" class="validate datepicker">
                              <label for="dob">Tanggal Lahir</label>
                           </div>

                           <div class="input-field col s3">
                            <select name="gender" id="gender">
                              <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                              <option value="M">Pria</option>
                              <option value="F">Wanita</option>
                            </select>
                            <label for="gender">Jenis Kelamin</label>
                          </div>

                          <div class="input-field col s3">
                            <select name="statusKawin" id="statusKawin">
                              <option value="" disabled selected>-- Pilih Status --</option>
                              <option value="M">Jabatan 1</option>
                              <option value="F">Jabatan 2</option>
                            </select>
                            <label for="jabatan">Status Kawin</label>
                          </div>

                          <div class="input-field col s3">
                            <select name="jabatan" id="jabatan">
                              <option value="" disabled selected>-- Pilih Jabatan --</option>
                              <option value="M">Jabatan 1</option>
                              <option value="F">Jabatan 2</option>
                            </select>
                            <label for="jabatan">Jabatan</label>
                          </div>

                          <div class="input-field col s3">
                            <select name="statusKepegawaian" id="statusKepegawaian">
                              <option value="" disabled selected>-- Pilih Status --</option>
                              <option value="M">Jabatan 1</option>
                              <option value="F">Jabatan 2</option>
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

@push('js')
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('.datepicker').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0"
      });
    });
  </script>
@endpush