@extends('layouts.moderator')
@section('title', 'Rates Review')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title"> Films Moderator
                <small>Film Raters Review</small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="{{url('users')}}">Users</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Film Moderadion</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <div id="frmCreate">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN TAB PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title blue">
                                <a class="btn green btn-outline sbold uppercase" href="{{url('moderator')}}" data-toggle="modal">
                                    <i class="fa fa-share"></i>Go Back</a>
                                <span class="badge badge-danger pull-right"><strong>{{$film->name}}</strong></span>
                            </div>
                            <input type="hidden" id="entityIDs" value="{{$film->id}}">
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
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="portlet light ">
                            <div class="portlet-title blue">
                                <div class="caption">
                                    <i class="fa fa-list-alt"></i>View frequency of parameter  </div>
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
                    <div class="col-md-4">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-play"></i>Watch and verify (where applicable)  </div>
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
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Enter Own Synopsis and Ratings  </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="#" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                                                   <div class="col-md-12 ">
                                                                       <!-- BEGIN Portlet PORTLET-->
                                                                        <div class="portlet box blue">
                                                                            <div class="portlet-title">
                                                                                <div class="caption">
                                                                                    <i class="fa fa-save"></i>Save and Submit </div>
                                                                                    
                                                                            </div>
                                                                <div class="portlet-body">
                                                                            <div class="alert display-none" id="createNotification">
                                                                                <ul id="ul" class="ul"></ul>
                                                                            </div>

                                                                    <div class="divider"></div>    
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Select Final Rating</label>
                                                                        <div class="col-sm-9">
                                                                            <select id="enterRatingScore" name="enterRatingScore" class="col-md-12 form-control"  required>
                                                                                <option value="">Select Final Rating...</option>
                                                                                <option value="ge">GE (General Public Viewership )</option>
                                                                                <option value="pg">PG (Parental Guidance)</option>
                                                                                <option value="16">16 (Restricted to persons Under the age of 16)</option>
                                                                                <option value="18">18 (Restricted to persons Under the age of 18)</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    {{--<div class="form-group">--}}
                                                                        {{--<label class="col-sm-3 control-label">Enter Synopsis</label>--}}
                                                                        {{--<div class="col-sm-9">--}}
                                                                            {{--<textarea class="form-control" rows="3" id="enterSynopsis" name="enterSynopsis" required></textarea>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Enter Comment</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea class="form-control" rows="3" id="enterComment" name="enterSynopsis" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                        </div>
                                                                        <!-- END Portlet PORTLET-->
                                                                   </div>
                                                               </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <!-- <button type="submit" class="btn btn-circle green">Submit</button> -->
                                                <a href="javascript:;" class="btn green button-submit" id="btnSubmitAll"> Submit
                                                    <i class="fa fa-check"></i>
                                                </a>   
                                                <a class="btn red btn-outline btn-circle sbold" data-toggle="modal" data-backdrop="static" data-keyboard="false" href="#basic"> Reject Film Rating</a>
                                                <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="editNotifications">
                <div id="editNotification">
                                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade draggable-modal" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Reject<span class="text-danger"> {{$film->name}} </span>Film Ratings</h4>
                </div>
                <form action="#" class="form-horizontal" id="frmReject">
                    <div class="modal-body">
                      <div class="form-body">
                        <div class="row">
                            <div id="rejectNotifications">
                                <div id="rejectNotification">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Enter Reason</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control " rows="3" id="enterReason" name="enterReason" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="filmID" name="filmID" value="{{$film->id}}">
                        <input type="hidden" id="token" name="token" value="{{csrf_token() }}" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green" id="btnSaveReject">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                                                    <p> Would you like to continue with some arbitrary task? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                    <button type="button" data-dismiss="modal" class="btn green">Continue Task</button>
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