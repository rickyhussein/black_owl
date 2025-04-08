<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan IPKL</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>RT</th>
                <th>Status</th>
                <th>Januari</th>
                <th>Februari</th>
                <th>Maret</th>
                <th>April</th>
                <th>Mei</th>
                <th>Juni</th>
                <th>Juli</th>
                <th>Agustus</th>
                <th>September</th>
                <th>Oktober</th>
                <th>November</th>
                <th>Desember</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @if (count($users) <= 0)
                <tr>
                    <td colspan="18">Tidak Ada Data</td>
                </tr>
            @else
                @php
                    $total_total_januari = 0;
                    $total_total_februari = 0;
                    $total_total_maret = 0;
                    $total_total_april = 0;
                    $total_total_mei = 0;
                    $total_total_juni = 0;
                    $total_total_juli = 0;
                    $total_total_agustus = 0;
                    $total_total_september = 0;
                    $total_total_oktober = 0;
                    $total_total_november = 0;
                    $total_total_desember = 0;
                    $total_total = 0;
                @endphp
                @foreach ($users as $key => $user)
                    <tr>
                        @php
                            $total_januari = $user->getIpkl($user->id, '01', $year);
                            $total_februari = $user->getIpkl($user->id, '02', $year);
                            $total_maret = $user->getIpkl($user->id, '03', $year);
                            $total_april = $user->getIpkl($user->id, '04', $year);
                            $total_mei = $user->getIpkl($user->id, '05', $year);
                            $total_juni = $user->getIpkl($user->id, '06', $year);
                            $total_juli = $user->getIpkl($user->id, '07', $year);
                            $total_agustus = $user->getIpkl($user->id, '08', $year);
                            $total_september = $user->getIpkl($user->id, '09', $year);
                            $total_oktober = $user->getIpkl($user->id, '10', $year);
                            $total_november = $user->getIpkl($user->id, '11', $year);
                            $total_desember = $user->getIpkl($user->id, '12', $year);
                            $total = $total_januari + $total_februari + $total_maret + $total_april + $total_mei + $total_juni + $total_juli + $total_agustus + $total_september + $total_oktober + $total_november + $total_desember;

                            $total_total_januari += $total_januari;
                            $total_total_februari += $total_februari;
                            $total_total_maret += $total_maret;
                            $total_total_april += $total_april;
                            $total_total_mei += $total_mei;
                            $total_total_juni += $total_juni;
                            $total_total_juli += $total_juli;
                            $total_total_agustus += $total_agustus;
                            $total_total_september += $total_september;
                            $total_total_oktober += $total_oktober;
                            $total_total_november += $total_november;
                            $total_total_desember += $total_desember;
                            $total_total += $total;
                        @endphp
                        <td>{{ $key + 1 }}.</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->alamat ?? '-' }}</td>
                        <td>{{ $user->rt ?? '-' }}</td>
                        <td>{{ $user->status ?? '-' }}</td>
                        <td>{{ $total_januari }}</td>
                        <td>{{ $total_februari }}</td>
                        <td>{{ $total_maret }}</td>
                        <td>{{ $total_april }}</td>
                        <td>{{ $total_mei }}</td>
                        <td>{{ $total_juni }}</td>
                        <td>{{ $total_juli }}</td>
                        <td>{{ $total_agustus }}</td>
                        <td>{{ $total_september }}</td>
                        <td>{{ $total_oktober }}</td>
                        <td>{{ $total_november }}</td>
                        <td>{{ $total_desember }}</td>
                        <td>{{ $total }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Total</td>
                    <td>{{ $total_total_januari }}</td>
                    <td>{{ $total_total_februari }}</td>
                    <td>{{ $total_total_maret }}</td>
                    <td>{{ $total_total_april }}</td>
                    <td>{{ $total_total_mei }}</td>
                    <td>{{ $total_total_juni }}</td>
                    <td>{{ $total_total_juli }}</td>
                    <td>{{ $total_total_agustus }}</td>
                    <td>{{ $total_total_september }}</td>
                    <td>{{ $total_total_oktober }}</td>
                    <td>{{ $total_total_november }}</td>
                    <td>{{ $total_total_desember }}</td>
                    <td>{{ $total_total }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
