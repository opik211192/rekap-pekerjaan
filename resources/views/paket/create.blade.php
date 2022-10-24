@extends('adminlte::page')

@section('title', 'Tambah Paket')

@section('content_header')
    <h1>Tambah Paket Rekap Pekerjaan</h1>
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
   <div class="card col-sm-6">
        {{-- <div class="card-header">Tambah Paket</div> --}}
        <div class="card-body">
            <form action="{{ route('paket.create') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="tahun_anggaran">Tahun Anggaran</label>
                    {{-- <input type="date" class="form-control" id="tahun_anggaran" value="{{ old('tahun_anggaran') }}" name="tahun_anggaran" required> --}}
                    <select name="tahun_anggaran" id="tahun_anggaran" class="form-control select2" required>
                        <option value="" selected disabled>Pilih Tahun</option>
                        @for ($i = 1980; $i <= date('Y'); $i++)
                            <option value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                    </select>
                    @error('tahun_anggaran')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="name">Nama Paket</label>
                    <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" required>
                    @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="no_kontrak">No. Kontrak</label>
                    <input type="text" class="form-control" id="no_kontrak" value="{{ old('no_kontrak') }}" name="no_kontrak">
                </div>

                <div class="form-group row">
                    <label for="tgl_kontrak">Tanggal Kontrak</label>
                    <input type="date" class="form-control" id="tgl_kontrak" value="{{ old('tgl_kontrak') }}" name="tgl_kontrak">
                </div>

                <div class="form-group row">
                    <label for="penyedia_jasa">Penyedia Jasa</label>
                    <input type="text" class="form-control" id="penyedia_jasa" value="{{ old('penyedia_jasa') }}" name="penyedia_jasa">
                </div>

                <button class="btn btn-sm btn-primary row">Simpan</button>
            </form>
        </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop