@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-infrastruktur') }}" class="back-btn"> <i class="icon-left"></i> </a>
    @endif
@endsection
@section('container')
    <div id="app-wrap" class="mt-4">
        <div class="bill-content">
            <div class="tf-container ms-4 me-4">
                <ul>
                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Tanggal
                            </p>
                            <h5>
                                @php
                                    if ($infrastruktur->date) {
                                        Carbon\Carbon::setLocale('id');
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $infrastruktur->date);
                                        $new_date = $date->translatedFormat('l, d F Y');
                                    } else {
                                        $new_date = '-';
                                    }
                                @endphp
                                {{ $new_date  }}
                            </h5>
                        </div>
                    </li>


                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Judul
                            </p>
                            <h5>
                                {{ $infrastruktur->title ?? '-' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Deskripsi
                            </p>
                            <h5>
                                {!! $infrastruktur->description ? nl2br(e($infrastruktur->description)) : '-' !!}
                            </h5>
                        </div>
                    </li>

                    @if (count($infrastruktur->items))
                        @foreach ($infrastruktur->items as $key => $item)
                            <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                                <div class="content-right">
                                    <p>
                                        File {{ count($infrastruktur->items) <= 1 ? '' : $key + 1 }}
                                    </p>
                                    <h5>
                                        @if ($item->infrastruktur_file_path)
                                            <div class="badge clickable" data-url="{{ url('/storage/'.$item->infrastruktur_file_path) }}" style="color: rgb(21, 47, 118); background-color:rgba(192, 218, 254, 0.889); border-radius:10px; cursor: pointer;" target="_blank"><i class="fa fa-download me-1"></i> {{ $item->infrastruktur_file_name }}</div>
                                        @else
                                            -
                                        @endif
                                    </h5>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                            <div class="content-right">
                                <p>
                                    File
                                </p>
                                <h5>
                                    -
                                </h5>
                            </div>
                        </li>
                    @endif
                </ul>
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
            $(function () {
                $(".clickable").on("click", function() {
                    window.location.href = $(this).data("url");
                });
            });
        </script>
    @endpush
@endsection
