@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="page-title text-blue p-15">Dashboard</div>
            <div class="stats_info">
                <div class="col-xs-12 col-sm-12 pr-0 mpl-0">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fas fa-user-plus"></i> User Registration Statistics</div>
                        <div class="panel-body">
                            <canvas id="yearChart" style="width: 100%; height: 40vh;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $registration_stats_arr = array("months" => array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"), "users" => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0));
    @endphp
    
    @foreach ($data['user_registration_bar_graph'] as $keyG => $valueG)
        @php $registration_stats_arr['users'][$keyG-1] = $valueG['total']; @endphp
    @endforeach

    @php
        $registration_stats_arr['months'] = "'" . implode ( "', '", $registration_stats_arr['months'] ) . "'";
        $registration_stats_arr['users'] = "'" . implode ( "', '", $registration_stats_arr['users'] ) . "'";
    @endphp

    <script type="text/javascript">
        $(document).ready(function()
        {
            // BAR GRAPH
            var ctxB = document.getElementById("yearChart").getContext('2d');
            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: [<?php echo $registration_stats_arr['months']; ?>],
                    datasets: [{
                        label: 'Users Registered in ' + <?php echo date('Y'); ?>,
                        data: [<?php echo $registration_stats_arr['users']; ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    </script>
@stop