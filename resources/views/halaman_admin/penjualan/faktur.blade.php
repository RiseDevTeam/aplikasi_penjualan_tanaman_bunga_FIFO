<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.navbar')
</head>

<body onload="print();">
    @include('layouts.script')
    <html>

    <head>
        <title>Faktur Pembayaran</title>
        <style>
            #tabel {
                font-size: 30px;
                border-collapse: collapse;
            }

            #tabel td {
                padding-left: 5px;
                border: 1px solid black;
            }

        </style>
    </head>

    <body style='font-family:tahoma; font-size:20pt;'>
        @php
            function penjumlahan($nilai)
            {
                $nilai = abs($nilai);
                $huruf = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
                $temp = '';
                if ($nilai < 12) {
                    $temp = ' ' . $huruf[$nilai];
                } elseif ($nilai < 20) {
                    $temp = penjumlahan($nilai - 10) . ' belas';
                } elseif ($nilai < 100) {
                    $temp = penjumlahan($nilai / 10) . ' puluh' . penjumlahan($nilai % 10);
                } elseif ($nilai < 200) {
                    $temp = ' seratus' . penjumlahan($nilai - 100);
                } elseif ($nilai < 1000) {
                    $temp = penjumlahan($nilai / 100) . ' ratus' . penjumlahan($nilai % 100);
                } elseif ($nilai < 2000) {
                    $temp = ' seribu' . penjumlahan($nilai - 1000);
                } elseif ($nilai < 1000000) {
                    $temp = penjumlahan($nilai / 1000) . ' ribu' . penjumlahan($nilai % 1000);
                } elseif ($nilai < 1000000000) {
                    $temp = penjumlahan($nilai / 1000000) . ' juta' . penjumlahan($nilai % 1000000);
                } elseif ($nilai < 1000000000000) {
                    $temp = penjumlahan($nilai / 1000000000) . ' milyar' . penjumlahan(fmod($nilai, 1000000000));
                } elseif ($nilai < 1000000000000000) {
                    $temp = penjumlahan($nilai / 1000000000000) . ' trilyun' . penjumlahan(fmod($nilai, 1000000000000));
                }
                return $temp;
            }
            
            function terbaik($nilai)
            {
                if ($nilai < 0) {
                    $hasil = 'minus ' . trim(penjumlahan($nilai));
                } else {
                    $hasil = trim(penjumlahan($nilai));
                }
                return $hasil;
            }
        @endphp
        <div class="mt-5">
            <center>
                {{-- kop surat --}}
                <table width="70%">
                    <tr>
                        <td>
                            <font style="font-family: Tahoma; font-size:30px;"><b>   <center>  FAKTUR </center> </b>
                            </font>
                        </td>
        </div>
        <!-- </center>    -->
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border: 2px solid black;">
            </td>
        </tr>
        </table>
        {{-- kop surat --}}


        <table style='width:950px; font-size:15pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:20pt'><b>CV. Putri EMAS Pertiwi Flowers</b></span></br>

                Alamat : Kota Padang </br>
                Tanggal :08123456</br>
                Telp : 0594094545</br>
            </td>
            {{-- <td style='vertical-align:top' width='40%' align='left'>
                <b><span style='font-size:20pt'>No Faktur. : MP-KS ddsad</span></b></br>
                Nama Pelanggan : ddfds</br>
                Nomor telepon : sdsf </br>
                Tipe Pembayaran :ffdsf</br>
            </td> --}}
        </table>
        <table cellspacing='0' style='width:950px; font-size:15pt; font-family:calibri;  border-collapse: collapse;'
            border='1'>

            <tr align='center'>
                <td width='20%'>Nama Tanaman</td>
                <td width='20%'>Ukuran</td>
                <td width='13%'>Jumla Pembelian</td>
                <td width='20%'>Harga</td>
            </tr>
            <tr align='center'>

                <td>{{ $faktur->nama_tanaman }}</td>
                <td>{{ $faktur->ukuran }}</td>
                <td>{{ $faktur->stok_jual }}</td>
                <td>{{ $faktur->harga }}</td>

            </tr>

        </table>

        <table cellspacing='0'
            style='width:950px; font-size:15pt; font-family:calibri;  border-collapse: collapse;   margin-top: 50px;'>
            <tr>
                <td colspan='6'>
                    <div style='text-align:right'>Total Harga : </div>
                </td>
                <td style='text-align:right'>
                    Rp.{{ number_format($faktur->harga * $faktur->ukuran * $faktur->stok_jual) }}
                </td>
            </tr>

            <tr>
                <td colspan='7'>
                    <div style='text-align:right'>Terbilang :
                        {{ terbaik($faktur->harga * $faktur->ukuran * $faktur->stok_jual) }}
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='6'>
                    <div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div>
                </td>
                <td style='text-align:right'>
                    <b>
                        Rp.{{ number_format($faktur->harga * $faktur->ukuran * $faktur->stok_jual) }}</b>
                    {{-- <hr style="border: 2px solid black; "> --}}
                </td>
            </tr>
        </table>
        <tr class="float-right">
            <center>
                <td colspan="2">
                    <hr style=" border: 2px solid black; margin-right: 15%;" width="40%">
                </td>
            </center>
        </tr>

        <table style='width:650; font-size:7pt;' cellspacing='2'>
            <tr>
                <td class=" mb-6" style='vertical-align:top' width='13%' align='right'>
                    <span style='font-size:15pt;'>Hormat Kami</span></br>
                    </br>
                    <span style='font-size:15pt;'>CV. Putri EMAS Pertiwi Flowers</span></br>
                </td>
            </tr>
        </table>
        </center>
        </div>
    </body>

    </html>
</body>

</html>
