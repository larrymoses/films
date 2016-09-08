@extends('layout/template')
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
            <a href="{{url('/tekeconfig')}}">Configuration List</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('config',$config->id)}}">Edit</a>
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
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cog"></i> Edit {{$config->configname}}
                </div>
                <div class="tools">
                    <a href="" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="" class="reload">
                    </a>
                    <a href="" class="remove">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal"  method="PATCH" action="{{route('tekeconfig.update',$config->id)}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        @if (session('message'))
                            <div class="alert alert-success">
                                <button class="close" data-close="alert"></button>
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    {{--<div class="form-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-3 control-label">First Name</label>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control input" VALUE="{{old('firstname')}}" placeholder="First Name" name="firstname">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-3 control-label">Last Name</label>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control input" VALUE="{{old('lastname')}}" placeholder="Last Name" name="lastname">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Config Name:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input" VALUE="{{$config->configname}}" placeholder="Config Name" name="configname" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Config Value</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input" VALUE="{{$config->configvalue}}" placeholder="Config Value" name="configvalue">
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <input type="tel" class="form-control input" VALUE="{{$config->description}}" placeholder="Description" name="description">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right1">
                        <button type="reset" class="btn default">Clear</button>
                        <button type="submit" class="btn green">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection
@extends('layout.template')
@section('content')
    <h1>Add Configuration</h1>
    {!! Form::open(['url' => 'tekeconfig']) !!}
    <div class="form-group">
        {!! Form::label('Configuration Name', 'Configuration Name:') !!}
        {!! Form::text('isbn',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Configuration Value', 'Configuration Value:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Description', 'Description:') !!}
        {!! Form::text('author',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop