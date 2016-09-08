@extends('layouts.superadmin')
@section('title', 'System User Groups')
@section('content')
<div class="page-content">
        <div class="col-md-12">
                            <!-- BEGIN TAB PORTLET-->
        <div class="portlet light ">
        <div class="portlet-title">
                                    <a class="btn green btn-outline sbold uppercase" href="#" data-toggle="modal" data-target="#createnew">
                                    <i class="fa fa-plus"></i>                                     Add New                                               </a>
                                    
                                </div>
            <div class="portlet-body">
                                
                                    <div class="tabbable tabbable-tabdrop">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">Active User Groups</a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab">New Groups Pending Approvals</a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Blocked Groups</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">Deleted Groups</a>
                                            </li>
                                    
                                           
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                               
                                                <table id="groupsActive" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tfoot>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                         
                                                 <table id="groupsPending" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tfoot>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                               
                                                 <table id="groupsBlocked" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tfoot>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                            </div>
                                            <div class="tab-pane" id="tab4">
                                           
                                                <table id="groupsPendingDeletion" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tfoot>
                                                        <tr>
                                                            <th>Group Name</th>
                                                            <th>Description</th>
                                                            <th>Created By</th>
                                                            <th>Created On.</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                            </div>
                                           
                                        </div>
                                    </div>
        </div>
    </div>
    </div>
