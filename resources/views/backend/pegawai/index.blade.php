@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Data Pegawai</div>
                  @include('response')
                  <div class="row">
            <div class="col s12">
              <a class="waves-effect waves-light btn-small" href="{{ route('pegawai.create') }}">Create</a>
              <table id="table-pegawai" class="display nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Kawin</th>
                    <th>Alamat</th>
                    <th>No Phone</th>
                    <th>Status Kepegawaian</th>
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
      let table = $('#table-pegawai').DataTable({
         scrollY: 200,
         scrollX: true,
         processing: true,
         serverSide: true,
         ajax: {
              url: '{!! route('pegawai.ajax.data') !!}',
              dataType: 'json'
          },
          columns: [
              {data: 'id', name: 'id', visible: false},
              {data: 'nip', name: 'nip'},
              {data: 'nama', name: 'nama'},
              {data: 'tempat_lahir', name: 'tempat_lahir'},
              {data: 'tanggal_lahir', name: 'tanggal_lahir'},
              {data: 'jenis_kelamin', name: 'jenis_kelamin'},
              {data: 'status_kawin', name: 'status_kawin'},
              {data: 'alamat', name: 'alamat'},
              {data: 'no_telepon', name: 'no_telepon'},
              {data: 'status_kepegawaian', name: 'status_kepegawaian'},

              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action'},
              
              // {
              //     data: 'action', name: 'action', orderable: false, searchable: false,
              //     fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              //         $("a", nTd).tooltip({container: 'body'});
              //     }
              // }
          ],
      })

      // let table = $('#table-pegawai').DataTable({
      //       aaSorting: [[0, 'desc']],
      //       iDisplayLength: 25,
      //       "scrollY": 200,
      //       "scrollX": true
      //       //stateSave: true,
      //       responsive: true,
      //       fixedHeader: true,
      //       processing: true,
      //       serverSide: true,
      //       dom: "<'dt-panelmenu clearfix'<'row'<'col-sm-2'B><'col-sm-4'l><'col-sm-6'f>>>" +
      //           "<'row'<'col-sm-12'tr>>" +
      //           "<'dt-panelfooter clearfix'<'row'<'col-sm-5'i><'col-sm-7'p>>>",
      //       pagingType: "full_numbers",
      //       ajax: {
      //           url: '{!! route('pegawai.ajax.data') !!}',
      //           dataType: 'json'
      //       },
      //       columns: [
      //           {data: 'id', name: 'id', visible: false},
      //           {
      //               data: 'checkbox', name: 'checkbox', orderable: false, searchable: false,
      //               checkboxes: true
      //           },
      //           {data: 'title', name: 'title'},
      //           {data: 'status', name: 'status'},

      //           {data: 'created_at', name: 'created_at'},
      //           {
      //               data: 'action', name: 'action', orderable: false, searchable: false,
      //               fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
      //                   $("a", nTd).tooltip({container: 'body'});
      //               }
      //           }
      //       ],
      //       columnDefs: [
      //           {
      //               targets: 1,
      //               className: 'text-center'
      //           },
      //       ],
      //       buttons: [
      //           {
      //               extend: 'colvis',
      //               text: '<i class="fa fa-columns"></i> @lang('auth.index_column')',
      //               columns: '1, 2, 3, 4, 5'
      //           }
      //       ],
      //       select: 'multi'
      //   });
    });
  </script>
@endpush