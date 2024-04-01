<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">This is the main page.</p>
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
                <form action="https://nara.prog/dashboard">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group pb-1 parent">
                                <h6 class="form-label"><span>Date Start</span></h6>
                                <div class="input-group mb-1">
                                    <span style="padding-bottom: 16px;" class="input-group-text"><i
                                            class="bi bi-calendar"></i></span>
                                            <input name="date" id="date" placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="2024-02-02" readonly="" style="background-color:#eeeeee"
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group pb-1 parent">
                                <h6 class="form-label"><span>Date End</span></h6>
                                <div class="input-group mb-1">
                                    <span style="padding-bottom: 16px;" class="input-group-text"><i
                                            class="bi bi-calendar"></i></span>
                                            <input name="date" id="date" placeholder="Date"
                                                    class="datepicker date validation required form-control form-control-lg flatpickr-input"
                                                    value="2024-02-02" readonly="" style="background-color:#eeeeee"
                                                    onchange="generateCode()" type="hidden"><input
                                                    class="datepicker date validation required  form-control form-control-lg datepicker date validation required   form-control input"
                                                    placeholder="Date" tabindex="0" type="text"
                                                    readonly="readonly">
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
                                <h5 class="font-bold text-primary">Total Enquiry (50)</h5>
                                <h6 class="font-bold text-primary">Rp. 55.000.000</h6>

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
                                <h5 class="font-bold text-primary">Permintaan Masuk (30)</h5>
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
                                <h5 class="font-bold text-primary">Penawaran Terkirim (10)</h5>
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
                                <h5 class="font-bold text-warning">Follow Up (4)</h5>
                                <h6 class="font-bold mb-0 text-warning">Rp. 25.000.000</h6>
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
                                <h5 class="font-bold text-danger">Cancel (3)</h5>
                                <h6 class="font-bold mb-0 text-danger">Rp. 10.000.000</h6>
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
                                <h5 class="font-bold text-success">Deal (3)</h5>
                                <h6 class="font-bold mb-0 text-success">Rp. 15.000.000</h6>
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
                        '08 February 2024',
                        '09 February 2024',
                        '10 February 2024',
                        '11 February 2024',
                        '12 February 2024',
                        '13 February 2024',
                        '14 February 2024',
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
                    data: [5, 6, 7, 9, 7, 10,
                        11
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
                            y: 120.00,
                            sliced: true,
                            selected: true,
                        },
                        {
                            name: 'Cancel',
                            y: 50.00
                        },
                        {
                            name: 'Deal',
                            y: 100.00
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
                    data: [25000000],
                },{
                    name: ['Cancel'],
                    data: [10000000]
                },{
                    name: ['Deal'],
                    data: [15000000]
                }]
            });
        </script>
    @endsection

</x-app-layout>
