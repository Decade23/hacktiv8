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
              <a class="waves-effect waves-light btn-small" href="{{ route('mutasi.create') }}">Create</a>
              <table id="table-riwayat-pendidikan" class="display nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Jenis Mutasi</th>
                    <th>Tanggal Mutasi</th>
                    <th>SK Mutasi</th>
                    <th>Created At</th>
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
         scrollY: 200,
         //scrollX: true,
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
              {data: 'tanggal_ijazah', name: 'tanggal_ijazah'},
              
              {data: 'created_at', name: 'created_at'},
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