@extends('adminlte::page')

@section('title', 'Tambah Bangunan')

@section('content_header')
    <h1>Tambah Bangunan Rekap Pekerjaan</h1>
@stop


@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .cap   { text-transform: capitalize; }
    </style>
@endsection



@section('content')
   <div class="card col-sm-8">
        {{-- <div class="card-header">Tambah Bangunan</div> --}}
        <div class="card-body">
            <form action="{{ route('bangunan.create') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="paket_id">Nama Paket</label>
                    <select name="paket_id" id="paket_id" class="form-control select2" required>
                        <option disabled selected>--Pilih Paket--</option>
                        @foreach ($pakets as $paket)
                            <option value="{{ $paket->id }}">{{ $paket->name." || Tahun Anggaran ". $paket->tahun_anggaran }}</option>
                        @endforeach
                    </select>
                    @error('paket_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="name">Nama Bangunan</label>
                    <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" required>
                    @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group row">
                    <label for="provinsi">Provinsi</label>
                    
                        <select class="form-control" name="province_id" id="province_id" required>
                            <option>--Pilih Salah Satu--</option>
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    
                </div>
                <div class="form-group row">
                    <label for="kota">Kabupaten / Kota</label>
                    
                        <select class="form-control" name="city_id" id="city_id" required>
                            <option>--Pilih Salah Satu--</option>
                        </select>
                   
                </div>
                <div class="form-group row">
                    <label for="kecamatan">Kecamatan</label>
                    
                        <select class="form-control" name="district_id" id="district_id" required>
                            <option>--Pilih Salah Satu--</option>
                        </select>
                   
                </div>
                <div class="form-group row">
                    <label for="desa">Desa</label>
                    
                        <select class="form-control" name="village_id" id="village_id" required>
                            <option>--Pilih Salah Satu--</option>
                        </select>
                    
                </div>
                <div class="form-group">
                    <label>Status Konstruksi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="0" checked>
                        <label for="status1" class="form-check-label">Belum Terbangun</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="1">
                        <label for="status2" class="form-check-label">Terbangun</label>                        
                    </div>
                    <div>
                        
                        <label id="tahun_konstruksi_label" class="mt-2" for="tahun_konstruksi" hidden>Tahun Terbangun</label>
                        <select name="tahun_konstruksi" id="tahun_konstruksi" class="form-control col-sm-4" hidden>
                            <option value="" selected disabled>--Pilih Tahun--</option>
                            @for ($i = 1980; $i <= date('Y'); $i++)
                                <option value="{{ $i }}"> {{ $i }} </option>
                            @endfor
                        </select>
                        @error('tahun_konstruksi')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                    </div>

                </div>
                
                <button id="btnSubmit" class="btn btn-sm btn-primary row">Simpan</button>
            </form>
        </div>
   </div>
@stop

@section('js')
    {{-- <script>
        if($('#status1:checked').length){
            $('#tahun_konstruksi_label').attr('hidden',true);
            $('#tahun_konstruksi').attr('hidden',true); // On Load, should it be read only?
        }

        $("#status1").change(function() {
            if(this.checked) {
                $('#tahun_konstruksi_label').attr('hidden',true);
                $('#tahun_konstruksi').attr('hidden', true);
                $("#tahun_konstruksi").val("0"); 
            }
        });

       $("#status2").change(function() {
        if(this.checked) {
            $('#tahun_konstruksi_label').attr('hidden',false);
            $('#tahun_konstruksi').attr('hidden', false);            
        }

        $('#btnSubmit').on('click', function(){
            if($("#tahun_konstruksi").val() == null){
                alert('Tahun nya diisi broo !!!');
                return false;                   
                
            }else{
                return;
            }
        })
    });
    </script> --}}
    <script>
    $(document).ready(function(){

        
        $('input[type=radio][name=status]').change(function(){
            if(this.value == '0'){
                $('#tahun_konstruksi_label').attr('hidden',true);
                $('#tahun_konstruksi').attr('hidden',true); // On Load, should it be read only?
            }else if(this.value == '1'){
                $('#tahun_konstruksi').val('');
                $('#tahun_konstruksi_label').attr('hidden',false);
                $('#tahun_konstruksi').attr('hidden',false); 
            }
        });
    
        $('#btnSubmit').on('click', function(){
                if ($('#tahun_konstruksi').is(':hidden')) {
                    return true;
                }else{
                    if ($('#tahun_konstruksi').val() == null) {
                        alert('Tahun di isi broo...');
                        return false;
                    }
    
                    return true;
                }
        });
    })
    
</script>
@stop
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();

            function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function (data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>--Pilih Salah Satu--</option>');

                    $.each(data, function (key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function () {
            $('#province_id').on('change', function () {
                onChangeSelect('{{ route("cities") }}', $(this).val(), 'city_id');
            });
            $('#city_id').on('change', function () {
                onChangeSelect('{{ route("districts") }}', $(this).val(), 'district_id');
            })
            $('#district_id').on('change', function () {
                onChangeSelect('{{ route("villages") }}', $(this).val(), 'village_id');
            })
        });


        });
    </script>
@endpush

