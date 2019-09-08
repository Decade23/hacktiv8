@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Form Kepegawaian - Pangkat</div>
                  @include('response')
                <form action="{{ route('kepegawaian.pangkat.store') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                          <div class="input-field col s12">
                            <select name="userSearch" id="userSearch" class="browser-default" data-placeholder="Ketik Email/Nama">
                              <option value=""></option>
                            </select>
                            <hr />
                            {{-- <label for="statusKepegawaian">Status Pegawai</label> --}}
                          </div>

                          <div class="input-field col s12">
                            <input id="pangkat" name="pangkat" type="text" class="validate" placeholder="">
                            <label for="pangkat">Pangkat</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="golongan" name="golongan" type="text" class="validate" placeholder="">
                            <label for="golongan">Golongan</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="nomor_sk" name="nomor_sk" type="text" class="validate" placeholder="">
                            <label for="nomor_sk">Nomor SK</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="tanggal_sk" name="tanggal_sk" type="text" class="validate" placeholder="Tanggal SK">
                            <label for="tanggal_sk">Tanggal SK</label>
                          </div>

                          <div class="col m12 s12 file-field input-field">
                            <div class="btn float-right">
                              <span>SK File Pangkat</span>
                              <input type="file" id="sk_file_pangkat" name="sk_file_pangkat">
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
      
      $('#tanggal_sk').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0",
        autoclose:true,
      });

      // $('#tanggal_sk').select2({
      //     theme: "bootstrap",
      //     placeholder: "Select",
      //     width: '100%',
      // });

      $('#userSearch').select2({
        theme: "bootstrap",
        placeholder: "Select",
        width: '100%',
        tags: true,
        ajax: {
            url: '{{route('kepegawaian.pangkat.ajax.select2')}}',
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