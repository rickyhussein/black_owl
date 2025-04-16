@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap">
        <div class="tf-container">
            <div class="tf-tab">
                <ul class="menu-tabs tabs-food">
                    <li class="nav-tab {{ $active_tab == 'my' ? 'active' : '' }}">Saya</li>
                    <li class="nav-tab {{ $active_tab == 'all' ? 'active' : '' }}">Semua Orang</li>
                </ul>

                <div class="tf-spacing-20"></div>
                <div class="tf-spacing-20"></div>
                <div class="tf-spacing-20"></div>


                <div class="content-tab pt-tab-space mb-5">
                    <div id="tab-gift-item app-wrap" class="app-wrap {{ $active_tab == 'my' ? 'active-content' : 'hidden' }}">

                        <form action="{{ url('/my-kritik-saran') }}" style="margin-top: -60px; margin-bottom: 20px;">
                            <div class="row">
                                <div class="col-10">
                                    <input type="text" name="search" placeholder="Search.." value="{{ request('search') }}">
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="bill-content">
                            <div class="tf-container">
                                <ul class="mb-5">
                                    @if (count($my_kritik_sarans) > 0)
                                        @foreach ($my_kritik_sarans as $my_kritik_saran)
                                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                                <div class="content-right">
                                                    <h4>
                                                        <a href="{{ url('my-kritik-saran/show/'.$my_kritik_saran->id) }}">
                                                            {{ $my_kritik_saran->user->name ?? '-' }}
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('my-kritik-saran/show/'.$my_kritik_saran->id) }}">
                                                            <span>
                                                                @php
                                                                    if ($my_kritik_saran->date) {
                                                                        Carbon\Carbon::setLocale('id');
                                                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $my_kritik_saran->date);
                                                                        $new_date = $date->translatedFormat('l, d F Y');
                                                                    } else {
                                                                        $new_date = '-';
                                                                    }
                                                                @endphp
                                                                {{ $new_date  }}
                                                            </span>
                                                            <span class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;"><i class="fa fa-eye"></i></span>
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('my-kritik-saran/show/'.$my_kritik_saran->id) }}">
                                                            <span>{{ $my_kritik_saran->judul ?? '-' }}</span>
                                                        </a>
                                                    </h4>

                                                </div>
                                            </li>
                                        @endforeach
                                        {{ $my_kritik_sarans->links() }}
                                    @else
                                        <center>
                                        <hr> No Data Available <hr>
                                        </center>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="tab-gift-item-2 app-wrap" class="app-wrap {{ $active_tab == 'all' ? 'active-content' : 'hidden' }}">
                        <form action="{{ url('/my-kritik-saran') }}" style="margin-top: -60px; margin-bottom: 20px;">
                            <div class="row">
                                <div class="col-10">
                                    <input type="text" name="search_2" placeholder="Search.." value="{{ request('search_2') }}">
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="bill-content">
                            <div class="tf-container">
                                <ul class="mb-5">
                                    @if (count($all_kritik_sarans) > 0)
                                        @foreach ($all_kritik_sarans as $all_kritik_saran)
                                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                                <div class="content-right">
                                                    <h4>
                                                        <a href="{{ url('my-kritik-saran/show/'.$all_kritik_saran->id) }}">
                                                            {{ $all_kritik_saran->user->name ?? '-' }}
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('my-kritik-saran/show/'.$all_kritik_saran->id) }}">
                                                            <span>
                                                                @php
                                                                    if ($all_kritik_saran->date) {
                                                                        Carbon\Carbon::setLocale('id');
                                                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $all_kritik_saran->date);
                                                                        $new_date = $date->translatedFormat('l, d F Y');
                                                                    } else {
                                                                        $new_date = '-';
                                                                    }
                                                                @endphp
                                                                {{ $new_date  }}
                                                            </span>
                                                            <span class="badge" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px;"><i class="fa fa-eye"></i></span>
                                                        </a>
                                                        <a style="font-size: 10px" href="{{ url('my-kritik-saran/show/'.$all_kritik_saran->id) }}">
                                                            <span>{{ $all_kritik_saran->judul ?? '-' }}</span>
                                                        </a>
                                                    </h4>

                                                </div>
                                            </li>
                                        @endforeach
                                        {{ $all_kritik_sarans->links() }}
                                    @else
                                        <center>
                                        <hr> No Data Available All<hr>
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

    <div class="bottom-navigation-bar st1 bottom-btn-fixed" style="bottom:50px">
        <div class="tf-container">
            <a href="{{ url('/my-kritik-saran/tambah') }}" class="tf-btn accent large"> + Tambah</a>
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
            $(document).ready(function () {
                $('.menu-tabs .nav-tab').click(function () {
                    $('.menu-tabs .nav-tab').removeClass('active');
                    $('.content-tab > div').removeClass('active-content').addClass('hidden');

                    $(this).addClass('active');

                    let tabIndex = $(this).index();

                    $('.content-tab > div').eq(tabIndex).removeClass('hidden').addClass('active-content');
                });

                $('.menu-tabs .nav-tab.active').trigger('click');
            });
        </script>
    @endpush
@endsection
