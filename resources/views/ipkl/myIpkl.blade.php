@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap">
        <div class="bill-content">
            <div class="tf-container">
                <form action="{{ url('/my-ipkl') }}" class="mt-4">
                    <div class="row">
                        <div class="col-5">
                            <input type="datetime" name="start_date" placeholder="Start Date" id="mulai" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-5">
                            <input type="datetime" name="end_date" placeholder="End Date" id="mulai" value="{{ request('end_date') }}">
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
                                    @if (count($transaction_ipkl) > 0)
                                        @foreach ($transaction_ipkl as $ipkl)
                                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                                <div class="content-right">
                                                    @php
                                                        $month = Carbon\Carbon::createFromFormat('m', $ipkl->month)->translatedFormat('F');
                                                    @endphp
                                                    <h4>
                                                        <a href="{{ url('/my-ipkl/show/'.$ipkl->id) }}">
                                                            {{ $ipkl->type ?? '-' }} ({{ $month }} {{ $ipkl->year }})
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-ipkl/show/'.$ipkl->id) }}">
                                                            <span>Nominal : Rp {{ number_format($ipkl->nominal) }}</span>
                                                            @if ($ipkl->status == 'paid')
                                                                <span class="badge" style="color: rgba(20, 78, 7, 0.889); background-color:rgb(186, 238, 162); border-radius:10px;">{{ $ipkl->status ?? '-' }}</span>
                                                            @else
                                                                <span class="badge" style="color: rgba(78, 26, 26, 0.889); background-color:rgb(242, 170, 170); border-radius:10px;">{{ $ipkl->status ?? '-' }}</span>
                                                            @endif
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-ipkl/show/'.$ipkl->id) }}">
                                                            <span>Keterangan : {{ $ipkl->notes ?? '-' }}</span>
                                                        </a>
                                                    </h4>

                                                </div>
                                            </li>
                                        @endforeach
                                        {{ $transaction_ipkl->links() }}
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
@endsection
