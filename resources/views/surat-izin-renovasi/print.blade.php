<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $filename }}</title>
    <style>
        @page {
            margin-top: 150px ;
            margin-bottom: 20px ;
            margin-left: 50 ;
            margin-right: 50 ;
        }
        #header { position: fixed; top: -105px; left: 0px; right: 0px; }
        p { page-break-after: always; }
        p:last-child { page-break-after: never; }

        .circled-number {
            display: inline-block;
            border: 2px solid #000;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            line-height: 22px;
            margin-right: 5px;
        }

        .number {
            display: inline-block;
            width: 24px;
            height: 24px;
            text-align: center;
            line-height: 22px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div id="header">
        <table  style="width: 100%; font-size:16px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0);">
            <tbody>
                <tr>
                    <td>
                        @php
                            $path = 'assets/img/bekasi.jpg';
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        @endphp
                        <img src="{{ $base64 }}" style="width: 100px; height: 100px;" alt="CLuster Madrid">
                    </td>
                    <td style="text-align:center; padding-right:50px;">
                        <span style="font-weight:bold; text-transform: uppercase; padding:15px 0px 5px;">
                            PEMERINTAH KABUPATEN BEKASI KECAMATAN BABELAN
                        </span>
                        <br>
                        <span style="font-weight:bold; text-transform: uppercase; padding:15px 0px 5px;">
                            DESA KEDUNG JAYA PERUMAHAN MUTIARA GADING CITY
                        </span>
                        <br>
                        <span style="font-weight:bold; text-transform: uppercase; padding:15px 0px 5px;">
                            CLUSTER MADRID
                        </span>
                        <br>
                        <span style="font-weight:bold; text-transform: uppercase; padding:15px 0px 5px;">
                            RT 01 RT 02 RT 03 / RW 016
                        </span>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border-top:2px solid #111;  "></td>
                </tr>
            </tbody>
        </table>


    </div>


    <table style="width: 100%; font-size:15px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:25px">
        <tbody>
            <tr>
                <td style="font-weight:bold; text-align:center; text-transform:uppercase;">FORMULIR PERMOHONAN IZIN RENOVASI RUMAH</td>
            </tr>
            <tr>
                <td style="font-weight:bold; text-align:center; text-transform:uppercase;">Dengan Persetujuan RT dan RW Setempat</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:15px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:40px">
        <tbody>
            <tr>
                <td colspan="3" style="font-weight:bold;">Data Pemohon</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Nama Lengkap</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->user->name ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Alamat Rumah</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->user->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">RT / RW</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">RT {{ $surat_izin_renovasi->user->rt ?? '-' }} / RW {{ $surat_izin_renovasi->user->rw ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">No. Telepon / HP</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->user->no_hp ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Email</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->user->email ?? '-' }}</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:15px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:60px">
        <tbody>
            <tr>
                <td colspan="3" style="font-weight:bold;">Data Renovasi</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Jenis Renovasi</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->type ?? '-' }} {{ $surat_izin_renovasi->type_text ? '(' . $surat_izin_renovasi->type_text . ')' : '' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Luas Area yang Direnovasi</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->size ?? '-' }} m²</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Rencana Mulai Tanggal</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">
                    @php
                        if ($surat_izin_renovasi->start_date) {
                            Carbon\Carbon::setLocale('id');
                            $start_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->start_date);
                            $new_start_date = $start_date->translatedFormat('l, d F Y');
                        } else {
                            $new_start_date = '-';
                        }
                    @endphp
                    {{ $new_start_date  }}
                </td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Perkiraan Selesai Tanggal</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">
                    @php
                        if ($surat_izin_renovasi->end_date) {
                            Carbon\Carbon::setLocale('id');
                            $end_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->end_date);
                            $new_end_date = $end_date->translatedFormat('l, d F Y');
                        } else {
                            $new_end_date = '-';
                        }
                    @endphp
                    {{ $new_end_date  }}
                </td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Kontraktor / Pelaksana</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->contractor ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Nama Perusahaan</td>
                <td style="width: 3%; vertical-align:top;">:</td>
                <td style="width: 67%; vertical-align:top;">{{ $surat_izin_renovasi->company_name ?? '-' }}</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:15px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:60px">
        <tbody>
            <tr>
                <td style="font-weight:bold;">Kartu Akses Keluar-Masuk Gate</td>
            </tr>
            <tr>
                <td style="padding-left: 15px;">
                    <ol>
                        <li>Pemohon dan kontraktor bersedia mematuhi peraturan penggunaan kartu akses keluar-masuk gate selama proses renovasi.</li>
                        <br>
                        <li>Pemohon atau kontraktor menyetor jaminan sebesar Rp 150.000 (Seratus Lima Puluh Ribu Rupiah) kepada pihak RT/RW atau pengelola gate.</li>
                        <br>
                        <li>Jaminan akan dikembalikan setelah renovasi selesai dan tidak ada pelanggaran peraturan atau kerusakan fasilitas umum selama proses renovasi.</li>
                        <br>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>

    <p></p>

    <table style="width: 100%; font-size:15px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:60px">
        <tbody>
            <tr>
                <td colspan="2" style="font-weight:bold;">Dokumen Pendukung</td>
            </tr>
            <tr>
                <td style="width: 7%; vertical-align:top;">{!! $surat_izin_renovasi->fotokopi_ktp_pemohon == 1 ? '<img src="'. asset('assets/img/check-solid.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">':'<img src="'. asset('assets/img/square-regular-black.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">' !!}</td>
                <td style="width: 93%; vertical-align:top;">Fotokopi KTP Pemohon</td>
            </tr>
            <tr>
                <td style="width: 7%; vertical-align:top;">{!! $surat_izin_renovasi->gambar_design_renovasi == 1 ? '<img src="'. asset('assets/img/check-solid.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">':'<img src="'. asset('assets/img/square-regular-black.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">' !!}</td>
                <td style="width: 93%; vertical-align:top;">Gambar Design Renovasi</td>
            </tr>
            <tr>
                <td style="width: 7%; vertical-align:top;">{!! $surat_izin_renovasi->surat_persetujuan_tetangga_terdekat == 1 ? '<img src="'. asset('assets/img/check-solid.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">':'<img src="'. asset('assets/img/square-regular-black.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">' !!}</td>
                <td style="width: 93%; vertical-align:top;">Surat Persetujuan Tetangga Terdekat</td>
            </tr>
            <tr>
                <td style="width: 7%; vertical-align:top;">{!! $surat_izin_renovasi->dokumen_lainnya == 1 ? '<img src="'. asset('assets/img/check-solid.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">':'<img src="'. asset('assets/img/square-regular-black.png'). '" style="height: 10px; width: auto; margin-left:15px;margin-top:5px">' !!}</td>
                <td style="width: 93%; vertical-align:top;">Dokumen Lainnya {{ $surat_izin_renovasi->dokumen_text ? ': ' . $surat_izin_renovasi->dokumen_text : '' }}</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:15px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:60px">
        <tbody>
            <tr>
                <td style="font-weight:bold;">Peraturan dan Persyaratan</td>
            </tr>
            <tr>
                <td style="padding-left: 15px;">
                    <ul>
                        <li>Saya menyetujui untuk mematuhi semua peraturan dan ketentuan yang berlaku di lingkungan RT/RW setempat.</li>
                        <br>
                        <li>Saya bertanggung jawab penuh atas segala kerusakan yang mungkin terjadi selama proses renovasi.</li>
                        <br>
                        <li>Saya akan memastikan bahwa renovasi tidak mengganggu ketenangan dan keamanan lingkungan.</li>
                        <br>
                        <li>Saya bersedia mematuhi aturan penggunaan kartu akses keluar-masuk gate selama proses renovasi.</li>
                        <br>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>


    <table style="border-collapse: collapse; width: 100%; font-size:9px; font-family: 'Open Sans', sans-serif; color:black; padding-top:70px">
        <tbody>
            <tr>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; text-align: center; border-bottom: none; width:33%">Pemohon</td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; text-align: center; border-bottom: none; width:34%">Ketua RT</td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; text-align: center; border-bottom: none; width:33%">Ketua RW</td>
            </tr>
            <tr>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; text-align: center; border-top: none; border-bottom: none; height:120px"></td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; text-align: center; border-top: none; border-bottom: none; height:120px"></td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; text-align: center; border-top: none; border-bottom: none; height:120px"></td>
            </tr>
            <tr>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; text-align: center; border-top: none;">____________________________</td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; text-align: center; border-top: none;">____________________________</td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; text-align: center; border-top: none;">____________________________</td>
            </tr>
            <tr>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; border-top: none; border-bottom: none;">
                    @php
                        if ($surat_izin_renovasi->date) {
                            Carbon\Carbon::setLocale('id');
                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->date);
                            $new_date = $date->translatedFormat('d F Y');
                        } else {
                            $new_date = '-';
                        }
                    @endphp
                    Tanggal <span style="margin-left: 9px; margin-right: 5px;">:</span> {{ $new_date }}
                </td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; border-top: none; border-bottom: none;">
                    Tanggal <span style="margin-left: 9px; margin-right: 5px;">:</span>
                </td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; border-top: none; border-bottom: none;">
                    Tanggal <span style="margin-left: 9px; margin-right: 5px;">:</span>
                </td>
            </tr>
            <tr>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; border-top: none; height:50px;">
                    Catatan <span style="margin-left: 10px; margin-right: 6px;">:</span>
                </td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; border-top: none; height:50px;">
                    Catatan <span style="margin-left: 10px; margin-right: 6px;">:</span>
                </td>
                <td style="padding:4px; border: 1px solid black; vertical-align:top; font-weight:bold; border-top: none; height:50px;">
                    Catatan <span style="margin-left: 10px; margin-right: 6px;">:</span>
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>
