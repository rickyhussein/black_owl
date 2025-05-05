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
                              <form action="{{ url('/laporan-keuangan') }}">
                                <div class="row mb-2">
                                    <div class="col">
                                        <select name="month" id="month" class="@error('month') is-invalid @enderror select2" data-live-search="true">
                                            <option value="">Month</option>
                                            @foreach ($months as $moth_num => $month_name)
                                                <option value="{{ $moth_num }}" {{ $moth_num == request('month') ? 'selected="selected"' : '' }}>{{ $month_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        @php
                                            $last= 2020;
                                            $now = date('Y');
                                        @endphp
                                        <select style="width: 100px" name="year" id="year" class="@error('year') is-invalid @enderror select2" data-live-search="true">
                                            <option value="">Year</option>
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
                                    <div class="col">
                                        <button type="submit" id="search" class="btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
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


    @push('script')
        <script>
            $(function () {
                $(".select2").select2({
                    width: '70px',
                });
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
            });
        </script>
    @endpush

@endsection
