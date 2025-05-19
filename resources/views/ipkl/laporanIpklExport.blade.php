<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan IPKL</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>RT</th>
                <th>RW</th>
                <th>Status</th>

                @if (!request('month') || request('month') == '01')
                    <th colspan="2">Januari</th>
                @endif

                @if (!request('month') || request('month') == '02')
                    <th colspan="2">Februari</th>
                @endif

                @if (!request('month') || request('month') == '03')
                    <th colspan="2">Maret</th>
                @endif

                @if (!request('month') || request('month') == '04')
                    <th colspan="2">April</th>
                @endif

                @if (!request('month') || request('month') == '05')
                    <th colspan="2">Mei</th>
                @endif

                @if (!request('month') || request('month') == '06')
                    <th colspan="2">Juni</th>
                @endif

                @if (!request('month') || request('month') == '07')
                    <th colspan="2">Juli</th>
                @endif

                @if (!request('month') || request('month') == '08')
                    <th colspan="2">Agustus</th>
                @endif

                @if (!request('month') || request('month') == '09')
                    <th colspan="2">September</th>
                @endif

                @if (!request('month') || request('month') == '10')
                    <th colspan="2">Oktober</th>
                @endif

                @if (!request('month') || request('month') == '11')
                    <th colspan="2">November</th>
                @endif

                @if (!request('month') || request('month') == '12')
                    <th colspan="2">Desember</th>
                @endif

                @if (!request('month'))
                    <th>Total</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @if (count($users) <= 0)
                <tr>
                    <td colspan="31">Tidak Ada Data</td>
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
                            $count_januari_paid = $user->countIpklPaid($user->id, '01', $year);
                            $count_januari_unpaid = $user->countIpklUnpaid($user->id, '01', $year);

                            $total_februari = $user->getIpkl($user->id, '02', $year);
                            $count_februari_paid = $user->countIpklPaid($user->id, '02', $year);
                            $count_februari_unpaid = $user->countIpklUnpaid($user->id, '02', $year);

                            $total_maret = $user->getIpkl($user->id, '03', $year);
                            $count_maret_paid = $user->countIpklPaid($user->id, '03', $year);
                            $count_maret_unpaid = $user->countIpklUnpaid($user->id, '03', $year);

                            $total_april = $user->getIpkl($user->id, '04', $year);
                            $count_april_paid = $user->countIpklPaid($user->id, '04', $year);
                            $count_april_unpaid = $user->countIpklUnpaid($user->id, '04', $year);

                            $total_mei = $user->getIpkl($user->id, '05', $year);
                            $count_mei_paid = $user->countIpklPaid($user->id, '05', $year);
                            $count_mei_unpaid = $user->countIpklUnpaid($user->id, '05', $year);

                            $total_juni = $user->getIpkl($user->id, '06', $year);
                            $count_juni_paid = $user->countIpklPaid($user->id, '06', $year);
                            $count_juni_unpaid = $user->countIpklUnpaid($user->id, '06', $year);

                            $total_juli = $user->getIpkl($user->id, '07', $year);
                            $count_juli_paid = $user->countIpklPaid($user->id, '07', $year);
                            $count_juli_unpaid = $user->countIpklUnpaid($user->id, '07', $year);

                            $total_agustus = $user->getIpkl($user->id, '08', $year);
                            $count_agustus_paid = $user->countIpklPaid($user->id, '08', $year);
                            $count_agustus_unpaid = $user->countIpklUnpaid($user->id, '08', $year);

                            $total_september = $user->getIpkl($user->id, '09', $year);
                            $count_september_paid = $user->countIpklPaid($user->id, '09', $year);
                            $count_september_unpaid = $user->countIpklUnpaid($user->id, '09', $year);

                            $total_oktober = $user->getIpkl($user->id, '10', $year);
                            $count_oktober_paid = $user->countIpklPaid($user->id, '10', $year);
                            $count_oktober_unpaid = $user->countIpklUnpaid($user->id, '10', $year);

                            $total_november = $user->getIpkl($user->id, '11', $year);
                            $count_november_paid = $user->countIpklPaid($user->id, '11', $year);
                            $count_november_unpaid = $user->countIpklUnpaid($user->id, '11', $year);

                            $total_desember = $user->getIpkl($user->id, '12', $year);
                            $count_desember_paid = $user->countIpklPaid($user->id, '12', $year);
                            $count_desember_unpaid = $user->countIpklUnpaid($user->id, '12', $year);

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
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->alamat ?? '-' }}</td>
                        <td>{{ $user->rt ?? '-' }}</td>
                        <td>{{ $user->rw ?? '-' }}</td>
                        <td>{{ $user->status ?? '-' }}</td>

                        @if (!request('month') || request('month') == '01')
                            <td>{{ $total_januari }}</td>
                            <td>
                                @if ($total_januari > 0 && $count_januari_paid > 0)
                                    paid
                                @else
                                    @if ($count_januari_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '02')
                            <td>{{ $total_februari }}</td>
                            <td>
                                @if ($total_februari > 0 && $count_februari_paid > 0)
                                    paid
                                @else
                                    @if ($count_februari_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '03')
                            <td>{{ $total_maret }}</td>
                            <td>
                                @if ($total_maret > 0 && $count_maret_paid > 0)
                                    paid
                                @else
                                    @if ($count_maret_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '04')
                            <td>{{ $total_april }}</td>
                            <td>
                                @if ($total_april > 0 && $count_april_paid > 0)
                                    paid
                                @else
                                    @if ($count_april_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '05')
                            <td>{{ $total_mei }}</td>
                            <td>
                                @if ($total_mei > 0 && $count_mei_paid > 0)
                                    paid
                                @else
                                    @if ($count_mei_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '06')
                            <td>{{ $total_juni }}</td>
                            <td>
                                @if ($total_juni > 0 && $count_juni_paid > 0)
                                    paid
                                @else
                                    @if ($count_juni_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '07')
                            <td>{{ $total_juli }}</td>
                            <td>
                                @if ($total_juli > 0 && $count_juli_paid > 0)
                                    paid
                                @else
                                    @if ($count_juli_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '08')
                            <td>{{ $total_agustus }}</td>
                            <td>
                                @if ($total_agustus > 0 && $count_agustus_paid > 0)
                                    paid
                                @else
                                    @if ($count_agustus_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '09')
                            <td>{{ $total_september }}</td>
                            <td>
                                @if ($total_september > 0 && $count_september_paid > 0)
                                    paid
                                @else
                                    @if ($count_september_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '10')
                            <td>{{ $total_oktober }}</td>
                            <td>
                                @if ($total_oktober > 0 && $count_oktober_paid > 0)
                                    paid
                                @else
                                    @if ($count_oktober_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '11')
                            <td>{{ $total_november }}</td>
                            <td>
                                @if ($total_november > 0 && $count_november_paid > 0)
                                    paid
                                @else
                                    @if ($count_november_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month') || request('month') == '12')
                            <td>{{ $total_desember }}</td>
                            <td>
                                @if ($total_desember > 0 && $count_desember_paid > 0)
                                    paid
                                @else
                                    @if ($count_desember_unpaid > 0)
                                        unpaid
                                    @else
                                        tagihan belum dibuat
                                    @endif
                                @endif
                            </td>
                        @endif

                        @if (!request('month'))
                            <td>{{ $total }}</td>
                        @endif
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6">Total</td>

                    @if (!request('month') || request('month') == '01')
                        <td colspan="2">{{ $total_total_januari }}</td>
                    @endif

                    @if (!request('month') || request('month') == '02')
                        <td colspan="2">{{ $total_total_februari }}</td>
                    @endif

                    @if (!request('month') || request('month') == '03')
                        <td colspan="2">{{ $total_total_maret }}</td>
                    @endif

                    @if (!request('month') || request('month') == '04')
                        <td colspan="2">{{ $total_total_april }}</td>
                    @endif

                    @if (!request('month') || request('month') == '05')
                        <td colspan="2">{{ $total_total_mei }}</td>
                    @endif

                    @if (!request('month') || request('month') == '06')
                        <td colspan="2">{{ $total_total_juni }}</td>
                    @endif

                    @if (!request('month') || request('month') == '07')
                        <td colspan="2">{{ $total_total_juli }}</td>
                    @endif

                    @if (!request('month') || request('month') == '08')
                        <td colspan="2">{{ $total_total_agustus }}</td>
                    @endif

                    @if (!request('month') || request('month') == '09')
                        <td colspan="2">{{ $total_total_september }}</td>
                    @endif

                    @if (!request('month') || request('month') == '10')
                        <td colspan="2">{{ $total_total_oktober }}</td>
                    @endif

                    @if (!request('month') || request('month') == '11')
                        <td colspan="2">{{ $total_total_november }}</td>
                    @endif

                    @if (!request('month') || request('month') == '12')
                        <td colspan="2">{{ $total_total_desember }}</td>
                    @endif

                    @if (!request('month'))
                        <td>{{ $total_total }}</td>
                    @endif
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
