
@extends('layouts.navigation')

@section('content')



     <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <a href="{{ route('members.index')}}">
                        <div class="stat-text">Members </div>
                        <div class="stat-digit"> <i class="fa fa-users"></i>{{$staff}}</div>
                    </a>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <a href="{{ route('savings.index')}}">
                        <div class="stat-text">Savings</div>
                        <div class="stat-digit"> <i class="fa fa-money"></i>{{number_format ($savings)}}/=</div>

                    </a>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <a href="{{ route('loans.index')}}">
                        <div class="stat-text">Loans</div>
                        <div class="stat-digit"> <i class="fa fa-usd"></i> {{$loan}}</div>
                    </a>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Account Number</div>
                        <div class="stat-digit"> <i class="fa fa-id-card"></i></div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <div class="row">


    </div>

    <style type="text/css">
        #container {
            height: 400px;
        }

        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

                </style>



    <script src="{{ asset('code\highcharts.js')}}"></script>
    <script src="{{ asset('code\modules\exporting.js')}}"></script>
    <script src="{{ asset('code\modules\export-data.js')}}"></script>
    <script src="{{ asset('code\modules\accessibility.js')}}"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>

    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Members against Savings'
            },
            subtitle: {
                text: 'Source: <a href="#">Member savings</a>'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Savings'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: ''
            },
            series: [{
                name: 'Population',
                data: [
                    @php
                    foreach ($membersavings as $org){
                        $myvar = $org['name'];
                        echo "[   '".$myvar."',".  $org['amount']."],";

                    }
                    @endphp
                ],

                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.0f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
                </script>
            </body>
    @endsection
