<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $surat_pengantar->surat_pengantar_number }}</title>
    <style>
        @page {
            margin-top: 115px ;
            margin-bottom: 20px ;
            margin-left: 70 ;
            margin-right: 70 ;
        }
        footer { position: fixed; bottom: -5px; left: 0px; right: 0px; }
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
        <table  style="width: 100%; font-size:8px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0);">
            <tbody>
                <tr>
                    <td>
                        @php
                            $path = 'assets/img/bekasi.jpeg';
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        @endphp
                        <img src="{{ $base64 }}" style="width: 75px;" alt="UNITEDA ARKATO">
                    </td>
                    <td style="text-align:center; padding-right:50px;">
                        <span style="font-size:20px; font-weight:bold; text-transform: uppercase; padding:15px 0px 5px;">
                            RUKUN TETANGGA {{ $surat_pengantar->user->rt ?? '-' }} RW {{ $surat_pengantar->user->rw ?? '-' }}
                        </span>
                        <br>
                        <span style="font-size:20px; font-weight:bold; text-transform: uppercase; padding:15px 0px 5px;">
                            DESA KEDUNG JAYA KECAMATAN BABELAN
                        </span>
                        <br>
                        <span style="font-size:25px; font-weight:bold; text-transform: uppercase; padding:15px 0px 5px;">
                            KABUPATEN BEKASI
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border-bottom:3px solid #111;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border-top:2px solid #111;  "></td>
                </tr>
            </tbody>
        </table>


    </div>

    <footer>
        <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0);">
            <tbody>
                <tr>
                    <td style="vertical-align:top;text-align: center;">
                        Ket : "Surat pengantar ini harus di tanda tangani dan di stempel oleh Ketua RT dan Ketua RW setempat"
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:8px">
        <tbody>
            <tr>
                <td style="font-weight:bold; text-align:center; text-transform:uppercase; font-size:17px;">SURAT PENGANTAR</td>
            </tr>
            <tr>
                <td style="text-align:center;">No: {{ $surat_pengantar->surat_pengantar_number ?? '-' }}</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:20px;">
        <tbody>
            <tr>
                <td>Yang bertanda tangan dibawah ini Ketua Rukun Tetangga {{ $surat_pengantar->user->rt ?? '-' }} RW {{ $surat_pengantar->user->rw ?? '-' }} Desa Kedung Jaya Kecamatan Babelan Kabupaten Bekasi menerangkan bahwa :</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:20px; padding-left:50px;padding-right:50px">
        <tbody>
            <tr>
                <td style="width: 30%; vertical-align:top;">Nama</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">{{ $surat_pengantar->keluarga->nama_keluarga ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Tempat / Tanggal Lahir</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">
                    @php
                        if ($surat_pengantar->born_date) {
                            Carbon\Carbon::setLocale('id');
                            $born_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_pengantar->born_date);
                            $new_born_date = $born_date->translatedFormat('d F Y');
                        } else {
                            $new_born_date = '-';
                        }
                    @endphp
                    {{ $surat_pengantar->born_place ?? '-' }} / {{ $new_born_date }}
                </td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Jenis Kelamin</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">{{ $surat_pengantar->gender ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Bangsa / Agama</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">{{ $surat_pengantar->nation ?? '-' }} / {{ $surat_pengantar->religion ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Nomor KTP</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">{{ $surat_pengantar->ktp_number ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Status Perkawinan</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">{{ $surat_pengantar->married_status ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Pekerjaan</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">{{ $surat_pengantar->job ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align:top;">Alamat</td>
                <td style="width: 5%; vertical-align:top;">:</td>
                <td style="width: 65%; vertical-align:top;">Mutiara Gading City Cluster Madrid Blok {{ $surat_pengantar->alamat ?? '-' }} Desa Kadung Jaya Kecamatan Babelan Kabupaten Bekasi</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:20px;">
        <tbody>
            <tr>
                <td>Adalah benar warga kami, telah memohon Surat Pengantar untuk keperluan :</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-left:40px;padding-right:40px">
        <tbody>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Kartu Keluarga (KK)' ? 'circled-number' : 'number' }}">1.</span></td>
                <td style="width: 95%">Permohonan Kartu Keluarga (KK)</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Rekam / Cetak E-KTP' ? 'circled-number' : 'number' }}">2.</span></td>
                <td style="width: 95%">Permohonan Rekam / Cetak E-KTP</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Keterangan Domisili' ? 'circled-number' : 'number' }}">3.</span></td>
                <td style="width: 95%">Permohonan Surat Keterangan Domisili</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Keterangan Usaha' ? 'circled-number' : 'number' }}">4.</span></td>
                <td style="width: 95%">Permohonan Surat Keterangan Usaha</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Keterangan Tidak Mampu (SKTM)' ? 'circled-number' : 'number' }}">5.</span></td>
                <td style="width: 95%">Permohonan Surat Keterangan Tidak Mampu (SKTM)</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Pindah / Datang' ? 'circled-number' : 'number' }}">6.</span></td>
                <td style="width: 95%">Permohonan Surat Pindah / Datang</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Pengantar SKCK' ? 'circled-number' : 'number' }}">7.</span></td>
                <td style="width: 95%">Permohonan Surat Pengantar SKCK</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Mengurus Surat Nikah' ? 'circled-number' : 'number' }}">8.</span></td>
                <td style="width: 95%">Permohonan Mengurus Surat Nikah</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Keterangan Lahir' ? 'circled-number' : 'number' }}">9.</span></td>
                <td style="width: 95%">Permohonan Surat Keterangan Lahir</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Keterangan Kematian' ? 'circled-number' : 'number' }}">10.</span></td>
                <td style="width: 95%">Permohonan Surat Keterangan Kematian</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Permohonan Surat Izin Keramaian' ? 'circled-number' : 'number' }}">11.</span></td>
                <td style="width: 95%">Permohonan Surat Izin Keramaian</td>
            </tr>
            <tr>
                <td style="width: 5%"><span class="{{ $surat_pengantar->letter_type == 'Lainnya' ? 'circled-number' : 'number' }}">12.</span></td>
                <td style="width: 95%">Lainnya {{ $surat_pengantar->letter_type_text ? ': ' . $surat_pengantar->letter_type_text : '' }}</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:20px;">
        <tbody>
            <tr>
                <td>Demikian Surat Pengantar kami berikan agar jadi maklum</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:20px;">
        <tbody>
            <tr>
                <td style="text-align: right">
                    @php
                        if ($surat_pengantar->date) {
                            Carbon\Carbon::setLocale('id');
                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_pengantar->date);
                            $new_date = $date->translatedFormat('d F Y');
                        } else {
                            $new_date = '-';
                        }
                    @endphp
                    Kedung Jaya, {{ $new_date }}
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; font-size:12px; font-family: 'Open Sans', sans-serif; color:rgb(0, 0, 0); padding-top:20px;">
        <tbody>
            <tr>
                <td colspan="2">Mengetahui,</td>
            </tr>
            <tr>
                <td style="width: 50%">Ketua RW {{ $surat_pengantar->user->rw ?? '-' }}</td>
                <td style="width: 50%; text-align:right;">Ketua RT {{ $surat_pengantar->user->rt ?? '-' }}</td>
            </tr>
            <tr>
                <td style="width: 50%; padding-top:80px;">___________________</td>
                <td style="width: 50%; text-align:right; padding-top:80px;">___________________</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
