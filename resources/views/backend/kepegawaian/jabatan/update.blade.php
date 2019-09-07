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
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="kepala sekolah" @if ($dataDb->jabatan == 'kepala sekolah') selected @endif>Kepala Sekolah</option>
                              <option value="tu" @if ($dataDb->jabatan == 'tu') selected @endif>TU</option>
                              <option value="waket kurikulum" @if ($dataDb->jabatan == 'waket kurikulum') selected @endif>Waket Kurikulum</option>
                              <option value="kesiswaan" @if ($dataDb->jabatan == 'kesiswaan') selected @endif>Kesiswaan</option>
                              <option value="humas" @if ($dataDb->jabatan == 'humas') selected @endif>Humas</option>
                              <option value="sarana prasarana" @if ($dataDb->jabatan == 'sarana prasarana') selected @endif>Sarana Prasarana</option>
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
      
      $('#tanggal_mutasi').datepicker({
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