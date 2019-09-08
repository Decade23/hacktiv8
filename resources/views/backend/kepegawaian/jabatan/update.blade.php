@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Update Kepegawaian - Jabatan ( {{ $dataDb->user_profile->nama }} | {{ $dataDb->user_profile->nip }} )</div>
                  @include('response')
                <form action="{{ route('kepegawaian.jabatan.edit', $dataDb->id) }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                 {{method_field('PUT')}}              
                          <div class="input-field col s12">
                            <select name="userSearch" id="userSearch" class="browser-default" data-placeholder="Ketik Email/Nama" disabled>
                              <option value=""></option>
                              <option value="{{ $dataDb->user_profile->id }}" @if(old('userSearch', $dataDb->user_profile->id) === $dataDb->user_profile->id) selected @endif>{{ $dataDb->user_profile->nama }} ({{ $dataDb->user_profile->nip }})</option>
                            </select>
                            <hr />
                            {{-- <label for="statusKepegawaian">Status Pegawai</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <select name="jabatan" id="jabatan" class="browser-default" data-placeholder="Jabatan">
                             
                             <option value=""></option>
                            <option value="Kepala Madrasah" @if ($dataDb->jabatan == 'Kepala Madrasah') selected @endif>Kepala Madrasah</option>
                            <option value="Kepala TU" @if ($dataDb->jabatan == 'Kepala TU') selected @endif>Kepala TU</option>
                            <option value="Waka Kurikulum" @if ($dataDb->jabatan == 'Waka Kurikulum') selected @endif>Waka Kurikulum</option>
                            <option value="Waka Kesiswaan" @if ($dataDb->jabatan == 'Waka Kesiswaan') selected @endif>Waka Kesiswaan</option>
                            <option value="Waka Humas" @if ($dataDb->jabatan == 'Waka Humas') selected @endif>Waka Humas</option>
                            <option value="Waka Sarana Prasarana" @if ($dataDb->jabatan == 'Waka Sarana Prasarana') selected @endif>Waka Sarana Prasarana</option>
                            <option value="Penyusun Laporan Keuangan" @if ($dataDb->jabatan == 'Penyusun Laporan Keuangan') selected @endif>Penyusun Laporan Keuangan</option>
                            <option value="Pengadministrasi Umum" @if ($dataDb->jabatan == 'Pengadministrasi Umum') selected @endif>Pengadministrasi Umum</option>
                            <option value="Pengadministrasi Kepegawaian"@if ($dataDb->jabatan == 'Pengadministrasi Kepegawaian') selected @endif>Pengadministrasi Kepegawaian</option>
                            <option value="Bendahara" @if ($dataDb->jabatan == 'Bendahara') selected @endif>Bendahara</option>
                            <option value="Kepala Perpustakaan" @if ($dataDb->jabatan == 'Kepala Perpustakaan') selected @endif>Kepala Perpustakaan</option>
                            <option value="Pengadministrasi Kesiswaan" @if ($dataDb->jabatan == 'Pengadministrasi Kesiswaan') selected @endif>Pengadministrasi Kesiswaan</option>
                            <option value="Pengadministrasi Laboran Dan Caraka" @if ($dataDb->jabatan == 'Pengadministrasi Laboran Dan Caraka') selected @endif>Pengadministrasi Laboran Dan Caraka</option>
                            <option value="Pengadministrasi Perlengkapan" @if ($dataDb->jabatan == 'Pengadministrasi Perlengkapan') selected @endif>Pengadministrasi Perlengkapan</option>
                            <option value="Petugas Kebersihan" @if ($dataDb->jabatan == 'Petugas Kebersihan') selected @endif>Petugas Kebersihan</option>
                            <option value="Keamanan" @if ($dataDb->jabatan == 'Keamanan') selected @endif>Keamanan</option>

                            </select>
                            {{-- <label for="mutasi">Mutasi</label> --}}
                            
                          </div>

                          <div class="input-field col s12">
                            <input id="golongan" name="golongan" type="text" class="validate" placeholder="" value="{{ $dataDb->golongan }}">
                            <label for="golongan">Golongan</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="tmt_jabatan" name="tmt_jabatan" type="text" value="{{ $dataDb->tmt_jabatan }}" class="validate" placeholder="">
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

                          {{-- hidden --}}
                          <input type="hidden" name="sk_file_jabatan_hidden" value="{{ $dataDb->sk_file_jabatan }}">

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