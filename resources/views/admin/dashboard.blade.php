@extends('layout.main')
@section('content')
    <!-- Start Content-->

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex align-items-center mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-0" id="dash-daterange" name="daterange">
                                <span class="input-group-text bg-blue border-blue text-white">
                                    <i class="mdi mdi-calendar-range"></i>
                                </span>
                            </div>
                            <button type="submit" href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </button>
                        </form>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded bg-soft-primary">
                                    <i class="dripicons-wallet font-24 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span>{{ toCurrency($revenue, 'IDN') }}</span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Total Pendapatan</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded bg-soft-success">
                                    <i class="dripicons-basket font-24 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $soldProduct }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Produk Terjual</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded bg-soft-info">
                                    <i class="dripicons-swap font-24 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="tesxt-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $inProgress }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Transaksi Berjalan</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded bg-soft-warning">
                                    <i class="dripicons-user-group font-24 avatar-title text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $cusCount }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Pelanggan</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card" dir="ltr">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Transaksi Tahun Ini</h4>
                        <div class="text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-danger"></i>
                                    Gagal</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-blue"></i>
                                    Berhasil</span>
                            </p>
                        </div>
                        <div id="morris-bar-stacked" style="height: 350px;" class="morris-chart"
                            data-colors="#f1556c,#4a81d4"></div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card" dir="ltr">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Area Chart</h4>
                        <div class="text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-danger"></i>
                                    Gagal</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-blue"></i>
                                    Berhasil</span>
                            </p>
                        </div>
                        <div id="morris-area-example" style="height: 350px;" class="morris-chart"
                            data-colors="#f1556c,#4a81d4"></div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title mb-3">Produk Terlaris</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">Produk</th>
                                        <th class="border-top-0">Satuan</th>
                                        <th class="border-top-0">Tanggal Ditambahkan</th>
                                        <th class="border-top-0">Harga</th>
                                        <th class="border-top-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($topProduct->count() > 0)
                                        @foreach ($topProduct as $p)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('uploads/product') . '/' . $p->product_pic }}"
                                                        alt="product-pic" height="36" />
                                                    <span class="ms-2">{{ $p->name }}</span>
                                                </td>
                                                <td>
                                                    {{ $p->unit }}
                                                </td>
                                                <td>{{ $p->created_at }}</td>
                                                <td>{{ toCurrency($p->price, 'IDN') }}</td>


                                                <td>
                                                    @if ($p->stock > 0)
                                                        <span class="badge bg-soft-success text-success">Tersedia</span>
                                                    @else
                                                        <span class="badge bg-soft-danger text-danger">Habis</span>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Transaksi Terakhir</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-nowrap table-hover table-centered m-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-top-0">Kode</th>
                                        <th class="border-top-0">Tanggal</th>
                                        <th class="border-top-0">Total</th>
                                        <th class="border-top-0">Payment</th>
                                        <th class="border-top-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($latestOrder->count() > 0)
                                        @foreach ($latestOrder as $o)
                                            <tr>
                                                <td>
                                                    <span>{{ $o->code }}</span>
                                                </td>
                                                <td>
                                                    {{ $o->created_at }}
                                                </td>
                                                <td>{{ toCurrency($o->total_payment, 'IDN') }}</td>
                                                <td>
                                                    <h5> {!! getPayStatusLabel($o->payment_status) !!}
                                                    </h5>
                                                </td>
                                                <td>
                                                    <h5> {!! getOrderStatusLabel($o->status) !!}
                                                    </h5>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive-->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <script src="{{ asset('templates/assets/libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ asset('templates/assets/libs/raphael/raphael.min.js') }} "></script>

    <script>
        $(document).ready(function() {

            let chartMonth = JSON.stringify('<?= $chartMonth ?>');
            chartMonth = JSON.parse(JSON.parse(chartMonth));


            let chartYears = JSON.stringify('<?= $chartYear ?>');
            chartYears = JSON.parse(JSON.parse(chartYears));

            $("#dash-daterange").flatpickr({
                altInput: !0,
                mode: "range",
                altFormat: "F j, y",
                defaultDate: "today"
            });
            ! function($) {
                "use strict";

                var MorrisCharts = function() {};
                //creates Stacked chart
                MorrisCharts.prototype.createStackedChart = function(element, data, xkey, ykeys, labels,
                        lineColors) {
                        Morris.Bar({
                            element: element,
                            data: data,
                            xkey: xkey,
                            ykeys: ykeys,
                            stacked: true,
                            labels: labels,
                            hideHover: 'auto',
                            dataLabels: false,
                            resize: true, //defaulted to true
                            gridLineColor: 'rgba(65, 80, 95, 0.07)',
                            barColors: lineColors
                        });
                    },

                    //creates area chart
                    MorrisCharts.prototype.createAreaChart = function(element, pointSize, lineWidth, data, xkey,
                        ykeys,
                        labels, opacity, lineColors) {
                        Morris.Area({
                            element: element,
                            pointSize: pointSize,
                            lineWidth: lineWidth,
                            data: data,
                            xkey: xkey,
                            dataLabels: false,
                            ykeys: ykeys,
                            labels: labels,
                            fillOpacity: opacity,
                            hideHover: 'auto',
                            resize: true,
                            gridLineColor: 'rgba(65, 80, 95, 0.07)',
                            lineColors: lineColors
                        });
                    },

                    MorrisCharts.prototype.init = function() {

                        //creating Stacked chart
                        var $stckedData = chartMonth
                        var colors = ['#f1556c', '#4fc6e1'];
                        var dataColors = $("#morris-bar-stacked").data('colors');
                        if (dataColors) {
                            colors = dataColors.split(",");
                        }
                        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b'], ["Gagal",
                            "Berhasil"
                        ], colors);



                        //creating area chart
                        var $areaData = chartYears
                        var colors = ["#f1556c", '#4a81d4'];
                        var dataColors = $("#morris-area-example").data('colors');

                        if (dataColors) {
                            colors = dataColors.split(",");
                        }
                        this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b'], ["Gagal",
                            "Berhasil"
                        ], ['1'], colors);

                    },
                    //init
                    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
            }(window.jQuery),

            //initializing 
            function($) {
                "use strict";
                $.MorrisCharts.init();
            }(window.jQuery);
        })
    </script>
@endsection
