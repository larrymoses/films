@extends('layouts.superadmin')
@section('title', 'Detailed Report')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN TAB PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title blue">
                            <h1><span class="strong font-red text-align-center">FILM RATING REPORT</span></h1>
                        </div>
                        <input type="hidden" id="entityIDs" value="{{$film->id}}">
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Film Title: <strong>{{$film->name}}</strong></h4>
                                    <h4>Film Type: <strong>{{$film->category}}</strong></h4>
                                    <h4>Moderator Name: <strong>Larry Moses</strong></h4>

                                </div>
                                <div class="col-md-6">
                                    <h4>Director: <strong>{{--{{$film->name}}--}}Jeremy Hartsons</strong></h4>
                                    <h4>Duration: <strong>{{$film->length }} Minutes</strong></h4>
                                    <h4>Classification Date: <strong>Larry Moses</strong></h4>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="portlet blue box">
                                        <div class="portlet-title">
                                            <div class="caption">

                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <h2 class="font-green font-bold"><strong>Classification Awarded</strong></h2>
                                            @if($film->rating=='ge')
                                                <img src="{{asset('rating/ge.png')}}"> Suitable for general family viewing. Works in this category are suitable for all ages as
                                                they contain no content considered harmful or disturbing to even children
                                            @elseif($film->rating=='pg')
                                                <img src="{{asset('rating/pg.png')}}">
                                                Parental Guidance is advised. This is an advisory category that warns parents that the
                                                content might confuse or upset children who consume it alone. While the content may
                                                be suitable for children, parents are advised to monitor the content
                                            @elseif($film->rating=='16')
                                                <img src="{{asset('rating/16.png')}}">It is a legally restrictive category and no person under the age of 16 years is allowed to
                                                consume. Themes may be adult and results are not necessarily positive.
                                            @elseif($film->rating=='18')
                                                <img src="{{asset('rating/18.png')}}">It is a legally restrictive category and no person under the age of 18 years is allowed to
                                                consume. Themes may be adult and results are not necessarily positive.
                                            @elseif($film->rating=='R')
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="portlet green box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-bar-chart font-green-haze"></i>
                                                <span class="caption-subject bold uppercase font-green-haze"> 3D Chart</span>
                                                <span class="caption-helper">3d cylinder chart</span>
                                            </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"> </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                <a href="javascript:;" class="reload"> </a>
                                                <a href="javascript:;" class="fullscreen"> </a>
                                                <a href="javascript:;" class="remove"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div id="chart_5" class="chart" style="height: 400px;"> </div>
                                            <div class="well margin-top-20">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label class="text-left">Top Radius:</label>
                                                        <input class="chart_5_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
                                                    <div class="col-sm-3">
                                                        <label class="text-left">Angle:</label>
                                                        <input class="chart_5_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
                                                    <div class="col-sm-3">
                                                        <label class="text-left">Depth:</label>
                                                        <input class="chart_5_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>Column Reordering </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table id="filmParamFreq" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Rated By</th>
                                            <th class="align-center ">Awarded Rate</th>
                                            <th class="align-center ">System Awarded Rate</th>
                                            <th>Justification</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet  green box">
                                        <div class="portlet-title ">
                                            <div class="caption">
                                                <i class="fa fa-list-alt"></i>PARAMETER FREQUENCY  </div>
                                        </div>
                                        <input type="hidden" id="entityIDs" value="{{$film->id}}">
                                        <div class="portlet-body">
                                            <table id="themeParameter" class="display table table-condensed table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Rated By</th>
                                                    <!-- <th>Theme Name</th> -->
                                                    <th>Parameter Name</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Rated By</th>
                                                    <!-- <th>Theme Name</th> -->
                                                    <th>Parameter Name</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet box green">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-play"></i>OCCURRENCE DISTRIBUTION </div>
                                        </div>
                                        <div class="portlet-body">
                                            <!-- BEGIN FORM-->
                                            <table id="themeOccurance" class="display table table-condensed table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Theme Name</th>
                                                    <th>Approx time</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Theme Name</th>
                                                    <th>Approx time</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection
