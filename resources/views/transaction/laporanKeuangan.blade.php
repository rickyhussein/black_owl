@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <div id="app-wrap" class="mt-4">
        <div class="bill-content">
            <div class="tf-container ms-1 me-1">
                <div class="row">
                      <div class="col-12">
                        <div class="card text-dark bg-light mb-3">
                            <div class="row  d-flex align-items-center">
                                <div class="col-3">
                                    <div class="ms-4 d-flex justify-content-center align-items-center bg-success text-white rounded" style="width: 50px; height: 50px;">
                                        <i class="fas fa-hand-holding-usd fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="card-body">
                                      <h5 class="card-title">Total Pemasukan</h5>
                                      <p class="card-text">Rp {{ number_format($transaction_in_paid) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="card text-dark bg-light mb-3">
                            <div class="row  d-flex align-items-center">
                                <div class="col-3">
                                    <div class="ms-4 d-flex justify-content-center align-items-center bg-danger text-white rounded" style="width: 50px; height: 50px;">
                                        <i class="fas fa-search-dollar fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="card-body">
                                      <h5 class="card-title">Total Outstanding</h5>
                                      <p class="card-text">Rp {{ number_format($transaction_in_unpaid) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="card text-dark bg-light mb-3 clickable" data-url="{{ url('/laporan-pengeluaran') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" style="cursor: pointer;">
                            <div class="row  d-flex align-items-center">
                                <div class="col-3">
                                    <div class="ms-4 d-flex justify-content-center align-items-center bg-warning text-white rounded" style="width: 50px; height: 50px;">
                                        <i class="fas fa-money-check-alt fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="card-body">
                                      <h5 class="card-title">Total Pengeluaran</h5>
                                      <p class="card-text">Rp {{ number_format($transaction_out) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="card text-dark bg-light mb-3">
                            <div class="row  d-flex align-items-center">
                                <div class="col-3">
                                    <div class="ms-4 d-flex justify-content-center align-items-center bg-primary text-white rounded" style="width: 50px; height: 50px;">
                                        <i class="far fa-money-bill-alt fa-2x"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="card-body">
                                      <h5 class="card-title">Sisa Saldo</h5>
                                      <p class="card-text">Rp {{ number_format($sisa) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                              <h3 class="card-title">Keuangan</h3>
                            </div>
                          </div>
                          <div class="card-body">


                            <div class="position-relative mb-4">
                              <canvas id="transactionChart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                              <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Tahun {{ $year }}
                              </span>

                            </div>
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

    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
        <div class="tf-container">
            <a href="#" id="btn-popup-down" class="tf-btn accent large">Filter</a>
        </div>
    </div>

    <div class="tf-panel down">
        <div class="panel_overlay"></div>
        <div class="panel-box panel-down">
            <div class="header">
                <div class="tf-container">
                    <div class="tf-statusbar d-flex justify-content-center align-items-center">
                        <a href="#" class="clear-panel"> <i class="icon-close1"></i> </a>
                        <h3>Filter</h3>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="tf-container">
                    <form class="tf-form-verify" action="{{ url('/laporan-keuangan') }}" method="GET" enctype="multipart/form-data">
                        <div class="group-input">
                            <select name="month" id="month" class="month" data-live-search="true">
                                <option value="">Month</option>
                                @foreach ($months as $moth_num => $month_name)
                                    <option value="{{ $moth_num }}" {{ $moth_num == request('month') ? 'selected="selected"' : '' }}>{{ $month_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="group-input">
                            @php
                                $last= 2020;
                                $now = date('Y') + 5;
                            @endphp
                            <select name="year" id="year" class="year" data-live-search="true">
                                <option value="">Year</option>
                                @for ($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}" {{ $i == request('year') ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="group-input">
                            <input type="datetime" class="start_date" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
                        </div>
                        <div class="group-input">
                            <input type="datetime" class="end_date" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
                        </div>
                        <div class="mt-7 mb-6">
                            <button type="submit" class="tf-btn accent">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('script')
        <script>
            var ctx = document.getElementById('transactionChart').getContext('2d');

            var transactionChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_values($months)) !!}, // Label Bulan
                    datasets: [
                        {
                            label: 'Pemasukan',
                            backgroundColor: '#28a745',
                            data: {!! json_encode($transaction_in_paid_array) !!}
                        },
                        {
                            label: 'Outstanding',
                            backgroundColor: '#dc3545',
                            data: {!! json_encode($transaction_in_unpaid_array) !!}
                        },
                        {
                            label: 'Pengeluaran',
                            backgroundColor: '#ffc107',
                            data: {!! json_encode($transaction_out_array) !!}
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {
                                    return 'Rp ' + value.toLocaleString();
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return data.datasets[tooltipItem.datasetIndex].label + ': Rp ' + tooltipItem.yLabel.toLocaleString();
                            }
                        }
                    }
                }
            });

            $(".clickable").on("click", function() {
                window.location.href = $(this).data("url");
            });

            $('.start_date').change(function(){
                var start_date = $(this).val();
                $('.end_date').val(start_date);
                $('.month').val(null);
                $('.year').val(null);
            });

            $('.end_date').change(function(){
                $('.month').val(null);
                $('.year').val(null);
            });

            $('.month').change(function(){
                $('.start_date').val(null);
                $('.end_date').val(null);
            });

            $('.year').change(function(){
                $('.start_date').val(null);
                $('.end_date').val(null);
            });
        </script>
    @endpush

@endsection
