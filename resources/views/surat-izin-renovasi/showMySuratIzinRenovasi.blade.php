@extends('layouts.app')
@section('back')
    @if (auth()->user())
        <a href="{{ url('/my-surat-izin-renovasi') }}" class="back-btn"> <i class="icon-left"></i> </a>
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
                                    if ($surat_izin_renovasi->date) {
                                        Carbon\Carbon::setLocale('id');
                                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->date);
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
                                Nama Lengkap
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->user->name ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Alamat
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->user->alamat ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                RT
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->user->rt ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                RW
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->user->rw ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Nomor HP
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->user->no_hp ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Email
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->user->email ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Jenis Renovasi
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->type ?? '-' }} {{ $surat_izin_renovasi->type_text ? ': ' . $surat_izin_renovasi->type_text : '' }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Luas Area
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->size ?? '-'  }} m²
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Tanggal Mulai
                            </p>
                            <h5>
                                @php
                                    if ($surat_izin_renovasi->start_date) {
                                        Carbon\Carbon::setLocale('id');
                                        $start_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->start_date);
                                        $new_start_date = $start_date->translatedFormat('l, d F Y');
                                    } else {
                                        $new_start_date = '-';
                                    }
                                @endphp
                                {{ $new_start_date  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Tanggal Selesai
                            </p>
                            <h5>
                                @php
                                    if ($surat_izin_renovasi->end_date) {
                                        Carbon\Carbon::setLocale('id');
                                        $end_date = Carbon\Carbon::createFromFormat('Y-m-d', $surat_izin_renovasi->end_date);
                                        $new_end_date = $end_date->translatedFormat('l, d F Y');
                                    } else {
                                        $new_end_date = '-';
                                    }
                                @endphp
                                {{ $new_end_date  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Kontraktor / Pelaksana
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->contractor ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Nama Perusahaan
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->company_name ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Nomor Telepon Perusahaan
                            </p>
                            <h5>
                                {{ $surat_izin_renovasi->company_phone ?? '-'  }}
                            </h5>
                        </div>
                    </li>

                    <li class="list-card-invoice tf-topbar d-flex justify-content-between align-items-center">
                        <div class="content-right">
                            <p>
                                Dokumen Pendukung
                            </p>
                            <h5>
                                <div class="form-check">
                                    <input class="form-check-input @error('fotokopi_ktp_pemohon') is-invalid @enderror" type="checkbox" id="fotokopi_ktp_pemohon" name="fotokopi_ktp_pemohon" value="{{ old('fotokopi_ktp_pemohon', $surat_izin_renovasi->fotokopi_ktp_pemohon) }}">
                                    <label class="form-check-label" for="fotokopi_ktp_pemohon">
                                        Fotokopi KTP Pemohon
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input @error('gambar_design_renovasi') is-invalid @enderror" type="checkbox" id="gambar_design_renovasi" name="gambar_design_renovasi" value="{{ old('gambar_design_renovasi', $surat_izin_renovasi->gambar_design_renovasi) }}">
                                    <label class="form-check-label" for="gambar_design_renovasi">
                                        Gambar Design Renovasi
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input @error('surat_persetujuan_tetangga_terdekat') is-invalid @enderror" type="checkbox" id="surat_persetujuan_tetangga_terdekat" name="surat_persetujuan_tetangga_terdekat" value="{{ old('surat_persetujuan_tetangga_terdekat', $surat_izin_renovasi->surat_persetujuan_tetangga_terdekat) }}">
                                    <label class="form-check-label" for="surat_persetujuan_tetangga_terdekat">
                                        Surat Persetujuan Tetangga Terdekat
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input @error('dokumen_lainnya') is-invalid @enderror" type="checkbox" id="dokumen_lainnya" name="dokumen_lainnya" value="{{ old('dokumen_lainnya', $surat_izin_renovasi->dokumen_lainnya) }}">
                                    <label class="form-check-label" for="dokumen_lainnya">
                                        Dokumen Lainnya {{ $surat_izin_renovasi->dokumen_text ? ': ' . $surat_izin_renovasi->dokumen_text : '' }}
                                    </label>
                                </div>
                            </h5>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div>

    <div class="bottom-navigation-bar st2 bottom-btn-fixed" style="bottom:65px">
        <div class="tf-container">
            <div class="row">
                <div class="col-6 mb-4">
                    <a class="tf-btn success large" href="{{ url('/my-surat-izin-renovasi/edit/'.$surat_izin_renovasi->id) }}">Edit</a>
                </div>
                <div class="col-6 mb-4">
                    <a href="#" id="btn-logout" class="tf-btn danger large">Delete</a>
                </div>
                <div class="col-12">
                    <a class="tf-btn accent large" href="{{ url('/my-surat-izin-renovasi/print/'.$surat_izin_renovasi->id) }}">Print</a>
                </div>
            </div>
        </div>
    </div>

    <div class="tf-panel logout">
        <div class="panel_overlay"></div>
          <div class="panel-box panel-center panel-logout">
                <div class="heading">
                    <h2 class="text-center">Anda yakin ingin menghapus data ini?</h2>
                </div>
                <div class="bottom">
                    <a class="clear-panel" href="#">Cancel</a>
                    <a class="clear-panel critical_color" href="{{ url('/my-surat-izin-renovasi/delete/'.$surat_izin_renovasi->id) }}">Delete</a>
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
            $('input[type="checkbox"]').each(function() {
                var isChecked = $(this).val() == 1;
                $(this).prop('checked', isChecked);
            });

            $('body').on('change', 'input[type="checkbox"]', function (event) {
                if(this.checked) {
                    $(this).val(1);
                } else {
                    $(this).val(null);
                }
            });
        </script>
    @endpush

@endsection
