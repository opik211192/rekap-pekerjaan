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
        .table{
            font-size: 15PX;
        }

        .table-sm{
            font-size: 14PX;
        }

        .table-bordered{
            border: 1px solid $gray-300 !important;
        }

        .borderless td, .borderless th {
            border: none;
        }
        
        hr {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <div class="container-fluid row">
        <table class="table borderless">
            <tr>
                <td style="width: 170px"><img src="{{ asset('public/logo/logo.png') }}" class="img-fluid" alt="logo" style="width: 62px; height: 60px"></td>
                <td> <h4 class="">DATA REKAP PEKERJAAN</h4></td>
                <td></td>
            </tr>
        </table>
        
        <hr>      
    </div>
    <div class="container-fluid">
        <div class="row align-items-start">
            <table class="table-sm">
                <tr>
                    <td style="width: 120px" class="align-text-top"><strong>Nama Paket</strong></td>
                    <td class="align-text-top">:</td>
                    <td>{{ $paket->name }}</td>
                </tr>
                <tr>
                    <td><strong>Tahun Anggaran</strong></td>
                    <td>:</td>
                    <td>{{ $paket->tahun_anggaran }}</td>
                </tr>
                <tr>
                    <td><strong>Nomor Kontrak</strong></td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Kontrak</strong></td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Penyedia Jasa</strong></td>
                    <td>:</td>
                    <td></td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        
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