<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Rekap Pekerjaan {{ $paket->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <style>
        html *
        {
            font-family: Arial !important;
            
        }

        .table-sm{
            font-size: 14PX;
        }

        .borderless td, .borderless th {
            border: none;
        }
        
        hr {
            border: 1px solid;
        }
        table table-bordered > thead > tr > th{
  border:3px solid black;
}
    </style>
</head>
<body>
    <div class="container-fluid row">
        <table class="table borderless">
            <tr>
                <td style="width: 60px"><img src="{{ asset('public/logo/logo.png') }}" class="img-fluid" alt="logo" style="width: 62px; height: 60px"></td>
                <td class="text-center"> <h4 class="">DATA REKAP PEKERJAAN</h4><h4>PPK PERENCANAAN & PROGRAM</h4></td>
                <td></td>
            </tr>
        </table>
        
        <hr>      
    </div>
    <div class="container-fluid">
        <div class="row align-items-start">
            <table class="table-sm borderless">
                <tr>
                    <td style="width: 120px" class="align-text-top">Nama Paket</td>
                    <td class="align-text-top">:</td>
                    <td>{{ $paket->name }}</td>
                </tr>
                <tr>
                    <td>Tahun Anggaran</td>
                    <td>:</td>
                    <td>{{ $paket->tahun_anggaran }}</td>
                </tr>
                <tr>
                    <td>Nomor Kontrak</td>
                    <td>:</td>
                    <td>{{ $paket->no_kontrak }}</td>
                </tr>
                <tr>
                    <td>Tanggal Kontrak</td>
                    <td>:</td>
                    <td>{{  date("d/m/Y", strtotime($paket->tgl_kontrak)) }}</td>
                </tr>
                <tr>
                    <td>Penyedia Jasa</td>
                    <td>:</td>
                    <td>{{ $paket->penyedia_jasa }}</td>
                </tr>
            </table>
        </div>

        <div class="row mt-5 table-responsive">
            <table class="table-sm" border="1">
                <tr>
                    <th style="width: 25px" class="text-center">No</th>
                    <th style="width: 180px" class="text-center">Nama Bangunan</th>
                    <th style="width: 100px" class="text-center">Desa</th>
                    <th style="width: 100px" class="text-center">Kecamatan</th>
                    <th style="width: 100px" class="text-center">Kab/Kota</th>
                    <th style="width:140px" class="text-center">Status Konstruksi</th>
                </tr>
                @foreach ($bangunans as $index => $item)
                    <tr>    
                        <td class="text-center">{{ $index + 1  }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ ucwords(strtolower($item->village->name)) }}</td>
                        <td>{{ ucwords(strtolower($item->district->name)) }}</td>
                        <td>{{ ucwords(strtolower($item->city->name)) }}</td>
                        
                            @if ($item->status != 0)
                                <td>Terbangun Tahun {{ $item->tahun_konstruksi }}</td>
                            @else
                                <td>Belum Terbangun</td>
                            @endif
                        
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/php">
    if (isset($pdf)) {
        $text = "page {PAGE_NUM} / {PAGE_COUNT}";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        $x = ($pdf->get_width() - $width) / 2;
        $y = $pdf->get_height() - 35;
        $pdf->page_text($x, $y, $text, $font, $size);
    }
</script>
</body>
</html>