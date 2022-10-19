@extends('adminlte::page')

@section('title', 'Data Bangunan')

@section('content_header')
    <h1>Data Bangunan Rekap Pekerjaan</h1>
@stop

@section('styles2')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css"> 
    <link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header"><a href="{{ route('bangunan.create') }}" class="btn btn-sm btn-primary">Tambah</a></div>
        <div class="card-body">
            <div class="col-md-6 mb-3 d-flex flex-row">
                <select class="form-control select2" name="filter_paket" id="filter_paket" required>
                    <option value="">--Cari Paket--</option>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->id }}">{{ $paket->name }}</option>
                    @endforeach
                </select>
                &nbsp;
                <button id="btnSearch" name="btnSearch" type="button" class="btn btn-sm btn-info" data-toggle="Cari" data-placement="top" title="Cari"><i class="fas fa-search"></i></button>&nbsp;
                <button id="reset" name="reset" type="button" class="btn btn-sm btn-warning reset" data-toggle="Reset" data-placement="top" title="Reset"><i class="fas fa-undo"></i></button>
                
            </div>
            <table class="table table-hover" id="table-datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Bangunan</th>
                        <th>Tahun Anggaran</th>
                        <th>Nama Paket</th>
                        <th>Status Konstruksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    {{-- @foreach ($bangunans as $index => $bangunan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $bangunan->paket->tahun_anggaran }}</td>
                        <td>{{ $bangunan->paket->name }}</td>
                        <td>{{ $bangunan->name }}</td>
                        <td>
                            @if ($bangunan->status != 0)
                            <small class="badge badge-success">Terbangun Tahun {{ $bangunan->tahun_konstruksi }}</small>
                            @else
                            <small class="badge badge-danger">Belum Terbangun</small>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('bangunan.edit',  $bangunan) }}" class="btn btn-sm btn-info">Edit</a>&nbsp;
                                <form action="{{ route('bangunan.delete', $bangunan) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ini')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach --}}
            </table>
        </div>
    </div>
@stop

@push('scripts')
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  fill_datatable();
// /$('#table-datatable').DataTable().destroy();

  function fill_datatable(filter_paket = '') 
  {
      var table = $('#table-datatable').DataTable({
          processing: true,
          serverSide: true,
          searching: true,
          responsive: true,
          bAutowidth: false,
        columns: [
        { responsivePriority: 6 },
        { responsivePriority: 5 },
        { responsivePriority: 4 },
        { responsivePriority: 3 },
        { responsivePriority: 2 },
        { responsivePriority: 1 }
    ],

          ajax:{
            url: "{{ route('bangunan.index') }}",
            data: {filter_paket:filter_paket}
          },
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'paket.tahun_anggaran', name: 'paket.tahun_anggaran'},
              {data: 'paket.name', name: 'paket.name'},
              {data: 'status',
                  'render': function (data, type, row){
                      if (row.status != 0) {
                          return `<small class="badge badge-success">Terbangun Tahun ${row.tahun_konstruksi}</small>`
                      }else{
                          return '<small class="badge badge-danger">Belum Terbangun</small>'
                      }
                  }
              },
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true
              },
          ]
      });
      new $.fn.dataTable.FixedHeader( table );    
    }

    $('#btnSearch').click(function() {
        var filter_paket = $('#filter_paket').val();

        if (filter_paket != "") {
            $('#table-datatable').DataTable().destroy();
            fill_datatable(filter_paket);
        }else{
            alert('Pilih Paket Broo');
        }
        //console.log(filter_paket);
    });

    
    $('#reset').click(function(){
        $('#filter_paket').val('').trigger('change')
        $('#table-datatable').DataTable().destroy();
        fill_datatable();
        //console.log(e);
    });

});
  
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush