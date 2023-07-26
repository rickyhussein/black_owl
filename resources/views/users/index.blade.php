@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                    <a href="{{ url('/users/tambah-user') }}" class="btn btn-sm btn-primary">+ Tambah Data User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableData" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>    
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telfon</th>
                            <th>Kode Acak</th>
                            <th>QR Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_user as $du)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $du['name'] }}</td>
                                <td>{{ $du['email'] }}</td>
                                <td>{{ $du['telepon'] }}</td>
                                <td>
                                    @php
                                        $kode_acak = $du['kode_acak'];
                                        $angka = preg_replace('/\D/', '', $kode_acak);
                                        $length = strlen($du['kode_acak']);
                                        $prefixLength = 3;
                                        $suffixLength = 3;
                                        $hiddenLength = $length - $prefixLength - $suffixLength;
                                        if ($hiddenLength <= 0) {
                                            echo $angka;
                                        }
                                        $prefix = substr($angka, 0, $prefixLength);
                                        $suffix = substr($angka, -$suffixLength);
                                        $hidden = str_repeat('*', $hiddenLength);
                                        $result = $prefix . $hidden . $suffix;
                                        echo $result;
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $result = Endroid\QrCode\Builder\Builder::create()
                                        ->writer(new Endroid\QrCode\Writer\PngWriter())
                                        ->writerOptions([])
                                        ->data($du['kode_acak'])
                                        ->encoding(new Endroid\QrCode\Encoding\Encoding('UTF-8'))
                                        ->errorCorrectionLevel(new Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh())
                                        ->size(300)
                                        ->margin(10)
                                        ->roundBlockSizeMode(new Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin())
                                        ->validateResult(false)
                                        ->build();
                            
                                        $result->saveToFile(public_path('/assets/qrcode/'.$du['kode_acak'].'.png'));
                                        $dataUri = $result->getDataUri();
                                    @endphp
                                <img src="{{ url('/assets/qrcode/'.$du['kode_acak'].'.png') }}" alt="{{ $du['kode_acak'] }}.png" style="width: 100px">
                                </td>
                                <td>
                                    <a href="{{ url('/users/detail/'.$du['id']) }}" class="btn btn-sm btn-info"><i class="fa fa-solid fa-eye"></i></a>
                                    <form action="{{ url('/users/delete/'.$du['id']) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm btn-circle" onClick="return confirm('Are You Sure')"><i class="fa fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




