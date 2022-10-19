@extends('adminlte::page')

@section('title', 'Data Paket')

@section('content_header')
    <h1>Data Paket Rekap Pekerjaan</h1>
@stop

@section('styles2')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">    
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header"><a href="{{ route('paket.create') }}" class="btn btn-sm btn-primary">Tambah</a></div>
        <div class="card-body">
            <table class="table table-hover" id="table-datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tahun Anggaran</th>
                        <th>Nama Paket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- @foreach ($pakets as $index => $paket)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $paket->tahun_anggaran }}</td>
                        <td>{{ $paket->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('paket.edit', $paket) }}" class="btn btn-sm btn-info">Edit</a>&nbsp;
                                <form action="{{ route('paket.delete', $paket) }}" method="post">
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
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(function () {
  
  var table = $('#table-datatable').DataTable({
      processing: true,
      serverSide: true,
      bAutowidth: false,
      ajax: "{{ route('paket.index') }}",
      columns: [
          {data: 'id', name: 'id'},
          {data: 'tahun_anggaran', name: 'tahun_anggaran'},
          {data: 'name', name: 'name'},
          {
              data: 'action', 
              name: 'action', 
              orderable: true, 
              searchable: true
          },
      ]
  });    
});
</script>
@endpush