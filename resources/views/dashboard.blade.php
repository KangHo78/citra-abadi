@php
$total_enquiry = $data->count();
$total_enquiry_sum = $data->sum('grand_total');
$status_1 = $data->where('status', 1)->count();
$status_2 = $data->where('status', 2)->count();
$status_3 = $data->where('status', 3)->count();
$status_4 = $data->where('status', 4)->count();
$status_5 = $data->where('status', 5)->count();
$status_1_sum = $data->where('status', 1)->sum('grand_total');
$status_2_sum = $data->where('status', 2)->sum('grand_total');
$status_3_sum = $data->where('status', 3)->sum('grand_total');
$status_4_sum = $data->where('status', 4)->sum('grand_total');
$status_5_sum = $data->where('status', 5)->sum('grand_total');
\Illuminate\Support\Facades\Log::info(json_encode($data->get()));

$today = Date("d/m/Y");
$H1 = Date('d/m/Y',strtotime("-1 days"));
$H2 = Date('d/m/Y',strtotime("-2 days"));
$H3 = Date('d/m/Y',strtotime("-3 days"));
$H4 = Date('d/m/Y',strtotime("-4 days"));
$H5 = Date('d/m/Y',strtotime("-5 days"));
$H6 = Date('d/m/Y',strtotime("-6 days"));
$today = \Carbon\Carbon::now();
$todayParse = $today->format('Y-m-d');
// $todayParse = json_encode($today->format('Y-m-d'));
$todayX = \Carbon\Carbon::parse($todayParse);

