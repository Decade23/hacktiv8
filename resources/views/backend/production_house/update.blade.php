@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Update Production House ( {{ $dataDb->name }} )</div>
                  @include('response')
                <form action="{{ route('production_house.edit', $dataDb->id) }}" method="POST">
                  {!! csrf_field() !!}
                  {{method_field('PUT')}}
{{--                          <div class="input-field col s12">--}}
{{--                            <select name="userSearch" id="userSearch" class="browser-default" data-placeholder="Ketik Email/Nama" disabled>--}}
{{--                              <option value=""></option>--}}
{{--                              <option value="{{ $dataDb->user_profile->id }}" @if(old('userSearch', $dataDb->user_profile->id) === $dataDb->user_profile->id) selected @endif>{{ $dataDb->user_profile->nama }} ({{ $dataDb->user_profile->nip }})</option>--}}
{{--                            </select>--}}
{{--                            <hr />--}}
{{--                            --}}{{-- <label for="statusKepegawaian">Status Pegawai</label> --}}
{{--                          </div>--}}

                          <div class="input-field col s6">
                            <input id="name" name="name" type="text" class="validate" placeholder="Name" value="{{ $dataDb->name }}">
                            <label for="name">Name</label>
                          </div>

                          <div class="input-field col s12">
                            <a class="btn waves-effect waves-light" href="{{ url()->previous() }}">Back</a>
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
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

    {{--$('#userSearch').select2({--}}
    {{--  theme: "bootstrap",--}}
    {{--  placeholder: "Select",--}}
    {{--  width: '100%',--}}
    {{--  tags: true,--}}
    {{--  ajax: {--}}
    {{--      url: '{{route('production_house.ajax.select2')}}',--}}
    {{--      dataType: 'json',--}}
    {{--      delay: 250,--}}
    {{--      data: function (params) {--}}
    {{--          return {--}}
    {{--              term: params.term,--}}
    {{--              page: params.page,--}}
    {{--          };--}}
    {{--      },--}}
    {{--      processResults: function (data, params) {--}}

    {{--          params.page = params.page || 1;--}}

    {{--          return {--}}
    {{--              results: data.data,--}}
    {{--              pagination: {--}}
    {{--                  more: (params.page * data.per_page) < data.total--}}
    {{--              }--}}
    {{--          };--}}
    {{--      },--}}
    {{--      cache: true,--}}
    {{--  }--}}
    {{--  });--}}
    });
  </script>
@endpush