@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Form Riwayat Pendidikan</div>
                  @include('response')
                <form action="{{ route('riwayat_pendidikan.store') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                          <div class="input-field col s12">
                            <select name="userSearch" id="userSearch" class="browser-default" data-placeholder="Ketik Email/Nama">
                              <option value=""></option>
                            </select>
                            <hr />
                            {{-- <label for="statusKepegawaian">Status Pegawai</label> --}}
                          </div>

                          {{-- <div class="input-field col s12">
                            <input id="tingkatPendidikan" name="tingkatPendidikan" type="text" class="validate">
                            <label for="tingkatPendidikan">Tingkat Pendidikan</label>
                          </div> --}}

                          <div class="input-field col s12">
                           <select name="tingkatPendidikan" id="tingkatPendidikan" class="browser-default" data-placeholder="Tingkat Pendidikan">
                            <option value="" selected></option>
                            <option value="SMA/MA">SMA/MA</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            </select>
                             <hr />
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
                            <label for="noIjazah">Nomor Ijazah</label>
                          </div>

                          <div class="input-field col s6">
                            <input id="tanggalIjazah" name="tanggalIjazah" type="text" class="validate" placeholder="Tanggal Ijazah">
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
      
      $('#tanggalIjazah').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0",
        autoclose:true,
      });

        $('#userSearch').select2({
          theme: "bootstrap",
          placeholder: "Select",
          width: '100%',
          tags: true,
          ajax: {
              url: '{{route('riwayat_pendidikan.ajax.select2')}}',
              dataType: 'json',
              delay: 250,
              data: function (params) {
                  return {
                      term: params.term,
                      page: params.page,
                  };
              },
              processResults: function (data, params) {

                  params.page = params.page || 1;

                  return {
                      results: data.data,
                      pagination: {
                          more: (params.page * data.per_page) < data.total
                      }
                  };
              },
              cache: true,
          }
      });
        $('#tingkatPendidikan').select2({
          theme: "bootstrap",
          placeholder: "Select",
          width: '100%',
          // containerCssClass: ':all:',
      });
    });
  </script>
@endpush