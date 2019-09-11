@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Data Kepegawaian - Pangkat</div>
                  @include('response')
                  <div class="row">
            <div class="col s12">
              @if (Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                <a class="waves-effect waves-light btn-small" href="{{ route('kepegawaian.pangkat.create') }}">Create</a>
              @endif
              <table id="table-kepegawaian-pangkat" class="display nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Pangkat</th>
                    <th>Golongan</th>
                    <th>Nomor SK</th>
                    <th>Tanggal SK</th>
                    <th>SK File Pangkat</th>
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
      let table = $('#table-kepegawaian-pangkat').DataTable({
         scrollY: 500,
         // scrollX: true,
         processing: true,
         serverSide: true,
         ajax: {
              url: '{!! route('kepegawaian.pangkat.ajax.data') !!}',
              dataType: 'json'
          },
          columns: [
              {data: 'id', name: 'id', visible: false},
              {data: 'user_profile.nama', name: 'user_profile.nama'},
              {data: 'pangkat', name: 'pangkat'},
              {data: 'golongan', name: 'golongan'},
              {data: 'nomor_sk', name: 'nomor_sk'},
              {data: 'tanggal_sk', name: 'tanggal_sk'},
              {data: 'sk_file_pangkat', name: 'sk_file_pangkat'},
              
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
      
      form.attr('action', '{{route('kepegawaian.pangkat.delete')}}');
      $('#method').val('DELETE');
      $('#id').val(id);
      $('#hapus').modal('open');

    }

    function viewImage(url)
    //console.log(url);
    {
      $('#view_title').text('File SK Pangkat');
      $('#imgView').attr({
        src: url,
        alt: 'SK File Pangkat'
      });
      $('#view_image').modal('open');
    }
  </script>
@endpush