@section('pagelevel')
    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/media/assets/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/extras/TableTools/media/js/TableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js')}}"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/table-datatables-colreorder.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/charts-amcharts.min.js')}}" type="text/javascript"></script>
    <script type='text/javascript' charset="utf-8">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id="<?php echo $film->id; ?>";
            // var filmid="<?php echo $film->id; ?>";
            oTable = $('#themeParameter').DataTable({
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('get_theme_params')?>/" +id,
                "aoColumns": [
                    {mData: 'username'},
                    {mData: 'paramname'},
                ]
            });
            oTable = $('#themeOccurance').DataTable({
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('getfilmthemeoccurance')?>/" +id,
                "aoColumns": [
                    {mData: 'themename'},
                    {mData: 'time_at'},
                ]
            });
            oTable = $('#filmParamFreq').DataTable({
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('getraters_reviews')?>/" +id,
                "aoColumns": [
                    {mData: 'username'},
                    {mData: 'ratescore'},
                    {mData: 'system'},
                    {mData: 'comment'},
                ]
            });
        });

        $(document).on("click", "#viewRating", function () {
            var static = $("#static");
            var id = $(this).data('id');
            var ratescore = $(this).data('ratescore');
            var synopsis = $(this).data('synopsis');
            $.ajax({
                type: "GET",
                url: "/getuseraters/"+id,
                data: {id: id},
                success: function (data, status) {
                    switch (status) {
                        case "success":

                            var res = jQuery.parseJSON(data);
                            // document.getElementById("viewRatingID").value = res.id;
                            // document.getElementById("viewRateScore").value = res.ratescore;
                            // document.getElementById("viewSynopsis").value = res.synopsis;
                            static.show();
                            // console(res);
                            break;

                        case "failed":
                            notification.html('<div class="alert alert-danger">' + data.message + ' </div>');
                            notification.show();
                            frm.hide();
                            break;
                        default :
                            alert("do nothing");
                    }
                }

            });
        });

        $("#btnSaveReject").click(function () {
            var rejectNotification = $("#rejectNotification");
            var rejectNotifications = $("#rejectNotifications");
            var createNotification = $("#btnSaveReject");
            var bnt = $("#createNotification");
            var frm=("frmReject");
            rejectNotifications.hide();
            var filmID = "<?php echo $film->id; ?>";
            var filmName = "<?php echo $film->name; ?>";
            var reason=document.getElementById("enterReason").innerHTML;
            var token = document.getElementById("token").innerHTML;
            $.ajax({
                type: "POST",
                url: "<?php echo url('savereject'); ?>/",
                data: {filmID: filmID,filmName: filmName,reason:reason,_token :token},
                success: function (data, status) {
                    switch (status) {
                        case "success":
                            if (data.status === '00') {
                                frm.hide();
                                // btn.hide();

                                rejectNotification.html('<div class="alert alert-success" >' + data.message + ' <div class="row"><div class="col-md-12"><div class="col-md-offset-6 col-md-6"><a href="<?php echo url('rater')?>" class="btn btn-primary " id="submitBtns">Go Back <i class="fa fa-arrow-circle-left"></i></a></div></div></div></div>');
                                rejectNotifications.show();

                            } else if (data.status === '01') {
                                createNotification.hide().find('#ul').empty();
                                $.each(data.errors,function(index,errors){
                                    createNotification.html('<div class="alert alert-danger">'+'<li>'+data.errors+'</li>' +'</div>');
                                })
                                createNotification.show();
                            }
                            break;
                        case "failed":
                            createNotification.html('<div class="alert alert-danger">' + data.errors + ' </div>');
                            createNotification.show();
                            frm.hide();
                            break;
                        default :
                            alert("do nothing");

                    }
                }
            });
        });

        $("#btnSubmitAll").click(function () {
            var editNotification = $("#editNotification");
            var editNotifications = $("#editNotifications");
            var createNotification = $("#createNotification");
            var frm=("frmCreate");
            editNotifications.hide();
            var filmID = "<?php echo $film->id; ?>";
            var filmName = "<?php echo $film->name; ?>";
//                var synopsis = document.getElementById("enterSynopsis").value;
            var ratescore = document.getElementById("enterRatingScore").value;
            var comment = document.getElementById("enterComment").value;
            $.ajax({
                type: "POST",
                url: "<?php echo url('moderator'); ?>",
                data: {filmID: filmID,filmName: filmName,comment:comment, ratescore: ratescore},
                success: function (data, status) {
                    switch (status) {
                        case "success":
                            if (data.status === '00') {
                                $("#frmCreate").hide();
                                editNotification.html('<div class="alert alert-success" >' + data.message + ' <div class="row"><div class="col-md-12"><div class="col-md-offset-6 col-md-6"><a href="<?php echo url('unrated')?>" class="btn btn-primary " id="submitBtns">Go Back <i class="fa fa-arrow-circle-left"></i></a></div></div></div></div>');
                                editNotifications.show();

                            } else if (data.status === '01') {
                                createNotification.hide().find('#ul').empty();
                                $.each(data.errors,function(index,error){
                                    createNotification.html('<div class="alert alert-danger">'+'<li>'+data.error+'</li>' +'</div>');
                                })
                                createNotification.show();
                            }
                            break;
                        case "failed":
                            createNotification.html('<div class="alert alert-danger">' + data.errors + ' </div>');
                            createNotification.show();
                            frm.hide();
                            break;
                        default :
                            alert("do nothing");

                    }
                }
            });

        });
    </script>
@endsection