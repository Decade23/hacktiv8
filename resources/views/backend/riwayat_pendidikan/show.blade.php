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
                            <td>Tingkat Pendidikan</td>
                            <td>{{ $dataDb->tingkat_pendidikan }}</td> 
                          </tr>
                          <tr>
                            <td>Nama Sekolah</td>
                            <td>{{ $dataDb->nama_sekolah }}</td> 
                          </tr>
                          <tr>
                            <td>Alamat Sekolah</td>
                            <td>{{ $dataDb->alamat_sekolah }}</td> 
                          </tr>
                          <tr>
                            <td>Jurusan</td>
                            <td>{{ $dataDb->jurusan }}</td> 
                          </tr>
                          <tr>
                            <td>Nomor Ijazah</td>
                            <td>{{ $dataDb->no_ijazah }}</td> 
                          </tr>
                          <tr>
                            <td>Tanggal Ijazah</td>
                            <td>{{ $dataDb->tanggal_ijazah }}</td> 
                          </tr>
                          <tr>
                            <td>File Ijazah</td>
                            <td><img src="{{ url($dataDb->file_ijazah) }}"  style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 350px; height:550px; cursor:pointer;"></td> 
                          </tr>
                          <tr>
                            <td>File Transkip Ijazah</td>
                            <td><img src="{{ url($dataDb->file_transkip_ijazah) }}"  style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 350px; height:550px; cursor:pointer;"></td> 
                          </tr>
                          <tr>
                            <td>File Sertifikat Pendidik</td>
                            <td><img src="{{ url($dataDb->file_sertifikat_pendidik) }}"  style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 350px; height:550px; cursor:pointer;"></td> 
                          </tr>
                        </table>
                        <div class="input-field col s12">
                          <a class="btn waves-effect waves-light" href="{{ route('riwayat_pendidikan.index') }}">Back</a>
                          @if (Auth::user()->roles_id == 4 || Auth::user()->roles_id == 3 || Auth::user()->roles_id == 1)
                            <a class="btn cyan waves-effect waves-light right" href="{{ route('riwayat_pendidikan.update',$dataDb->id) }}">Update</a>
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