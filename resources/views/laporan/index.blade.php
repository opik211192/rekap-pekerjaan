@extends('adminlte::page')

@section('title', 'Cetak Rekap Pekerjaan')

@section('content_header')
    <h1>Cetak Laporan Rekap Pekerjaan</h1>
@stop


@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush



@section('content')
   <div class="card col">
        {{-- <div class="card-header">Cetak Laporan Rekap Pekerjaan</div> --}}
        <div class="card-body">
            <form action="{{ route('laporan.cetak') }}" method="post">
                @csrf
                <div class="col-md-6 mb-3 d-flex flex-row">
                    <select class="form-control select2" name="filter_paket" id="filter_paket" required>
                        <option value="">--Cari Paket--</option>
                        @foreach ($pakets as $paket)
                            <option value="{{ $paket->id }}">{{ $paket->tahun_anggaran.' || '.$paket->name }}</option>
                        @endforeach
                    </select>
                    <button name="btnSearch" class="btn btn-sm btn-primary" data-toggle="Cetak"  formtarget="_blank" data-placement="top" title="Cetak"><i class="fas fa-print"></i></button>
                </div>
            </form>
        </div>
   </div>
@stop
