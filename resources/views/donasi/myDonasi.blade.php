@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap">
        <div class="bill-content">
            <div class="tf-container">
                <form action="{{ url('/my-donasi') }}" class="mt-4">
                    <div class="row">
                        <div class="col-5">
                            <input type="datetime" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-5">
                            <input type="datetime" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
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
                                    @if (count($transaction_donasi) > 0)
                                        @foreach ($transaction_donasi as $donasi)
                                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                                <div class="content-right">
                                                    <h4>
                                                        <a href="{{ url('/my-donasi/show/'.$donasi->id) }}">
                                                            {{ $donasi->type ?? '-' }}
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-donasi/show/'.$donasi->id) }}">
                                                            <span>Nominal : Rp {{ number_format($donasi->nominal) }}</span>
                                                            @if ($donasi->status == 'paid')
                                                                <span class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px; text-transform: uppercase;">{{ $donasi->status ?? '-' }}</span>
                                                            @else
                                                                <span class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px; text-transform: uppercase;">{{ $donasi->status ?? '-' }}</span>
                                                            @endif
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-donasi/show/'.$donasi->id) }}">
                                                            @php
                                                                if ($donasi->date) {
                                                                    Carbon\Carbon::setLocale('id');
                                                                    $date = Carbon\Carbon::createFromFormat('Y-m-d', $donasi->date);
                                                                    $new_date = $date->translatedFormat('d F Y');
                                                                } else {
                                                                    $new_date = '-';
                                                                }
                                                            @endphp
                                                            <span>{{ $new_date ?? '-' }}</span>
                                                        </a>
                                                    </h4>

                                                </div>
                                            </li>
                                        @endforeach
                                        {{ $transaction_donasi->links() }}
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
    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
        <div class="tf-container">
            <a href="{{ url('/my-donasi/tambah') }}" class="tf-btn accent large"> + Tambah</a>
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
            $('#start_date').change(function(){
                var start_date = $(this).val();
                $('#end_date').val(start_date);
            });
        </script>
    @endpush
@endsection
