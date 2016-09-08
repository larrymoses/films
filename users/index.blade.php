@extends('layouts.superadmin')
@section('title', 'System Users')
@section('content')
    <div class="page-content">

            <!-- BEGIN TAB PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <a class="btn green btn-outline sbold uppercase" id="create" href="#" data-toggle="modal" data-target="#createModal" data-backdrop="static" data-keyboard="false">
                        <i class="fa fa-plus "></i> Create New
                    </a>
                </div>
                <div class="portlet-body">
                    <div class="tabbable tabbable-tabdrop">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">Active Users</a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab">Pending Approvals</a>
                            </li>
                            <li>
                                <a href="#tab3" data-toggle="tab">Blocked Users</a>
                            </li>
                            <li>
                                <a href="#tab4" data-toggle="tab">Pending Deletion</a>
                            </li>


                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <table id="usersActive" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <table id="groupsPending" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <table id="groupsBlocked" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <table id="groupsPendingDeletion" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Users Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Group Name</th>
                                        <th>Created On</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    {{--Modal window for Inserting--}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header ">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                    <h4 class="modal-title">Create User</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="alert" id="createNotification" style="display: none;">
                                <ul id="ul" class="ul">    </ul>
                            </div>

                            <form class="form-horizontal" id="frmCreate">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group">
                                    <label class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input" id="firstname" placeholder="First Name" name="firstname">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input" id="lastname" placeholder="Last Name" name="lastname">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-9">
                                        <input type="tel" class="form-control input" id="phone" placeholder="Phone number" name="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control input" id="email" placeholder="example@domain.com" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Select User Group</label>
                                    <div class="col-md-9">
                                        {!! Form::select('GroupID',[''=>'Select Group']+ $groups,['id'=>'e1'], ['class' => 'form-control select2'],['required'],'' ) !!}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCreate" class="btn btn-success">Save</button>
                    <button type="button" id="newClose" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    <h4 class="modal-title">Edit User Details</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <form class="form-horizontal" id="frmCreate">

                            <div class="form-group">
                                <label class="col-md-3 control-label">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input" id="editFirstname" placeholder="First Name" name="first_name">
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}}" />
                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input" id="editLastname" placeholder="Last Name" name="last_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone</label>
                                <div class="col-md-9">
                                    <input type="tel" class="form-control input" id="editPhone" placeholder="Phone number" name="phone">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Select User Group</label>
                                <div class="col-md-9">

                                </div>
                            </div>

                            <div class="form-group">

                                <label class="col-md-3 control-label">City/Town</label>
                                <div class="col-md-9">
                                    <input class="form-control placeholder-no-fix" type="text"  id="editCity" name="city" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Username</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input" id="editUsername"  name="username" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control input" id="editEmail"  name="email" readonly>
                                    <input type="hidden"  id="enditUserID" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input class="form-control placeholder-no-fix" type="password"  id="password" placeholder="Password" name="password"/>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label class="col-md-3 control-label">Re-type Your Password</label>
                                <div class="col-md-9">
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off"  id="password_confirmation" placeholder="Re-type Your Password" name="password_confirmation"/>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSaveEdit" class="btn btn-success">Save changes</button>
                    <button type="button" id="closeEdit" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                    <h4 class="modal-title">Deactivate User</h4>
                </div>
                <div class="modal-body">
                    <form id="form2" class="form-horizontal form-bordered">
                        <div class="panel panel-default">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="panel-heading">
                                <div class="panel-btns">
                                    <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <p> To deactivate <code>User </code>, Select the Reason and describe why you are deactivating </p>
                            </div>
                            <div class="panel-body nopadding">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Reason:</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('reasoncode',
                                        ([' ' => 'Select Reason To delete'] ),
                                        null,
                                        ['class' => 'form-control']) !!}

                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Description:</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                                    </div>
                                </div><!-- form-group -->
                            </div><!-- panel-body -->
                            <div class="panel-footer">
                                <button class="btn btn-primary mr5">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div><!-- panel-footer -->
                        </div><!-- panel -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--End of Group Deactivate Modal Window--}}
    {{--Group Deactivate Windows--}}
    <div class="modal fade bs-example-modal-approve" id="posadminModal" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header panel panel-success">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                    <h4 class="modal-title">Approve User </h4>
                </div>
                <div class="modal-body">
                    <form id="form2" class="form-horizontal form-bordered">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <p>  Are you sure you want to approve <code>User</code></p>
                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-primary mr5">Approve</button>
                                <button type="reset" class="btn btn-default">Close</button>
                            </div><!-- panel-footer -->
                        </div><!-- panel -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--End of Group Deactivate Modal Window--}}
    @endsection
    @section('pagelevel')
            <!-- <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script> -->
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

            oTable = $('#usersActive').DataTable({
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/getusers/1') ?>",
                "aoColumns": [
                    {mData: 'name'},
                    {mData: 'email'},
                    {mData: 'phone'},
                    {mData: 'groupname'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            });


            oTable =  $('#groupsPending').DataTable( {
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/getusers/0') ?>",
                "aoColumns": [
                    {mData: 'name'},
                    {mData: 'email'},
                    {mData: 'phone'},
                    {mData: 'groupname'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            } );

            oTable =  $('#groupsBlocked').DataTable( {
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/getusers/3') ?>",
                "aoColumns": [
                    {mData: 'name'},
                    {mData: 'email'},
                    {mData: 'phone'},
                    {mData: 'groupname'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            } );

            oTable =  $('#groupsPendingDeletion').DataTable( {
                responsive: true,
                stateSave: true,
                "sAjaxSource": "<?php echo url('/getusers/4') ?>",
                "aoColumns": [
                    {mData: 'name'},
                    {mData: 'email'},
                    {mData: 'phone'},
                    {mData: 'groupname'},
                    {mData: 'created_at'},
                    {mData: 'actions'}
                ]
            } );


            $(document).on('click', '.deactivate', function () {

                var id = $(this).data('id'); // get the ID
                var name = $(this).data('groupname'); // get the Name
                document.getElementById("deactivateId").value = id;
                alert(id+''+name);
                $("#deactivateTitle").html("Deactivate " + entity);
                $("#deactivateNotification").html("To deactivate " + entity + " <span class='text-danger'>" + name + "</span>, Select the Reason and describe why you are deactivating");
            });

            //Javascript code to create new user group
            $("#btnCreate").click(function () {
                var createNotification = $("#createNotification");
                createNotification.hide();
                var frm = $('#frmCreate');
                var data = frm.serialize();
                $.ajax({
                    method: "POST",
                    url: "users",
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

//            function to retrieve data to br edited
            $(document).on("click", ".edit", function () {
                var notification = $("#editNotification");
                var frm = $("#frmEdit");
                var btnSaveEdit = $("#btnSaveEdit");
                var id = $(this).data('id');
                var name = $(this).data('username');
                var first_name = $(this).data('first_name');
                var last_name = $(this).data('last_name');
                var phone = $(this).data('phone');
                var GroupID = $(this).data('GroupID');
                var username = $(this).data('username');
                $.ajax({
                    type: "GET",
                    url: "/getuserbyid/"+id,
                    data: {id: id},
                    success: function (data, status) {
                        switch (status) {
                            case "success":

                                var res = jQuery.parseJSON(data);
                                document.getElementById("enditUserID").value = res.id;
                                document.getElementById("editFirstname").value = res.first_name;
                                document.getElementById("editLastname").value = res.last_name;
                                document.getElementById("editUsername").value = res.username;
                                document.getElementById("editCity").value = res.city;
                                document.getElementById("editEmail").value = res.email;
                                // document.getElementById("editGroupID").value = res.GroupID;
                                document.getElementById("editPhone").value = res.phone;
                                $('#editModal').modal('show');
                                console(data);
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
            $("#btnSaveEdit").click(function () {
                var editNotification = $("#editNotification");
                editNotification.hide();
                var frm = $("#frmEdit");
                var firstname = $("#editFirstname").val();
                var lastname = $("#editLastname").val();
                var username = $("#editUsername").val();
                var phone = $("#editPhone").val();
                var city = $("#editCity").val();
                var email = $("#editEmail").val();
                var password = $("#password").val();
                var id = $("#enditUserID").val();
                $.ajax({
                    type: "PUT",
                    url: "users/"+id,
                    data: {id: id, firstname: firstname, lastname: lastname, password: password, email:email,phone:phone, city:city },
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
//                                        editNotification.find('#ul').append('<li>'+ data.error +'</li>');
                                        editNotification.html('<div class="alert alert-danger">'+'<li>'+data.error+'</li>' +'</div>');
                                    })
                                    createNotification.show();
                                }
                                break;
                            default :
                                alert("do nothing");
                        }
                    }
                });
            });
        } );
        $("#newClose").click(function (){
            pageReload();
        });
        $("#editClose").click(function (){
            pageReload();
        });

        function pageReload(){
            document.location.reload();
        }
    </script>


@endsection