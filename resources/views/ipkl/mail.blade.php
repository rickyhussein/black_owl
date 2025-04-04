<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPKL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            background-color: #ffffff;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            background-color: rgb(236, 236, 236);
            padding: 20px;
            color: white;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #333;
        }

        .content p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        @media (max-width: 600px) {
            .container {
                width: 100%;
                padding: 10px;
            }

            .header {
                padding: 10px;
            }
        }

        .btn-blue {
            display: inline-block;
            background-color: #19008a;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-blue:hover {
            background-color: #00538a;
        }

  .btn-blue:active {
    background-color: #3182b5;
  }
    </style>

</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://cluster.terratradesolution.com/assets/img/madrid.png" alt="Cluster Madrid">
        </div>
        <br><br>

        Ini adalah pesan otomatis dari sistem layanan Cluster Madrid
        <br><br>
        Salam sejahtera Bapak/Ibu, Kami informasikan data dibawah ini belum melakukan pembayaran
        <br>
        Nama : {{ $ipkl->user->name ?? '-' }}
        <br>
        Alamat : {{ $ipkl->user->alamat ?? '-' }}
        <br>
        @php
            $month = Carbon\Carbon::createFromFormat('m', $ipkl->month)->translatedFormat('F');
        @endphp
        Jenis Pembayaran : {{ $ipkl->type ?? '-' }} ({{ $month }} {{ $ipkl->year }})
        <br>
        @php
            if ($ipkl->date) {
                Carbon\Carbon::setLocale('id');
                $date = Carbon\Carbon::createFromFormat('Y-m-d', $ipkl->date);
                $expired_date = $date->addDays($ipkl->expired)->translatedFormat('d F Y');
            } else {
                $expired_date = '-';
            }
        @endphp
        Jatuh Tempo : {{ $expired_date }}
        <br>
        Status : {{ $ipkl->status }}
        <br>
        Nominal : Rp {{ number_format($ipkl->nominal) }}
        <br><br>
        Pembayaran Melalui Link Dibawah Ini
        <br><br><br>

        <center>
            <a href="{{ url('/my-ipkl/show/'.$ipkl->id) }}" class="btn-blue">Link Pembayaran</a>
        </center>


        <br><br><br>

        <div style="background-color: #dddee1; text-align: center; padding: 10px;margin-top:10px; font-size: 14px; border-top: 1px solid #e5e7eb;">
            <p style="margin: 0;">&copy; {{ date('Y') }} Cluster Madrid. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
