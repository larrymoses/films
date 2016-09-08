@extends('layouts.client')
@section('title', 'Film Management')
@section('content')
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h3 class="page-title"> Films
                <small>All films in the System</small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="{{url('films')}}">Films</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Films Manangement</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN TAB PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <a class="btn green btn-outline sbold uppercase" id="create" href="#" data-toggle="modal" data-target="#createModal" data-backdrop="static" data-keyboard="false">
                                <i class="fa fa-plus "></i> Create New</a>
                        </div>
                        @include('common.success')
                        <div class="portlet-body">
                            <table id="filmTable" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Film Name</th>
                                    <th>Film Length</th>
                                    <th>Country of Origin</th>
                                    <th>Year of Production</th>
                                    <th>Description</th>
                                    <th>Rating Stage</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Film Name</th>
                                    <th>Film Length</th>
                                    <th>Country of Origin</th>
                                    <th>Year of Production</th>
                                    <th>Description</th>
                                    <th>Rating Stage</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="modalTitleLabel">Add New Film</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert" id="createNotification" style="display: none;">
                            <ul id="ul" class="ul"></ul>
                        </div>
                        <!-- Create form-->
                        <form id="frmCreate" class="form-horizontal" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label for="name" class="col-lg-2 col-md-3 control-label"> Name</label>
                                <div class="col-lg-10 col-md-9">
                                    <input id="name" min="5" type="text" name="name" class="form-control required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cast" class="col-lg-2 col-md-3 control-label"> Film Genre:</label>
                                <div class="col-lg-10 col-md-9">
                                    {!! Form::select('genre',[''=>'Select Film Genre']+ $genre, null,array('id'=>'e2','class' => 'form-control required select2'),['required'],'' ) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="length" class="col-lg-2 col-md-3 control-label"> Running Time</label>
                                <div class="col-lg-10 col-md-9">
                                    <input id="length" min="5" type="text" name="length" class="form-control required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="length" class="col-lg-2 col-md-3 control-label"> Producer/ Director</label>
                                <div class="col-lg-10 col-md-9">
                                    <input id="length" min="5" type="text" name="producer" class="form-control required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="year_of_production" class="col-lg-2 col-md-3 control-label"> Year of Production</label>
                                <div class="col-lg-10 col-md-9">
                                    <input id="year_of_production" min="5" type="text" name="year_of_production" class="form-control required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cast" class="col-lg-2 col-md-3 control-label"> Category:</label>
                                <div class="col-lg-10 col-md-9">
                                    {!! Form::select('category',[''=>'Select Category of Classification Applied']+ $category,['id'=>'e1'], ['class' => 'form-control required select2'],['required'],'' ) !!}
                                    {{--<input id="cast" min="5" type="text" name="cast" class="form-control required" required>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="origin" class="col-lg-2 col-md-3 control-label"> Country of Origin</label>
                                <div class="col-lg-10 col-md-9">
                                    <input id="origin" min="5" type="text" name="origin" class="form-control required" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="origin" class="col-lg-2 col-md-3 control-label"> Has Poster?</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="poster" class="form-control required">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Description" class="col-lg-2 col-md-3 control-label">Description</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="btnCreate" class="btn btn-primary">Save</button>
                        <button type="button" id="newClose" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        {{--/Modal window for Inserting--}}
        {{--Edit Company Modal Windows--}}
        <div class="modal fade bs-example-modal-edit" tabindex="-1" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 class="modal-title">Edit Film Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="alert" id="editNotification" style="display: none;">
                                <ul id="ul" class="ul">    </ul>
                            </div>
                            <form class="form-horizontal" id="frmEdit">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group">
                                    <label for="name" class="col-lg-2 col-md-3 control-label"> Name</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input id="editName" min="5" type="text" name="name" class="form-control required" required>
                                    </div>
                                </div> <div class="form-group">
                                    <label for="length" class="col-lg-2 col-md-3 control-label"> Running Time</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input id="editLength" min="5" type="text" name="length" class="form-control required" required>
                                    </div>
                                </div> <div class="form-group">
                                    <label for="year_of_production" class="col-lg-2 col-md-3 control-label"> Year of Production</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input id="editYear" min="5" type="text" name="year_of_production" class="form-control required" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cast" class="col-lg-2 col-md-3 control-label"> Cast</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input id="editCast" min="5" type="text" name="cast" class="form-control required" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="origin" class="col-lg-2 col-md-3 control-label"> Country of Origin</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input id="editOrigin" min="5" type="text" name="origin" class="form-control required" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Description" class="col-lg-2 col-md-3 control-label">Description</label>
                                    <div class="col-lg-10 col-md-9">
                                        <textarea class="form-control" name="description" id="editDescription" rows="4"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="entityID">
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSaveEdit" class="btn btn-success">Save changes</button>
                        <button id="editClose" type="button"  class="btn btn-default" >Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{--End of Edit Company Modal Window--}}
        {{--Upload Film Modal--}}
        <div class="modal fade bs-example-modal-upload" id="uploadModal" tabindex="-1" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 class="modal-title">Upload video clip for the Film <code id="uploadName">Film</code></h4>
                    </div>
                    <div class="modal-body">
                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <p> Select or Drag and Drop Film to Upload</p>
                                </div>
                                <div class="panel-body nopadding">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="upladarea">
                                            <input type="file" name="film" id="film"><br>
                                            <input type="hidden" id="token" value="{{ csrf_token() }}" />
                                            <input type="hidden" id="uploadID" name="uploadID"/>
                                            {{--<progress id="progressBar" value="0" max="100" class="col-md"></progress>--}}
                                            <h4 id="loading">Uploading...</h4>
                                            </div>
                                            <div id="upladmessage"></div>
                                            <p id="loaded_n_total"></p>

                                        </div>
                                    </div>

                                </div><!-- panel-body -->
                                <div class="panel-footer">

                                       <input type="submit" value="Upload" class="btn btn-success submit uploadbtns" />
                                       <button type="reset" class="btn btn-primary uploadbtns">Reset</button>
                                    <a href="#" class="btn btn-default closs_all">Close</a>
                                </div><!-- panel-footer -->
                            </div><!-- panel -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--End of Upload Film Modal--}}
        {{--Group Deactivate Windows--}}
        <div class="modal fade bs-example-modal-delete" id="posadminModal" tabindex="-1" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header ">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 class="modal-title">Delete Film</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form2" class="form-horizontal form-bordered">
                            <div class="panel panel-default">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="panel-heading">

                                    <p> To Delete <code id="deleteName">Film</code>, Select the Reason and describe why you are deleting </p>
                                </div>
                                <div class="panel-body nopadding">
                                    <div id="approveNotification"></div>
                                    <div id="approveSayings">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Reason:</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="reason" name="reason" rows="5" placeholder="Message" required=""></textarea>
                                            </div>
                                        </div><!-- form-group -->
                                        <input type="hidden" name="deleteID" id="deleteID">
                                    </div><!-- panel-body -->
                                </div><!-- panel-body -->
                                <div class="panel-footer">
                                    <a href="#" class="btn btn-primary btnDelete" id="btnDelete">Submit</a>
                                    <button type="reset" id="deleteClose" class="btn btn-default">Reset</button>
                                </div><!-- panel-footer -->
                            </div><!-- panel -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--End of Group Deactivate Modal Window--}}

