@extends('layouts.container')

@section('content')
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <!-- PAGE HEADER-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header">
                            <!-- STYLER -->

                            <!-- /STYLER -->
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="{{url('themes')}}">Themes</a>
                                </li>
                                <li>Create</li>
                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Themes</h3>
                            </div>
                            <div class="description">Themes that a film can have</div>
                        </div>
                    </div>
                </div>

                <!-- MAIN CONTENT GOES HERE -->
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <!-- BASIC -->
                    <div class="box border orange">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i>Data Entry</h4>
                            <div class="tools hidden-xs">
                                <a href="#box-config" data-toggle="modal" class="config">
                                    <i class="fa fa-cog"></i>
                                </a>
                                <a href="javascript:;" class="reload">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="javascript:;" class="collapse">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a href="javascript:;" class="remove">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="box-body big">
                            <!-- Display Validation Errors -->
                            @include('common.errors')
                            @include('common.success')
                            <form role="form" method="POST" action=" {{ url('themes') }}" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Theme Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Theme Description</label>
                                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-success">Reset</button>
                            </form>
                        </div>
                    </div>
                    <!-- /BASIC -->
                </div>
                <!-- /MAIN CONTENT GOES HERE -->
                <div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
                </div>
            </div><!-- /CONTENT-->
        </div>
    </div>


@endsection