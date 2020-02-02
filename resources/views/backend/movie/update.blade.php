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
                        <h4 class="card-title">Update Form Movie ( {{ $dataDb->movie }} | {{ $dataDb->genre }} )</h4>
                     </div>

                     <form action="{{ route('movie.edit', $dataDb->id) }}" method="POST">
                     	{!! csrf_field() !!}
                     	{{method_field('PUT')}}
                          <div class="input-field col s12">
                            <input id="movie" name="movie" type="text" class="validate" value="{{ old('movie', $dataDb->movie) }}">
                            <label for="movie">Movie</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="genre" name="genre" type="text" class="validate" value="{{ old('genre', $dataDb->genre) }}">
                            <label for="genre">Genre</label>
                          </div>

                         <div class="input-field col s12">
                             <select name="phSearch" id="phSearch" class="browser-default" data-placeholder="Type Name Of Production House">
                                 <option value=""></option>
                                 <option value="{{ $dataDb->ProductionHouses->id }}" @if(old('phSearch', $dataDb->ProductionHouses->id) === $dataDb->ProductionHouses->id) selected @endif>{{ $dataDb->ProductionHouses->name }}</option>

                             </select>
                             <hr />
                             {{--                              <label for="phSearch">Production House</label>--}}
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
        $('#phSearch').select2({
            theme: "bootstrap",
            placeholder: "Select",
            width: '100%',
            tags: true,
            ajax: {
                url: '{{route('production_house.ajax.select2')}}',
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