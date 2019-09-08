@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Form Kepegawaian - Jabatan</div>
                  @include('response')
                <form action="{{ route('kepegawaian.jabatan.store') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                          <div class="input-field col s12">
                            <select name="userSearch" id="userSearch" class="browser-default" data-placeholder="Ketik Email/Nama">
                              <option value=""></option>
                            </select>
                            <hr />
                            {{-- <label for="statusKepegawaian">Status Pegawai</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <select name="jabatan" id="jabatan" class="browser-default" data-placeholder="Jabatan">
                              <option value=""selected></option>
                              <option value="Kepala Madrasah">Kepala Madrasah</option>
                              <option value="Kepala TU">Kepala TU</option>
                              <option value="Waka Kurikulum">Waka Kurikulum</option>
                              <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                              <option value="Waka Humas">Waka Humas</option>
                              <option value="Waka sarana prasarana">Waka Sarana Prasarana</option>
                              <option value="Penyusun Laporan Keuangan">Penyusun Laporan Keuangan</option>
                              <option value="Pengadministrasi Umum">Pengadministrasi Umum</option>
                              <option value="Pengadministrasi Kepegawaian">Pengadministrasi Kepegawaian</option>
                              <option value="Bendahara">Bendahara</option>
                              <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                              <option value="Pengadministrasi Kesiswaan">Pengadministrasi Kesiswaan</option>
                              <option value="Pengadministrasi Laboran Dan Caraka">Pengadministrasi Laboran Dan Caraka</option>
                              <option value="Pengadministrasi Perlengkapan">Pengadministrasi Perlengkapan</option>
                              <option value="Petugas Kebersihan">Petugas Kebersihan</option>
                              <option value="Keamanan">Keamanan</option>
                            </select>
                             <hr />
                            {{-- <label for="mutasi">Mutasi</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <input id="golongan" name="golongan" type="text" class="validate" placeholder="">
                            <label for="golongan">Golongan</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="tmt_jabatan" name="tmt_jabatan" type="text" class="validate" placeholder="">
                            <label for="golongan">TMT Jabatan</label>
                          </div>

                          <div class="col m12 s12 file-field input-field">
                            <div class="btn float-right">
                              <span>SK File Jabatan</span>
                              <input type="file" id="sk_file_jabatan" name="sk_file_jabatan">
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
      
      $('#tanggal_mutasi, #tmt_jabatan').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0",
        autoclose:true,
      });

      $('#jabatan').select2({
          theme: "bootstrap",
          placeholder: "Select",
          width: '100%',
      });

      $('#userSearch').select2({
        theme: "bootstrap",
        placeholder: "Select",
        width: '100%',
        tags: true,
        ajax: {
            url: '{{route('kepegawaian.jabatan.ajax.select2')}}',
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
    });
  </script>
@endpush