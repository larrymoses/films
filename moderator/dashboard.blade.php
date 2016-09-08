@extends('layouts.moderator')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <h3 class="page-title"> Dashboard
            <small>dashboard & statistics</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{url('home')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <a href="{{url('unrated')}}" tool-tip="Click Me">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{$data['unrated']}}">0</span>/{{$data['all']}}
                            </div>
                            <div class="desc"> Un Moderated Films </div>
                        </div>
                        <a class="more" href="{{url('unrated')}}"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </a>
            <a href="{{url('rated')}}">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{$data['rated']}}">0</span>/{{$data['all']}}
                            </div>
                            <div class="desc"> Moderated Films  </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </a>
            <a href="{{url('declined')}}">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{$data['declined']}}">0</span>/{{$data['all']}}</div>
                            <div class="desc"> Rejected Films </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        <div class="clearfix"></div>
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">

                <div class="portlet green-sharp box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-charts"></i>Summary Chart </div>
                    </div>
                    <div class="portlet-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('pagelevel')
    <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        window.onload = function () {
            var r=$("#rated").val();
            var u=$("#unrated").val();
            var d=$("#declined").val();
            var chart = new CanvasJS.Chart("chartContainer",
                    {
                        title:{
                            text: "KFCB FILMS"
                        },
                        animationEnabled: true,
                        axisY: {
                            title: "Films(Count)"
                        },
                        legend: {
                            verticalAlign: "bottom",
                            horizontalAlign: "center"
                        },
                        theme: "theme2",
                        data: [

                            {
                                type: "column",
                                showInLegend: true,
                                legendMarkerColor: "grey",
                                legendText: "FILMS Summary",
                                dataPoints: [
                                    {y: <?php echo $data['unrated'] ?>,  label: "Un Moderated" },
                                    {y: <?php echo $data['declined'] ?>,  label: "Rejected"},
                                    {y: <?php echo $data['rated'] ?>, label: "Moderated"},

                                ]
                            }
                        ]
                    });

            chart.render();
        }
    </script>
    <script type="text/javascript" src="{{asset('/assets/source/canvasjs.min.js')}}"></script>
@endsection
