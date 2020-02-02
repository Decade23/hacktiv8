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
                        <table>
                          <tr>
                            <td>Name Of Production House</td>
                              <td><b><u>{{ $dataDb->name }}</u></b></td>
                          </tr>

                        </table>
                        <div class="input-field col s12">
                          <a class="btn waves-effect waves-light" href="{{ route('production_house.index') }}">Back</a>
                             <a class="btn cyan waves-effect waves-light right" href="{{ route('production_house.update',$dataDb->id) }}">Update</a>

                        </div>
                     </div>
                        
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
  
@endsection

@push('css')
@endpush

@push('js')
 
@endpush