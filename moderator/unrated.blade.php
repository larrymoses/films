@extends('layouts.moderator')
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
                        <div class="portlet-title">
                            <a class="btn green btn-outline sbold uppercase" href="{{url('moderator')}}" data-toggle="modal">
                                <i class="fa fa-share"></i>                                     Go Back                                              </a>

                        </div>
                        <div class="portlet-body">
                            <table id="filmTable" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Film Name</th>
                                    <th>Film Length</th>
                                    <th>Country of Origin</th>
                                    <th>Year of Production</th>
                                    <th>Description</th>
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
                        "sAjaxSource": "<?php echo url('/unrated/get_list/') ?>",
                        "aoColumns": [
                            {mData: 'name'},
                            {mData: 'length'},
                            {mData: 'origin'},
                            {mData: 'year_of_production'},
                            {mData: 'description'},
                            {mData: 'actions'}
                        ]
                    });
                });
            </script>
@endsection