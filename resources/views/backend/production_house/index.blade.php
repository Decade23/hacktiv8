@extends('layouts.index')

@section('content')
<div id="main">
  <div class="row">
    <div class="col s12">
        <div class="container">
            <div class="card">
                <div class="card-content">
                  <div class="card-title">Data Production House</div>
                  @include('response')
                  <div class="row">
            <div class="col s12">
                <a class="waves-effect waves-light btn-small" href="{{ route('production_house.create') }}">Create</a>
              <table id="table-production-house" class="display nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
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
      let table = $('#table-production-house').DataTable({
         scrollY: 500,
         // scrollX: true,
         processing: true,
         serverSide: true,
         ajax: {
              url: '{!! route('production_house.ajax.data') !!}',
              dataType: 'json'
          },
          columns: [
              {data: 'id', name: 'id', visible: false},
              {data: 'name', name: 'name'},
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
      
      form.attr('action', '{{route('production_house.delete')}}');
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