@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap">
        <div class="bill-content">
            <div class="tf-container">
                <form action="{{ url('/my-infrastruktur') }}" class="mt-4">
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
                                    @if (count($infrastrukturs) > 0)
                                        @foreach ($infrastrukturs as $infrastruktur)
                                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                                <div class="content-right">
                                                    <h4>
                                                        <a href="{{ url('/my-infrastruktur/show/'.$infrastruktur->id) }}">
                                                            {{ $infrastruktur->title ?? '-' }}
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-infrastruktur/show/'.$infrastruktur->id) }}">
                                                            {{ $infrastruktur->description ?? '-' }}
                                                            <span class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;"><i class="fa fa-eye"></i></span>
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('/my-infrastruktur/show/'.$infrastruktur->id) }}">
                                                            @php
                                                                if ($infrastruktur->date) {
                                                                    Carbon\Carbon::setLocale('id');
                                                                    $date = Carbon\Carbon::createFromFormat('Y-m-d', $infrastruktur->date);
                                                                    $new_date = $date->translatedFormat('l, d F Y');
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
                                        {{ $infrastrukturs->links() }}
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
            $('#start_date').change(function(){
                var start_date = $(this).val();
                $('#end_date').val(start_date);
            });
        </script>
    @endpush
@endsection