$H1X = \Carbon\Carbon::createFromFormat('Y-m-d', $todayParse)->subDays(1);
$H2X = \Carbon\Carbon::createFromFormat('Y-m-d', $todayParse)->subDays(2);
$H3X = \Carbon\Carbon::createFromFormat('Y-m-d', $todayParse)->subDays(3);
$H4X = \Carbon\Carbon::createFromFormat('Y-m-d', $todayParse)->subDays(4);
$H5X = \Carbon\Carbon::createFromFormat('Y-m-d', $todayParse)->subDays(5);
$H6X = \Carbon\Carbon::createFromFormat('Y-m-d', $todayParse)->subDays(6);
$countToday = $data->where('created_at', '>=', $todayX)->count();
\Illuminate\Support\Facades\Log::info(json_encode($data->get()));
\Illuminate\Support\Facades\Log::info($data->where('created_at', '>=', $todayX)->get());
$countH1 = $data->whereDate('created_at', '>=', $H1X)->whereDate('created_at', '<=', $todayX)->count();
$countH2 = $data->whereDate('created_at', '>=', $H2X)->whereDate('created_at', '<=', $H1X)->count();
$countH3 = $data->whereDate('created_at', '>=', $H3X)->whereDate('created_at', '<=', $H2X)->count();
$countH4 = $data->whereDate('created_at', '>=', $H4X)->whereDate('created_at', '<=', $H3X)->count();
$countH5 = $data->whereDate('created_at', '>=', $H5X)->whereDate('created_at', '<=', $H4X)->count();
$countH6 = $data->whereDate('created_at', '>=', $H6X)->whereDate('created_at', '<=', $H5X)->count();
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('dashboard') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group pb-1 parent">
                                <h6 class="form-label"><span>Date Start</span></h6>
                                <div class="input-group mb-1">
                                    <span style="padding-bottom: 16px;" class="input-group-text"><i
                                            class="bi bi-calendar"></i></span>
                                            @if(isset($date_start))
                                            <input  placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="" readonly="" 
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly"name="date_start" id="date_start" value="{{ $date_start }}">
                                            @else
                                             <input  placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="" readonly="" 
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly"name="date_start" id="date_start" value="">
                                            @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group pb-1 parent">
                                <h6 class="form-label"><span>Date End</span></h6>
                                <div class="input-group mb-1">
                                    <span style="padding-bottom: 16px;" class="input-group-text"><i
                                            class="bi bi-calendar"></i></span>
                                            @if(isset($date_end))
                                            <input  placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="" readonly=""
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly" name="date_end" id="date_end" value="{{ $date_end }}">
                                            @else
                                            <input  placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="" readonly=""
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly" name="date_end" id="date_end" value="">
                                            @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="d-flex justifty-content-center align-items-center" style="height: 100%;">
                                <button class="btn btn-outline-info rounded-pill" type="submit"
                                    style="padding-left:20px;padding-right:20px">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-6 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <div class="stats-icon pink">
                                    <i class="iconly-boldBag"></i>
                                </div>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold text-primary">Total Enquiry ({{ $total_enquiry }})</h5>
                                <h6 class="font-bold text-primary">Rp. {{ number_format($total_enquiry_sum, 0, '.', ',') }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <div class="stats-icon pink">
                                    <i class="iconly-boldLogout"></i>
                                </div>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold text-primary">Permintaan Masuk ({{ $status_1 }})</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <div class="stats-icon pink">
                                    <i class="iconly-boldPlus"></i>
                                </div>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold text-primary">Penawaran Terkirim ({{ $status_2 }})</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
      

            <div class="col-xl-4 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <div class="stats-icon pink">
                                    <i class="iconly-boldLogout"></i>
                                </div>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold text-warning">Follow Up ({{ $status_3 }})</h5>
                                <h6 class="font-bold mb-0 text-warning">Rp. {{ number_format($status_3_sum, 0, '.', ',') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <div class="stats-icon pink">
                                    <i class="iconly-boldPlus"></i>
                                </div>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold text-danger">Cancel ({{ $status_4 }})</h5>
                                <h6 class="font-bold mb-0 text-danger">Rp. {{ number_format($status_4_sum, 0, '.', ',') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <div class="stats-icon pink">
                                    <i class="iconly-boldPlus"></i>
                                </div>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold text-success">Deal ({{ $status_5 }})</h5>
                                <h6 class="font-bold mb-0 text-success">Rp. {{ number_format($status_5_sum, 0, '.', ',') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <figure class="highcharts-figure">
                            <div id="line-chart"></div>

                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <figure class="highcharts-figure">
                            <div id="pie-cart"></div>

                        </figure>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <figure class="highcharts-figure">
                            <div id="bar-chart"></div>

                        </figure>
                    </div>
                </div>
            </div>
        </div>


    </section>




    @section('scripts')
        <script>
            // var today = Date.now();
            // var H1 = today - 1;
            // var H2 = today - 2;
            // var H3 = today - 3;
            // var H4 = today - 4;
            // var H5 = today - 5;
            // var H6 = today - 6;
            // var todayDate = 
            @php
                
            @endphp
            Highcharts.chart('line-chart', {

                title: {
                    text: 'Data Ditampilkan dalam 7 hari terakhir',
                    align: 'center'
                },

                yAxis: {
                    title: {
                        text: 'Jumlah Enquiry'
                    }
                },

                xAxis: {
                    categories: [
                        "{{ $H6 }}",
                        "{{ $H5 }}",
                        "{{ $H4 }}",
                        "{{ $H3 }}",
                        "{{ $H2 }}",
                        "{{ $H1 }}",
                        "{{ $today }}",
                    ],
                    accessibility: {
                        description: 'Months of the year'
                    }
                },

                

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                series: [{
                    name: 'Enquiry',
                    data: [{{$countH6}}, {{$countH5}}, {{$countH4}}, {{$countH3}}, {{$countH2}}, {{$countH1}},
                        {{$countToday}}
                    ]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });

            Highcharts.chart('pie-cart', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: '7 Hari ( Pie )'
                },
                tooltip: {
                    valuePrefix: 'Rp. ', // Menggunakan simbol mata uang rupiah di sini
                    valueSuffix: ''
                },
                subtitle: {
                    // text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }]
                    }
                },
                series: [{
                    name: 'Percentage',
                    colors: [
                    "#ffc107",
                    "#dc3545",
                    "#198754"
                    ],
                    data: [{
                            name: 'Follow Up',
                            y: {{ $status_3_sum }},
                            sliced: true,
                            selected: true,
                        },
                        {
                            name: 'Cancel',
                            y: {{ $status_4_sum }}
                        },
                        {
                            name: 'Deal',
                            y: {{ $status_5_sum }}
                        },

                    ]
                }]
            });


            Highcharts.chart('bar-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: '7 Hari ( Bar )',
                    align: 'center'
                },
                subtitle: {
                    // text: 'Source: <a ' +
                    //     'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
                    //     'target="_blank">Wikipedia.org</a>',
                    // align: 'left'
                },
                xAxis: {
                    categories: [''],
                    title: {
                        text: null
                    },
                    gridLineWidth: 1,
                    lineWidth: 0
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Dalam Bentuk Rupiah (Rp)',
                        align: 'middle'
                    },
                    labels: {
                        overflow: 'justify'
                    },
                    gridLineWidth: 0
                },
                tooltip: {
                    valuePrefix: 'Rp. ', // Menggunakan simbol mata uang rupiah di sini
                    valueSuffix: ''
                },
                plotOptions: {
                    bar: {
                        borderRadius: '50%',
                        dataLabels: {
                            enabled: true
                        },
                        groupPadding: 0.1
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -30,
                    y: 30,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                colors: [
                    "#ffc107",
                    "#dc3545",
                    "#198754"
                ],
                series: [{
                    name: ['Follow Up'],
                    data: [{{ $status_3_sum }}],
                },{
                    name: ['Cancel'],
                    data: [{{ $status_4_sum }}]
                },{
                    name: ['Deal'],
                    data: [{{ $status_5_sum }}]
                }]
            });
        </script>
    @endsection

</x-app-layout>
