@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap">
        <div class="bill-content">
            <div class="tf-container">
                <form action="{{ url('/laporan-pengeluaran') }}" class="mt-4">
                    <div class="row">
                        <div class="col-10">
                            <select name="year" id="year" class="form-control @error('year') is-invalid @enderror select2" data-live-search="true">
                                <option value="">Year</option>
                                @php
                                    $last= 2020;
                                    $now = date('Y');
                                @endphp
                                @for ($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}" {{ $i == request('year') ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            @error('year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <div class="content-tab pt-tab-space mb-5">
                    <div id="tab-gift-item-1 app-wrap" class="app-wrap">
                        <div class="bill-content">
                            <div class="tf-container">
                                <ul class="mb-5">
                                    @if (count($transaction_pengeluaran) > 0)
                                        @foreach ($transaction_pengeluaran as $pengeluaran)
                                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                                <div class="content-right">
                                                    <h4>
                                                        <a href="{{ url('/laporan-pengeluaran/show/'.$pengeluaran->id) }}">
                                                            {{ $pengeluaran->type ?? '-' }}
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/laporan-pengeluaran/show/'.$pengeluaran->id) }}">
                                                            <span>
                                                                @php
                                                                    if ($pengeluaran->date) {
                                                                        Carbon\Carbon::setLocale('id');
                                                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $pengeluaran->date);
                                                                        $new_date = $date->translatedFormat('l, d F Y');
                                                                    } else {
                                                                        $new_date = '-';
                                                                    }
                                                                @endphp
                                                                {{ $new_date  }}
                                                            </span>
                                                            <span class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;"><i class="fa fa-eye"></i></span>
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/laporan-pengeluaran/show/'.$pengeluaran->id) }}">
                                                            <span>Nominal : Rp {{ number_format($pengeluaran->nominal) }}</span>
                                                        </a>
                                                    </h4>

                                                </div>
                                            </li>
                                        @endforeach
                                        {{ $transaction_pengeluaran->links() }}
                                    @else
                                        <center>
                                        <hr> No Data Available <hr>
                                        </center>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @push('script')
        <script>
            $('.select2').select2();
        </script>
    @endpush
@endsection
