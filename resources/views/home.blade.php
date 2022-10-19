@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <div></div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box bg-dark">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Paket</span>
                                <span class="info-box-number">
                                        {{ $dataPaket }}
                                    <small></small>
                                </span>
                            </div>
                     </div>
                     
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box bg-dark">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Bangunan</span>
                                <span class="info-box-number">
                                      {{ $dataBangunan }}
                                    <small></small>
                                </span>
                            </div>
                     </div>
                     
                </div>
            </div>
        </div>
    </div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop