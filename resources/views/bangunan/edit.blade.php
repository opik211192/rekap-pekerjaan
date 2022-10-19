@extends('adminlte::page')

@section('title', 'Edit Bangunan')

@section('content_header')
    <h1>Edit Bangunan Rekap Pekerjaan</h1>
@stop

@section('content')
   <div class="card col-sm-8">
        {{-- <div class="card-header">Edit Bangunan</div> --}}
        <div class="card-body">
            <form action="{{ route('bangunan.edit', $bangunan) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="paket_id">Nama Paket</label>
                    <select name="paket_id" id="paket_id" class="form-control">
                        <option disabled selected>--Pilih Paket--</option>
                        @foreach ($pakets as $paket)
                            <option {{ $bangunan->paket_id == $paket->id ? 'selected' : '' }} value="{{ $paket->id }}">{{ $paket->name.' || '.$paket->tahun_anggaran }}</option>
                        @endforeach
                    </select>
                    @error('paket_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="name">Nama Bangunan</label>
                    <input type="text" class="form-control" id="name" value="{{ old('name') ?? $bangunan->name }}" name="name" required>
                    @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label>Status Konstruksi</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="0" {{ (old('status') ?? $bangunan->status) == '0' ? 'checked' : '' }}>
                        <label for="status1" class="form-check-label">Belum Terbangun</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="1" {{ (old('status') ?? $bangunan->status) == '1' ? 'checked' : '' }}>
                        <label for="status2" class="form-check-label">Terbangun</label>                        
                    </div>
                    <div>
                        <label id="tahun_konstruksi_label" class="mt-2" for="tahun_konstruksi">Tahun Terbangun</label>
                        <select name="tahun_konstruksi" id="tahun_konstruksi" class="form-control col-sm-4">
                            <option value="" selected disabled>--Pilih Tahun--</option>
                            @for ($i = 1980; $i <= date('Y'); $i++)
                                <option {{ $bangunan->tahun_konstruksi == $i ? 'selected' : '' }} value="{{ $i }}"> {{ $i }} </option>
                            @endfor
                        </select>
                    </div>

                </div>

                <button id="btnSubmit" class="btn btn-sm btn-primary row">Update</button>
            </form>
        </div>
   </div>
@stop

@section('js')
<script>
//     if($('#status1:checked').length){
//         $('#tahun_konstruksi_label').attr('hidden',true);
//         $('#tahun_konstruksi').attr('hidden',true); // On Load, should it be read only?
//     }

//     $("#status1").change(function() {
//         if(this.checked) {
//             $('#tahun_konstruksi_label').attr('hidden',true);
//             $('#tahun_konstruksi').attr('hidden', true);
//             $("#tahun_konstruksi").val("0"); 
//         }
//     });

//    $("#status2").change(function() {
//     if(this.checked) {
//         $('#tahun_konstruksi_label').attr('hidden',false);
//         $('#tahun_konstruksi').attr('hidden', false);            
//     }

//     $('#btnSubmit').on('click', function(){
//         if($("#tahun_konstruksi").val() == null){
//             alert('Tahun nya diisi broo !!!');
//             return false;                   
            
//         }else{
//             return;
//         }
//     })
// });


$(document).ready(function(){
    if($('#status1:checked').length){
        $('#tahun_konstruksi_label').attr('hidden',true);
        $('#tahun_konstruksi').attr('hidden',true); // On Load, should it be read only?
    }

    $('input[type=radio][name=status]') .change(function(){
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