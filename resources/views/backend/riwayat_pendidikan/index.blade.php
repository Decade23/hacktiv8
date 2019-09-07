@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Data Riwayat Pendidikan</div>
                  @include('response')
                  <div class="row">
            <div class="col s12">
              <a class="waves-effect waves-light btn-small" href="{{ route('riwayat_pendidikan.create') }}">Create</a>
              <table id="table-riwayat-pendidikan" class="display nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Tingkat Pendidikan</th>
                    <th>Nama Sekolah</th>
                    <th>Alamat Sekolah</th>
                    <th>Jurusan</th>
                    <th>Nomor Ijazah</th>
                    <th>Tanggal Ijazah</th>
                    <th>File Ijazah</th>
                    <th>File Transkrip Nilai</th>
                    <th>File Sertifikat Pendidikan</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
                
              </table>
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
  <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/responsive.dataTables.min.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/select.dataTables.min.css') }}"> --}}
@endpush

@push('js')
  <script src="{{ asset('js/datatables/dataTables.responsive.min.js') }}"></script>
  {{-- <script src="{{ asset('js/datatables/dataTables.select.min.js') }}"></script> --}}
  <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      let table = $('#table-riwayat-pendidikan').DataTable({
         scrollY: 500,
         scrollX: true,
         processing: true,
         serverSide: true,
         ajax: {
              url: '{!! route('riwayat_pendidikan.ajax.data') !!}',
              dataType: 'json'
          },
          columns: [
              {data: 'id', name: 'id', visible: false},
              {data: 'user_profile.nama', name: 'user_profile.nama'},
              {data: 'tingkat_pendidikan', name: 'tingkat_pendidikan'},
              {data: 'nama_sekolah', name: 'nama_sekolah'},
              {data: 'alamat_sekolah', name: 'alamat_sekolah'},
              {data: 'jurusan', name: 'jurusan'},
              {data: 'no_ijazah', name: 'no_ijazah'},
              {data: 'tanggal_ijazah', name: 'tanggal_ijazah'},
              {data: 'file_ijazah', name: 'file_ijazah', render: function(data, type, oObj){
                // console.log(oObj);
                return '<img src="'+data+'" alt="file ijazah" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; height:100px; cursor:pointer;" onClick=viewImage(\''+data.replace(/\\/g,'/')+'\')>';
              }},
              {data: 'file_transkip_ijazah', name: 'file_transkip_ijazah', render: function(data, type, oObj){
                // console.log(oObj);
                return '<img src="'+data+'" alt="file transkip ijazah" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; height:100px; cursor:pointer;" onClick=viewImage(\''+data.replace(/\\/g,'/')+'\')>';
              }},
              {data: 'file_sertifikat_pendidik', name: 'file_sertifikat_pendidik', render: function(data, type, oObj){
                // console.log(oObj);
                return '<img src="'+data+'" alt="file sertifikat pendidik" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; height:100px; cursor:pointer;" onClick=viewImage(\''+data.replace(/\\/g,'/')+'\')>';
              }},
              
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action'}
          ],
      })
    });

      $(function() {
            $('.modal').modal();
        //     $('#modal3').modal('open');
        //     $('#modal3').modal('close');
      });

    function hapusData(id=null)
    {
      let form = $('#delete-form').closest('form');
      
      form.attr('action', '{{route('riwayat_pendidikan.delete')}}');
      $('#method').val('DELETE');
      $('#id').val(id);
      $('#hapus').modal('open');

    }

    function viewImage(url)
    //console.log(url);
    {
      $('#view_title').text('File Ijazah');
      $('#imgView').attr({
        src: url,
        alt: 'Ijazah'
      });
      $('#view_image').modal('open');
    }
  </script>
@endpush