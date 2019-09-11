@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Data Mutasi</div>
                  @include('response')
                  <div class="row">
            <div class="col s12">
              @if (Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                <a class="waves-effect waves-light btn-small" href="{{ route('mutasi.create') }}">Create</a>
              @endif
              
              <table id="table-mutasi" class="display nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Jenis Mutasi</th>
                    <th>Tanggal Mutasi</th>
                    <th>SK Mutasi</th>
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
      let table = $('#table-mutasi').DataTable({
         scrollY: 500,
         // scrollX: true,
         processing: true,
         serverSide: true,
         ajax: {
              url: '{!! route('mutasi.ajax.data') !!}',
              dataType: 'json'
          },
          columns: [
              {data: 'id', name: 'id', visible: false},
              {data: 'user_profile.nama', name: 'user_profile.nama'},
              {data: 'jenis_mutasi', name: 'jenis_mutasi'},
              {data: 'tanggal_mutasi', name: 'tanggal_mutasi'},
              {data: 'sk_mutasi', name: 'sk_mutasi', render: function(data, type, oObj){
                // console.log(oObj);
                return '<img src="'+data+'" alt="file ijazah" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; height:100px; cursor:pointer;" onClick=viewImage(\''+data.replace(/\\/g,'/')+'\')>';
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
      
      form.attr('action', '{{route('mutasi.delete')}}');
      $('#method').val('DELETE');
      $('#id').val(id);
      $('#hapus').modal('open');

    }

    function viewImage(url)
    //console.log(url);
    {
      $('#view_title').text('File SK Mutasi');
      $('#imgView').attr({
        src: url,
        alt: 'SK Mutasi'
      });
      $('#view_image').modal('open');
    }
  </script>
@endpush