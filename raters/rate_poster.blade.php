@extends('layouts.rater')
@section('title', 'Rate Poster')
@section('content')
    <div class="page-content-wrapper" xmlns:display="http://www.w3.org/1999/xhtml">
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
                    <div class="col-md-8">
                        <div class="portlet light ">
                            <div class="portlet-title blue">
                                <div class="caption">
                                    <i class="fa fa-list-alt"></i>View frequency of parameter  </div>
                            </div>
                            <input type="hidden" id="entityIDs" value="{{$film->id}}">
                            <div class="portlet-body">
                                <table class="display table table-condensed table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Theme Name</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Violence and Crime</td>
                                        <td> <div class="form-group">
                                                <select name="id1" class="themeSelect">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sex, Obscenity and Nudity</td>
                                        <td> <div class="form-group">
                                                <select name="id2" class="themeSelect">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>

                                        <td>Horror and Occult</td>
                                        <td> <div class="form-group">
                                                <select name="id3" class="themeSelect">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Drugs, Smoking, Tobacco, Solvents and Alcohol</td>
                                        <td> <div class="form-group">
                                                <select name="id4" class="themeSelect">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>

                                        <td>Profanity,Religion and Community</td>
                                        <td> <div class="form-group">
                                                <select name="id5" class="themeSelect">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>

                                        <td>Propaganda for War, hate Speech and Incitement Parameters</td>
                                        <td> <div class="form-group">
                                                <select name="id6" class="themeSelect" >
                                                    <option value="" selected>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-image"></i>Poster Image </div>
                            </div>
                            <div class="portlet-body">
                                <!-- BEGIN FORM-->
                                <img src="{{url('/').$film->path}}" width="100%" height="370px">
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
                                                            <div class="col-md-offset-3">
                                                                <span>The System Suggested Rating id </span><span class="font-blue" id="systemSuggest">0</span>:<span class="font-red" id="sysRatingWords">GE</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Select Final Rating</label>
                                                            <div class="col-sm-9">
                                                                <select id="enterRatingScore" name="enterRatingScore" class="col-md-12 form-control"  required>
                                                                    <option value="">Select Final Rating...</option>
                                                                    <option value="ge">GE (General Public Viewership )</option>
                                                                    <option value="pg">PG (Parental Guidance)</option>
                                                                    <option value="16">16 (Restricted to persons Under the age of 16)</option>
                                                                    <option value="18">18 (Restricted to persons Under the age of 18)</option>
                                                                    <option value="R">R (Rated R)</option>
                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Enter Justification</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" rows="3" id="enterComment" name="enterSynopsis" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-9 col-sm-offset-3">
                                                                <div class="font-red-intense" id="warning" display:none></div>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Successful rating </div>
                                </div>
                                <div class="portlet-body f">
                                    <!-- BEGIN FORM-->
                                            <div class="row">
                                                <div class="col-md-offset-6 col-md-6">
                                                    <a class="btn red btn-outline btn-circle sbold" href="{{url('rate_poster')}}"> Go Back Home</a>
                                                </div>
                                            </div>
                                    <!-- END FORM-->
                                </div>
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
    <script type='text/javascript' charset="utf-8">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id="<?php echo $film->id; ?>";
            $('.themeSelect').change(function() {
                var themeVal=$(this).val();

                var currentValue=document.getElementById("systemSuggest").innerHTML;

                if (themeVal > currentValue) {
                    document.getElementById('systemSuggest').innerHTML=themeVal;
                    if(themeVal=="1"){
                        document.getElementById('sysRatingWords').innerHTML="GE";
                    }else if(themeVal=="2"){
                        document.getElementById('sysRatingWords').innerHTML="PG-Above 10 Years";
                    }if(themeVal=="3"){
                        document.getElementById('sysRatingWords').innerHTML="Above 16";
                    }if(themeVal=="4"){
                        document.getElementById('sysRatingWords').innerHTML="Above 18/Adults";
                    }if(themeVal=="5"){
                        document.getElementById('sysRatingWords').innerHTML="Restricted";
                    }
                }


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
            $("#btnSubmitAll").click(function () {
                var frm=("frmCreate");
                $("#editNotifications").hide();
                var filmID = "<?php echo $film->id; ?>";
                var filmName = "<?php echo $film->name; ?>";
                var system = document.getElementById("systemSuggest").innerHTML;
                var ratescore = document.getElementById("enterRatingScore").value;
                var comment = document.getElementById("enterComment").value;
                if(ratescore=='' || comment==''){
                    document.getElementById("warning").innerHTML="Please Select awarded rating and/or Justification before submitting"
                }else {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('poster_rate/').'/'.$film->id; ?>",
                        data: {filmID: filmID, system: system, comment: comment, ratescore: ratescore},
                        success: function (data, status) {
                            $("#frmCreate").hide();
                            $("#editNotifications").show();
                        }
                    });
                }
            });
        });
    </script>
@endsection