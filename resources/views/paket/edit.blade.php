@extends('adminlte::page')

@section('title', 'Edit Paket')

@section('content_header')
    <h1>Edit Paket Rekap Pekerjaan</h1>
@stop

@section('content')
   <div class="card col-sm-6">
        {{-- <div class="card-header">Edit Paket</div> --}}
        <div class="card-body">
            <form action="{{ route('paket.edit', $paket) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="tahun_anggaran">Tahun Anggaran</label>
                    {{-- <input type="date" class="form-control" id="tahun_anggaran" value="{{ old('tahun_anggaran') ?? $paket->tahun_anggaran }}" name="tahun_anggaran" required> --}}
                    <select name="tahun_anggaran" id="tahun_anggaran" class="form-control" required>
                        <option value="" selected disabled>Pilih Tahun</option>
                        @for ($i = 1980; $i <= date('Y'); $i++)
                            <option {{ $paket->tahun_anggaran == $i ? 'selected' : '' }} value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                    </select>
                    @error('tahun_anggaran')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="name">Nama Paket</label>
                    <input type="text" class="form-control" id="name" value="{{ old('name') ?? $paket->name }}" name="name" required>
                    @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                </div>

                <button class="btn btn-sm btn-primary row">Update</button>
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