@extends('layouts.superadmin')
@section('title', 'Audit Logs')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h3 class="page-title"> System audit Logs
                <small>Recorded System Activities</small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <span>Audit Logs</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN TAB PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title blue">
                            
                        </div>
                    
                        <div class="portlet-body">
                            <table id="filmTable" class="display table table-striped table-bordered responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>System Activity</th>
                                            <th>User</th>
                                    
                                            <th>Status</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                          <tr>
                                            <th>System Activity</th>
                                            <th>User</th>
                               
                                            <th>Status</th>
                                            <th>Time</th>
                                        </tr>
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
                "sAjaxSource": "<?php echo url('getlogs') ?>",
                "aoColumns": [
                    {mData: 'activity'},
                    {mData: 'username'},
                    {mData: 'status'},
                    {mData: 'created_at'},
                ]
            });
        });
        //Javascript code to create new Film
        
        $("#newClose").click(function (){
            pageReload();
        });
        $("#editClose").click(function (){
            pageReload();
        });
    </script>
@endsection