@extends('layouts.superadmin')
@section('title', 'Unrated Films')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <h3 class="page-title"> Films Moderator
                <small>Films awaiting Moderation</small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="{{url('users')}}">Users</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Films Moderadion</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN TAB PORTLET-->
                    <div class="portlet light ">

                        <div class="portlet-body">
                            <div class="tabbable tabbable-tabdrop">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab">Have Not Been Assigned Examiners</a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab">Have Been Assigned Examiners </a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <table id="filmTable1" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Film Name</th>
                                                <th>Film Length</th>
                                                <th>Country of Origin</th>
                                                <th>Year of Production</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>

                                        </table>
                                    </div>
                                    <div class="tab-pane " id="tab2">
                                        <table id="filmTable" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Film Name</th>
                                                <th>Film Length</th>
                                                <th>Country of Origin</th>
                                                <th>Year of Production</th>
                                                <th>Examiner</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--Group Deactivate Windows--}}
            <div class="modal fade bs-example-modal-deactivate" id="" tabindex="-1" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                            <h4 class="modal-title">Deactivate Member</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <div class="alert" id="deactivateNotification" style="display: none;">
                                        <ul id="ul" class="ul">    </ul>
                                    </div>

                                    <form id="frmDeactivate" class="form-horizontal form-bordered">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="deactivateID" />
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <p> Select Examiner to enter film synopsis for <code id="filmName"></code></p>
                                                <input type="hidden" id="selectFilmID" name="filmID">
                                            </div>
                                            <div class="panel-body">
                                                <table class="display table table-striped table-bordered responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Examiners Name</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    @foreach($users as $usr)
                                                        <tr>
                                                            <td>{{ $usr->id }}</td>
                                                            <td>{{ $usr->name }}</td>
                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-choose" data-id=" {{ $usr->id }}" id="selectExaminers" data-name="{{$usr->name}}" class="selectExaminers btn btn-success  btn-sm btn-circle">Select</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </table>
                                            </div>
                                        </div><!-- panel -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a  type="button"  class="btn btn-default btnClose" >Close</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--End of Group Deactivate Modal Window--}}
            <div class="modal fade bs-example-modal-choose" id="" tabindex="-1" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                            <h4 class="modal-title">Select Examiner to enter film synopsis</h4>
                        </div>

                        <div class="modal-body">
                            <div class="alert" id="selectNotification" style="display: none;">
                                <ul id="ul" class="ul">    </ul>
                            </div>
                            <input type="hidden" id="selectUserID" name="userID">
                            <input type="hidden" id="selectfilmID" name="filmID">
                            <div class="panel panel-success" id="frmSelect">
                                <div class="panel-body">
                                    <div class="alert" id="activateNotification">
                                        <p>Are you sure you want to allow <code id="userName"></code> to enter synopsis for the film?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  id="btnSaveSelect" class="btn btn-success">Yes</button>
                            <a  type="button"  class="btn btn-danger btnClose" >Close</a>
                        </div>
                    </div>
                </div>
            </div>
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

                        oTable = $('#filmTable').DataTable({
                            responsive: true,
                            stateSave: true,
                            "sAjaxSource": "<?php echo url('/getnonratedfilms/') ?>",
                            "aoColumns": [
                                {mData: 'name'},
                                {mData: 'length'},
                                {mData: 'origin'},
                                {mData: 'year_of_production'},
                                {mData: 'username'},
                                {mData: 'actions'}
                            ]
                        });

                        oTable = $('#filmTable1').DataTable({
                            responsive: true,
                            stateSave: true,
                            "sAjaxSource": "<?php echo url('/getnonratedfilmnosynopser/') ?>",
                            "aoColumns": [
                                {mData: 'name'},
                                {mData: 'length'},
                                {mData: 'origin'},
                                {mData: 'year_of_production'},
                                {mData: 'actions'}
                            ]
                        });
                    });
                    $("#btnChooseExaminer").click(function () {
                        var createNotification = $("#createNotification");
                        createNotification.hide();
                        var frm = $('#frmCreate');
                        var data = frm.serialize();
                        $.ajax({
                            method: "POST",
                            url: "choose_examiner",
                            data: data,
                            success: function(data,status){
                                frm.hide();
                                createNotification.html('<div class="alert alert-success" >' + data.message + '</div>');
                                createNotification.show();
                                $("#btnCreate").hide();
                            },
                            error: function(data){
                                // Error...
                                createNotification.hide().find('#ul').empty();
                                var errors = data.responseJSON;
                                $.each(errors,function(index,error){
                                    createNotification.find('#ul').append('<li>'+ error +'</li>');
                                    createNotification.html('<div class="alert alert-danger">'+'<li>'+error+'</li>' +'</div>');
                                })
                                createNotification.show();
                            }
                        });
                    });
                    $(".btnClose").click(function (){
                        pageReload();
                    });

                    $("#closeNew").click(function (){
                        pageReload();
                    });
                    $(".selectExaminers").click(function (){
                        var id = $(this).data('id');
                        var name = $(this).data('name');
                        document.getElementById("selectUserID").value = id;
                        document.getElementById("userName").innerHTML = name;

                    });

                    $(document).on("click", ".useThis", function () {

                        var id = $(this).data('id');
                        var name = $(this).data('name');
                        document.getElementById("selectFilmID").value = id;
                        document.getElementById("filmName").innerHTML = name;

                    });

                    $("#btnSaveSelect").click(function () {
                        var createNotification = $("#selectNotification");
                        createNotification.hide();
                        var frm=$("#frmSelect");
                        var userid = $("#selectUserID").val();
                        var filmid = $("#selectFilmID").val();
                        data= {userid: userid, filmid: filmid}
                        $.ajax({
                            method: "PUT",
                            url: "<?php echo url('choose_examiner/')?>/"+filmid,
                            data: data,
                            success: function(data,status){
                                frm.hide();
                                createNotification.html('<div class="alert alert-success" >' + data.message + '</div>');
                                createNotification.show();
                                $("#btnSaveSelect").hide();
                            },
                            error: function(data){
                                // Error...
                                createNotification.hide().find('#ul').empty();
                                var errors = data.responseJSON;
                                $.each(errors,function(index,error){
                                    createNotification.find('#ul').append('<li>'+ error +'</li>');
                                    createNotification.html('<div class="alert alert-danger">'+'<li>'+error+'</li>' +'</div>');
                                })
                                createNotification.show();
                            }
                        });
                    });


                    function pageReload(){
                        document.location.reload();
                    }
                </script>
@endsection