@endsection
@section('end')
    <script type="text/javascript" src="{{asset('assets/global/plugins/jquery.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/media/assets/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/extras/TableTools/media/js/TableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/pages/scripts/form-dropzone.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/global/plugins/dropzone/dropzone.min.js')}}" ></script>
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
                "sAjaxSource": "<?php echo url('get_client_films') ?>",
                "aoColumns": [
                    {mData: 'name'},
                    {mData: 'length'},
                    {mData: 'origin'},
                    {mData: 'year_of_production'},
                    {mData: 'description'},
                    {mData: 'rated'},
                    {mData: 'actions'}
                ]
            });
        });
        //Javascript code to create new Film
        $("#btnUpload").click(function () {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                if (file) {
                    var file = _("file").files[0];
                    // alert(file.name+" | "+file.size+" | "+file.type);
                    var formdata = new FormData();
                    formdata.append("file", file);
                    var ajax = new XMLHttpRequest();
                    ajax.upload.addEventListener("progress", progressHandler, false);
                    ajax.addEventListener("load", completeHandler, false);
                    ajax.addEventListener("error", errorHandler, false);
                    ajax.addEventListener("abort", abortHandler, false);
                    ajax.open("POST", "file_upload_parser.php");
                    ajax.send(formdata);
                }
            } else {
                alert("The File APIs are not fully supported in this browser.");
            }

            var createNotification = $("#createNotification");
            createNotification.hide();
            var frm = $('#frmCreate');
            var data = frm.serialize();

        });
        $("#btnCreate").click(function () {
            var createNotification = $("#createNotification");
            createNotification.hide();
            var frm = $('#frmCreate');
            var data = frm.serialize();
            $.ajax({
                method: "POST",
                url: "films",
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
        $(document).on("click", ".edit", function () {
            var notification = $("#editNotification");
            var frm = $("#frmEdit");
            var btnSaveEdit = $("#btnSaveEdit");
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');
            var cast = $(this).data('cast');
            var origin = $(this).data('origin');
            var length = $(this).data('length');
            var year_of_production = $(this).data('year_of_production');
            $.ajax({
                type: "GET",
                url: "/getfilm/"+id,
                data: {id: id},
                success: function (data, status) {
                    switch (status) {
                        case "success":

                            var res = jQuery.parseJSON(data);
                            document.getElementById("entityID").value = res.id;
                            document.getElementById("editName").value = res.name;
                            document.getElementById("editOrigin").value = res.origin;
                            document.getElementById("editDescription").value = res.description;
                            document.getElementById("editLength").value = res.length;
                            document.getElementById("editYear").value = res.year_of_production;
                            document.getElementById("editCast").value = res.cast;
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
            var name = $("#editName").val();
            var origin = $("#editOrigin").val();
            var description = $("#editDescription").val();
            var cast = $("#editCast").val();
            var year_of_production = $("#editYear").val();
            var length = $("#editLength").val();
            var id = $("#entityID").val();

            $.ajax({
                method: "PUT",
                url: "films/"+id,
                data: {id: id, name: name, cast: cast, description: description, length:length,year_of_production:year_of_production,origin:origin},
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

        $(document).on("click", ".upload", function () {

            var id = $(this).data('id');
            var name = $(this).data('name');

            document.getElementById('uploadID').value=id;
            document.getElementById('uploadName').innerHTML=name;
        });
        $(document).on("click", ".delete", function () {

            var id = $(this).data('id');
            var name = $(this).data('name');
            document.getElementById('deleteID').value=id;
            document.getElementById('deleteName').innerHTML=name;

        });
        $("#btnDelete").click(function () {
            var id=document.getElementById('deleteID').value;
            var reason=document.getElementById('reason').value;
            var notification = $("#approveNotification"); // get the ID
            var notice = $("#approveSayings");
            var data = {id:id,reason:reason};
            $.ajax({
                type: "POST",
                url: "<?php echo url('delete/film');?>/",
                data: data,
                success: function (data, status) {
                    switch (status) {
                        case "success":
                            if (data.status === '00') {
                                $("#approveNotification").html('<div class="alert alert-success" >' + data.message + '</div>');
                                $("#approveNotification").show();
                                $("#approveSayings").hide();
                                $("#btnDelete").hide();
                            } else if (data.status === '01') {
                                $("#approveNotification").html('<div class="alert alert-danger">' + data.message + ' </div>');
                                $("#approveNotification").show();
                            }
                            break;
                        case "failed":
                            $("#approveNotification").html('<div class="alert alert-danger">' + data.message + ' </div>');
                            $("#approveNotification").show();
                            break;
                        default :
                            alert("do nothing");

                    }
                }

            });
        });
        $("#deleteClose").click(function (){
            pageReload();
        });
        $(".closs_all").click(function (){
            pageReload();
        });
        $("#newClose").click(function (){
            pageReload();
        });
        $("#editClose").click(function (){
            pageReload();
        });

        function pageReload(){
            document.location.reload();
        }
        function _(el){
            return document.getElementById(el);
        }

        $("#uploadimage").on('submit',(function(e) {
            e.preventDefault();
            $("#message").empty();

            $.ajax({
                url: "upload_film", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                load: progressHandler,
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data, status) {
                    switch (status) {
                        case "success":
                            if (data.status === '00') {
                                $("#upladarea").hide();
                                $("#upladmessage").html('<div class="alert alert-success" >' + data.message + '</div>');
                                $("#upladmessage").show();
                                $(".uploadbtns").hide();
                            } else if (data.status === '01') {
                                $("#upladmessage").hide();
                                $("#upladmessage").html('<div class="alert alert-danger">'+data.error +'</div>');
                                $("#upladmessage").show();
                            }
                            break;
                        case "failed":
                            $("#upladmessage").html('<div class="alert alert-danger">' + data.message + ' </div>');
                            $("#upladmessage").show();
                            $("#upladarea").hide();
                            break;
                        default :
                            alert("do nothing");
                    }
                }
            });
        }));

        function progressHandler(event){
            $('#loading').show();
            _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
        }
        function completeHandler(event){
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0;
        }
        function errorHandler(event){
            _("status").innerHTML = "Upload Failed";
        }
        function abortHandler(event){
            _("status").innerHTML = "Upload Aborted";
        }
    </script>
@endsection