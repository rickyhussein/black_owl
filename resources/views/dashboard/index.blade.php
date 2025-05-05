@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="row">
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
                <div class="info-box clickable" data-url="{{ url('/pengeluaran') }}{{ $_GET?'?'.$_SERVER['QUERY_STRING']: '' }}" style="cursor: pointer;">
                  <span class="info-box-icon bg-warning" style="color: white"><i class="fas fa-money-check-alt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Pengeluaran</span>
                    <span class="info-box-number">Rp {{ number_format($transaction_out) }}</span>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-primary"><i class="far fa-money-bill-alt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Sisa Saldo</span>
                    <span class="info-box-number">{{ number_format($sisa) }}</span>
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
                        <button type="button" class="btn btn-secondary btn-sm text-white ml-3 mb-3"  data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Filter</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/dashboard') }}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="month" id="month" class="form-control selectpicker month" data-live-search="true">
                                                <option value="">Month</option>
                                                @foreach ($months as $moth_num => $month_name)
                                                    <option value="{{ $moth_num }}" {{ $moth_num == request('month') ? 'selected="selected"' : '' }}>{{ $month_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            @php
                                                $last= 2020;
                                                $now = date('Y') + 5;
                                            @endphp
                                            <select name="year" id="year" class="form-control selectpicker year" data-live-search="true">
                                                <option value="">Year</option>
                                                @for ($i = $now; $i >= $last; $i--)
                                                    <option value="{{ $i }}" {{ $i == request('year') ? 'selected="selected"' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="datetime" class="form-control start_date" name="start_date" placeholder="Start Date" id="start_date" value="{{ request('start_date') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="datetime" class="form-control end_date" name="end_date" placeholder="End Date" id="end_date" value="{{ request('end_date') }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-secondary">Search</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
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
            var ctx = document.getElementById('transactionChart').getContext('2d');

            var transactionChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_values($months)) !!},
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
                $('.month').val('').selectpicker('refresh');
                $('.year').val('').selectpicker('refresh');
            });

            $('.end_date').change(function(){
                $('.month').val('').selectpicker('refresh');
                $('.year').val('').selectpicker('refresh');
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
