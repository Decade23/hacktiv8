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
                            <td>Foto Pegawai</td>
                            <td><img src="{{ url($dataDb->photo) }}"  style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 177px; height:236px; cursor:pointer;"></td> 
                          </tr>
                          <tr>
                            <td>NIP/PEG.ID</td>
                            <td>{{ $dataDb->nip }}</td> 
                          </tr>
                          <tr>
                            <td>Nomor KTP</td>
                            <td>{{ $dataDb->ktp }}</td> 
                          </tr>
                          <tr>
                            <td>Nama Pegawai</td>
                            <td>{{ $dataDb->nama }}</td> 
                          </tr>
                          <tr>
                            <td>Tempat Lahir</td>
                            <td>{{ $dataDb->tanggal_lahir }}</td> 
                          </tr>
                          <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{ $dataDb->jenis_kelamin }}</td> 
                          </tr>
                          <tr>
                            <td>Status Kawin</td>
                            <td>{{ $dataDb->status_kawin }}</td> 
                          </tr>
                          <tr>
                            <td>Status Kepegawaian</td>
                            <td>{{ $dataDb->status_kepegawaian }}</td> 
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>{{ $dataDb->alamat }}</td> 
                          </tr>
                          <tr>
                            <td>No Telepon</td>
                            <td>{{ $dataDb->no_telepon }}</td> 
                          </tr>
                        </table>
                        <div class="input-field col s12">
                          <a class="btn waves-effect waves-light" href="{{ route('pegawai.index') }}">Back</a>
                          @if (Auth::user()->roles_id == 4 || Auth::user()->roles_id == 3 || Auth::user()->roles_id == 1)
                            {{-- <a class="btn cyan waves-effect waves-light right" href="{{ route('pegawai.update',$dataDb->id) }}">Update</a> --}}
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
      
      $('#tanggal_lahir').datepicker({
        format : 'yyyy-mm-dd',
        changeMonth: true,
        changeYear : true,
        yearRange  : "-100:+0",
        autoclose:true,
      });

      $('#statusKawin, #jenis_kelamin, #statusKepegawaian').select2({
          theme: "bootstrap",
          placeholder: "Select",
          width: '100%',
          // containerCssClass: ':all:',
      });
    });
  </script>
@endpush