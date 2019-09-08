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
                        {{-- <h4 class="card-title">{{ $dataDb->nama }} | {{ $dataDb->nip }}</h4> --}}
                        <table>
                          <tr>
                            <td>User / NIP</td>
                            <td>{{ $dataDb->user_profile->nama }} ({{ $dataDb->user_profile->nama }})</td> 
                          </tr>
                          <tr>
                            <td>Jabatan</td>
                            <td>{{ $dataDb->jabatan }}</td> 
                          </tr>
                          <tr>
                            <td>Golongan</td>
                            <td>{{ $dataDb->golongan }}</td> 
                          </tr>
                          <tr>
                            <td>TMT Jabatan</td>
                            <td>{{ $dataDb->tmt_jabatan }}</td> 
                          </tr>
                          <tr>
                            <td>SK File Jabatan</td>
                            <td><img src="{{ url($dataDb->sk_file_jabatan) }}"  style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 350px; height:550px; cursor:pointer;"></td> 
                          </tr>
                        </table>
                        <div class="input-field col s12">
                          <a class="btn waves-effect waves-light" href="{{ route('kepegawaian.jabatan.index') }}">Back</a>
                          @if (Auth::user()->roles_id == 4 || Auth::user()->roles_id == 3 || Auth::user()->roles_id == 1)
                            <a class="btn cyan waves-effect waves-light right" href="{{ route('kepegawaian.jabatan.update',$dataDb->id) }}">Update</a>
                          @endif
                          
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