</div>
    {{--Modal window for Inserting--}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="createnew">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header ">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                    <h4 class="modal-title">Create User groups</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="alert" id="createNotification" style="display: none;">
                                <ul id="ul" class="ul">    </ul>
                            </div>
                            <form class="form-horizontal" role="form" id="frmCreate" method="POST">

                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Group Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control input" id="groupname"  name="groupname" >
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            <textarea type="text" class="form-control input"  id="description" name="description" ></textarea>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  id="btnCreate" class="btn btn-success">Save</button>
                    <a href="{{url('/usergroups')}}" type="button"  class="btn btn-default" >Close</a>
                </div>
            </div>
        </div>
    </div>
    {{--Edit Company Modal Windows--}}
    <div class="modal fade bs-example-modal-edit" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                    <h4 class="modal-title">Edit Group Details</h4>
                </div>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="alert alert-danger" id="editNotifications" style="display: none;">
                            <ul id="ul" class="editNotification">    </ul>
                        </div>
                        <form class="form-horizontal" id="frmEdit">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Group Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input"  id="editGroupName" name="groupname" >
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control input"  id="editDescription" name="description" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="entityID">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSaveEdit" class="btn btn-success">Save changes</button>
                    <a href="{{url('/usergroups')}}" type="button"  class="btn btn-default" >Close</a>
                </div>
            </div>
        </div>
    </div>
    {{--End of Edit Company Modal Window--}}
    {{--Group Deactivate Windows--}}
    <div class="modal fade bs-example-modal-deactivate" id="posadminModal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                    <h4 class="modal-title">Deactivate User Group</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="alert" id="deactivateNotification" style="display: none;">
                                <ul id="ul" class="ul">    </ul>
                            </div>

                            <form id="frmDeactivate" class="form-horizontal form-bordered">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <p> Are you sure you want to deactivate <code>{{'User Groupname'}}</code> information?</p>
                                        <input type="hidden" id="deactivateId">
                                    </div>
                                </div><!-- panel -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  id="btnDeactivate" class="btn btn-danger">Deactivate</button>
                    <a href="{{url('/usergroups')}}" type="button"  class="btn btn-default" >Close</a>
                </div>
            </div>
        </div>
    </div>
    {{--End of Group Deactivate Modal Window--}}
    {{--Group Approval Windows--}}
    <div class="modal fade bs-example-modal-approve" id="posadminModal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header panel panel-success">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                    <h4 class="modal-title">Approve User Group</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="alert" id="activateNotification" style="display: none;">
                                <ul id="ul" class="ul">    </ul>
                            </div>
                            <form id="frmActivate" class="form-horizontal form-bordered">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <p> Are you sure you want to Approve <code>{{'User Groupname'}}</code> information?</p>
                                        <input type="hidden" id="activateId">
                                    </div>
                                </div><!-- panel -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  id="btnActivate" class="btn btn-success">Approve Activation</button>
                    <a href="{{url('/usergroups')}}" type="button"  class="btn btn-default" >Close</a>
                </div>
            </div>
        </div>
    </div>
    {{--End of Group Deactivate Modal Window--}}
    {{--Group Decline Windows--}}
    <div class="modal fade bs-example-modal-decline" id="posadminModal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header panel panel-decline">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                    <strong>Decline User Group Approvals</strong>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="alert" id="declineNotification" style="display: none;">
                                <ul id="ul" class="ul">    </ul>
                            </div>
                            <form id="frmDecline" class="form-horizontal form-bordered">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <p> Are you sure you want to Decline  <code>{{'User Groupname'}}</code> Appoval?</p>
                                        <strong>Please Note that By delining Approval the Group will be Deleted from the System</strong>
                                        <input type="hidden" id="declineId">
                                    </div>
                                </div><!-- panel -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  id="btnDecline" class="btn btn-danger">Decline Approval</button>
                    <a href="{{url('/usergroups')}}" type="button"  class="btn btn-default" >Close</a>
                </div>
            </div>
        </div>
    </div>
    {{--End of Group Decline Modal Window--}}
    
@endsection
@section('pagelevel')
 <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/media/assets/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/extras/TableTools/media/js/TableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js')}}"></script>
    <script src="{{asset('js/jquery/jquery-2.0.3.min.js')}}"></script>
    <script type='text/javascript' charset="utf-8">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            oTable = $('#groupsActive').DataTable({
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/usergroups/1') ?>",
                "aoColumns": [
                    {mData: 'groupname'},
                    {mData: 'description'},
                    {mData: 'name'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            });


            oTable =  $('#groupsPending').DataTable( {
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/usergroups/0') ?>",
                "aoColumns": [
                    {mData: 'groupname'},
                    {mData: 'description'},
                    {mData: 'name'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            } );

            oTable =  $('#groupsBlocked').DataTable( {
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/usergroups/3') ?>",
                "aoColumns": [
                    {mData: 'groupname'},
                    {mData: 'description'},
                    {mData: 'name'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            } );

            oTable =  $('#groupsPendingDeletion').DataTable( {
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/usergroups/4') ?>",
                "aoColumns": [
                    {mData: 'groupname'},
                    {mData: 'description'},
                    {mData: 'name'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            } );

            $(document).on("click", ".edit", function () {
                var notification = $("#editNotification");
                var frm = $("#frmEdit");
                var btnSaveEdit = $("#btnSaveEdit");
                var id = $(this).data('id');
                var name = $(this).data('groupname');
                var description = $(this).data('description');
                var bank = $(this).data('bank');
                $.ajax({
                    type: "GET",
                    url: "/getgroup/"+id,
                    data: {id: id},
                    success: function (data, status) {
                        switch (status) {
                            case "success":

                                var res = jQuery.parseJSON(data);
                                document.getElementById("entityID").value = res.id;
                                document.getElementById("editGroupName").value = res.groupname;
                                document.getElementById("editBankCode").value = res.bank;
                                document.getElementById("editDescription").value = res.description;
                                $('#editModal').modal('show');
                                console(data);
                                break;

                            case "failed":
                                notification.html('<div class=""><li>' + data.message + '</li> </div>');
                                editNotifications.show();
                                frm.hide();
                                break;
                            default :
                                alert("do nothing");
                        }
                    }

                });
            });
            $("#btnSaveEdit").click(function () {
                var editNotification = $("#editNotification");
                editNotification.hide();
                var frm = $("#frmEdit");
                var groupname = $("#editGroupName").val();
                var bankcode = $("#editBankCode").val();
                var description = $("#editDescription").val();
                var id = $("#entityID").val();

                $.ajax({
                    method: "PUT",
                    url: "usergroups/"+id,
                    data: {id: id, groupname: groupname, bankcode: bankcode, description: description},
                    success: function (data, status) {
                        switch (status) {
                            case "success":
                                if (data.status === '00') {
                                    frm.hide();
                                    editNotification.html('<div class="alert alert-success" >' + data.message + '</div>');
                                    editNotification.show();
                                    $("#btnSaveEdit").hide();
                                } else if (data.status === '01') {
                                    editNotification.hide().find('#ul').empty();
                                    $.each(data.errors,function(index,error){
                                       editNotification.find('#ul').append('<li>'+ data.error +'</li>');
                                        // editNotification.html('<div class="alert alert-danger">'+'<li>'+data.error+'</li>' +'</div>');
                                    })
                                    createNotification.show();
                                }
                                break;
                            case "failed":
                                editNotification.html('<div class="alert alert-danger">' + data.message + ' </div>');
                                editNotification.show();
                                frm.hide();
                                break;
                            default :
                                alert("do nothing");
                        }
                    }
                });
            });


            //Javascript code to create new user group
            $("#btnCreate").click(function () {
                var createNotification = $("#createNotification");
                createNotification.hide();
                var frm = $('#frmCreate');
                var data = frm.serialize();
                $.ajax({
                    method: "POST",
                    url: "usergroups",
                    data: data,
                    success:function(data,status){
                        switch (status) {
                            case "success":
                                if (data.status === '00') {
                                    frm.hide();
                                    createNotification.html('<div class="alert alert-success" >' + data.message + '</div>');
                                    createNotification.show();
                                    $("#btnCreate").hide();
                                } else if (data.status === '01') {
                                    createNotification.hide().find('#ul').empty();
                                    $.each(data.errors,function(index,error){
//                                        createNotification.find('#ul').append('<li>'+ data.error +'</li>');
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

//            Deactivate User Group
            $(document).on('click', '.deactivate', function () {
                var id = $(this).data('id'); // get the ID
                var name = $(this).data('name'); // get the Name
                var notification = $("#deactivateNotification");
                var frm = $("#frmEdit");
                var btnDeactivate = $("#btnDeactivate");
                document.getElementById("deactivateId").value = id;
            });
            $("#btnDeactivate").click(function () {
                var editNotification = $("#deactivateNotification");
                editNotification.hide();
                var frm = $("#frmDeactivate");
                var id = $("#deactivateId").val();
                var updater=2;
                var updatestatus = 3; //Status code fro blocked groups

                $.ajax({
                    method: "PUT",
                    url: "group/"+id,
                    data: {id: id, updatestatus: updatestatus,updater:updater},
                    success: function (data, status) {
                        switch (status) {
                            case "success":
                                if (data.status === '00') {
                                    frm.hide();
                                    editNotification.html('<div class="alert alert-danger" >' + 'Group Successfully Deactivated' + '</div>');
                                    editNotification.show();
                                    $("#btnDeactivate").hide();
                                } else if (data.status === '01') {
                                    editNotification.hide().find('#ul').empty();
                                    $.each(data.errors,function(index,error){
//                                        editNotification.find('#ul').append('<li>'+ data.error +'</li>');
                                        editNotification.html('<div class="alert alert-danger">'+'<li>'+data.error+'</li>' +'</div>');
                                    })
                                    createNotification.show();
                                }
                                break;
                            case "failed":
                                editNotification.html('<div class="alert alert-danger">' + data.message + ' </div>');
                                editNotification.show();
                                frm.hide();
                                break;
                            default :
                                alert("do nothing");
                        }
                    }
                });
            });
//            Activate User Group
            $(document).on('click', '.activate', function () {
                var id = $(this).data('id'); // get the ID
                var name = $(this).data('name'); // get the Name
                var notification = $("#deactivateNotification");
                var frm = $("#frmActivate");
                var btnActivate = $("#btnActivate");
                document.getElementById("activateId").value = id;
            });
            $("#btnActivate").click(function () {
                var editNotification = $("#activateNotification");
                editNotification.hide();
                var frm = $("#frmActivate");
                var id = $("#activateId").val();
                var updater=3;
                var updatestatus = 1; //Status code for Active

                $.ajax({
                    method: "PUT",
                    url: "group/"+id,
                    data: {id: id, updatestatus: updatestatus,updater:updater},
                    success: function (data, status) {
                        switch (status) {
                            case "success":
                                if (data.status === '00') {
                                    frm.hide();
                                    editNotification.html('<div class="alert alert-success" >' + 'Group Successfully <code> Approved </code>' + '</div>');
                                    editNotification.show();
                                    $("#btnActivate").hide();
                                } else if (data.status === '01') {
                                    editNotification.hide().find('#ul').empty();
                                    $.each(data.errors,function(index,error){
//                                        editNotification.find('#ul').append('<li>'+ data.error +'</li>');
                                        editNotification.html('<div class="alert alert-danger">'+'<li>'+data.error+'</li>' +'</div>');
                                    })
                                    createNotification.show();
                                }
                                break;
                            case "failed":
                                editNotification.html('<div class="alert alert-danger">' + data.message + ' </div>');
                                editNotification.show();
                                frm.hide();
                                break;
                            default :
                                alert("do nothing");
                        }
                    }
                });
            });
//            Activate User Group
            $(document).on('click', '.activate', function () {
                var id = $(this).data('id'); // get the ID
                var name = $(this).data('name'); // get the Name
                var notification = $("#deactivateNotification");
                var frm = $("#frmActivate");
                var btnActivate = $("#btnActivate");
                document.getElementById("activateId").value = id;
            });
            $("#btnActivate").click(function () {
                var editNotification = $("#activateNotification");
                editNotification.hide();
                var frm = $("#frmActivate");
                var id = $("#activateId").val();
                var updater=3;
                var updatestatus = 1; //Status code for Active

                $.ajax({
                    method: "PUT",
                    url: "group/"+id,
                    data: {id: id, updatestatus: updatestatus,updater:updater},
                    success: function (data, status) {
                        switch (status) {
                            case "success":
                                if (data.status === '00') {
                                    frm.hide();
                                    editNotification.html('<div class="alert alert-success" >' + 'Group Successfully <code> Approved </code>' + '</div>');
                                    editNotification.show();
                                    $("#btnActivate").hide();
                                } else if (data.status === '01') {
                                    editNotification.hide().find('#ul').empty();
                                    $.each(data.errors,function(index,error){
//                                        editNotification.find('#ul').append('<li>'+ data.error +'</li>');
                                        editNotification.html('<div class="alert alert-danger">'+'<li>'+data.error+'</li>' +'</div>');
                                    })
                                    createNotification.show();
                                }
                                break;
                            case "failed":
                                editNotification.html('<div class="alert alert-danger">' + data.message + ' </div>');
                                editNotification.show();
                                frm.hide();
                                break;
                            default :
                                alert("do nothing");
                        }
                    }
                });
            });

            //            Decline User Group Activation
            $(document).on('click', '.decline', function () {
                var id = $(this).data('id'); // get the ID
                var name = $(this).data('name'); // get the Name
                var notification = $("#declineNotification");
                var frm = $("#frmDecline");
                var btnDecline = $("#btnDecline");
                document.getElementById("declineId").value = id;
            });
            $("#btnDecline").click(function () {
                var editNotification = $("#declineNotification");
                editNotification.hide();
                var frm = $("#frmDecline");
                var id = $("#declineId").val();
                var updater=3;
                var updatestatus = 1; //Status code for Active
                alert(id+'Name');
                $.ajax({
                    method: "PUT",
                    url: "group/"+id,
                    data: {id: id, updatestatus: updatestatus,updater:updater},
                    success: function (data, status) {
                        switch (status) {
                            case "success":
                                if (data.status === '00') {
                                    frm.hide();
                                    editNotification.html('<div class="alert alert-success" >' + 'Group Successfully <code> Approved </code>' + '</div>');
                                    editNotification.show();
                                    $("#btnDecline").hide();
                                } else if (data.status === '01') {
                                    editNotification.hide().find('#ul').empty();
                                    $.each(data.errors,function(index,error){
//                                        editNotification.find('#ul').append('<li>'+ data.error +'</li>');
                                        editNotification.html('<div class="alert alert-danger">'+'<li>'+data.error+'</li>' +'</div>');
                                    })
                                    createNotification.show();
                                }
                                break;
                            case "failed":
                                editNotification.html('<div class="alert alert-danger">' + data.message + ' </div>');
                                editNotification.show();
                                frm.hide();
                                break;
                            default :
                                alert("do nothing");
                        }
                    }
                });
            });
        } );
    </script>
@endsection
