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
                <form action="{{ route('mutasi.store') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                          <div class="input-field col s12">
                            <select name="userSearch" id="userSearch" class="browser-default" data-placeholder="Ketik Email/Nama">
                              <option value=""></option>
                            </select>
                            <hr />
                            {{-- <label for="statusKepegawaian">Status Pegawai</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <select name="jenis_mutasi" id="jenis_mutasi" class="browser-default" data-placeholder="Jenis Mutasi">
                              <option value="" disabled selected>-- Pilih --</option>
                              <option value="mutasi masuk">Mutasi Masuk</option>
                              <option value="mutasi keluar">Mutasi Keluar</option>
                              <option value="pindah antar instansi">Pindah Antar Instansi</option>
                              <option value="pensiun">Pensiun</option>
                              <option value="wafat">Wafat</option>
                            </select>
                            {{-- <label for="mutasi">Mutasi</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <input id="tanggal_mutasi" name="tanggal_mutasi" type="text" class="validate" placeholder="Tanggal Mutasi">
                            <label for="tanggal_mutasi">Tanggal Mutasi</label>
                          </div>

                          <div class="col m12 s12 file-field input-field">
                            <div class="btn float-right">
                              <span>SK Mutasi</span>
                              <input type="file" id="sk_mutasi" name="sk_mutasi">
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
      
      $('#tanggal_mutasi').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0",
        autoclose:true,
      });

      $('#jenis_mutasi').select2({
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
            url: '{{route('mutasi.ajax.select2')}}',
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