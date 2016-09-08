@extends('layouts.container')
@section('content')
        <!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{url('/config')}}">Configuration</a>
            <i class="fa fa-angle-right"></i>
        </li>

    </ul>

    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp;
            <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cog"></i>Configurations
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="{{url('/dashboard')}}" class="remove">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        @if (session('message'))
                            <div class="alert alert-success">
                                <button class="close" data-close="alert"></button>
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" data-toggle="modal" href="{{route('config.create')}}">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#">
                                            Print </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                    <tr class="bg-info">
                        <th>Config Name</th>
                        <th>Config Value</th>
                        <th>Created By</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($configs===' ')
                        <tr>
                            <td colspan="6" class="-align-center">No records to display!</td>
                        </tr>
                    @else
                        @foreach ($configs as $config)
                            <tr>
                                <td>{{ $config->configname }}</td>
                                <td>{{ $config->configvalue }}</td>
                                <td>{{ $config->created_by }}</td>
                                <td>{{ $config->created_at }}</td>
                                <td>{{ $config->updated_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default btn-sm" href="#" data-toggle="dropdown">
                                            <i class="fa fa-cogs"></i> Select Action <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="{{route('config.edit',$config->id)}}">
                                                    <i class="fa fa-pencil"></i>edit </a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'DELETE','class' => 'btn-danger', 'route'=>['config.destroy', $config->id]]) !!}
                                                <i class="fa fa-trash-o"></i>
                                                {!! Form::submit('Delete',['class' => 'btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                    @endforeach
                    @endif
                </table>
                {!! $configs->render() !!}
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection
