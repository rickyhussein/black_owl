@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Users</span>
                    <span class="info-box-number">{{ number_format($total_users) }}</span>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="fas fa-hand-holding-usd"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Pemasukan</span>
                    <span class="info-box-number">Rp {{ number_format($transaction_in_paid) }}</span>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="fas fa-search-dollar"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Outstanding</span>
                    <span class="info-box-number">Rp {{ number_format($transaction_in_unpaid) }}</span>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-warning" style="color: white"><i class="fas fa-money-check-alt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Pengeluaran</span>
                    <span class="info-box-number">Rp {{ number_format($transaction_out) }}</span>
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
                      <form action="{{ url('/dashboard') }}">
                        <div class="form-row mb-2">
                            <div class="col">
                                @php
                                    $last= 2020;
                                    $now = date('Y');
                                @endphp
                                <select name="year" id="year" class="form-control @error('year') is-invalid @enderror selectpicker" data-live-search="true">
                                    <option value="">Year</option>
                                    @for ($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}" {{ $i == Request::get('year') ? 'selected="selected"' : '' }}>{{ $i }}</option>
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

    @push('script')
        <script>
            $(function () {
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
            });
        </script>
    @endpush
@endsection
