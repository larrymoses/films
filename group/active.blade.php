@extends('layout/layout')
@section('content')
    <div class="pageheader">
        <div class="media">
            <div class="row">
                <div class="col-md-10">
                    <div class="pageicon pull-left">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href=""><i class="fa fa-home"></i></a></li>
                            <li><a href="">Admin</a></li>
                            <li>User Groups</li>
                        </ul>
                        <h4>User Groups</h4>
                    </div>
                </div>
                <div class="col-md-2 pull-right">
                    <div class="btn-group">
                        <a class="btn btn-success" data-toggle="modal" href="{{route('group.create')}}">
                            Add New <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- media -->

    </div><!-- pageheader -->
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-primary">
                <li class="active"><a href="#home4" data-toggle="tab"><strong>Active Groups</strong></a></li>
                <li><a href="#profile4" data-toggle="tab"><strong>Pending Approvals</strong></a></li>
                <li><a href="#about4" data-toggle="tab"><strong>Blocked Groups</strong></a></li>
                <li><a href="#contact4" data-toggle="tab"><strong>Pending Deletion</strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content tab-content-primary mb30">
                <div class="tab-pane active" id="home4">
                    <h4 class="nomargin">Active user groups</h4>
                    <p>This is a list of all registered and active User Groups</p>
                    <div id="basicTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="dataTables_length" id="basicTable_length">
                                    <label>Show
                                        <div class="select2-container" id="s2id_autogen1" style="width: 60px;">
                                            <a href="javascript:void(0)" class="select2-choice" tabindex="-1"><span class="select2-chosen" id="select2-chosen-2">10</span><abbr class="select2-search-choice-close"></abbr><span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen2" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-2" id="s2id_autogen2">
                                            <div class="select2-drop select2-display-none">
                                                <div class="select2-search select2-search-hidden select2-offscreen">
                                                    <label for="s2id_autogen2_search" class="select2-offscreen"></label><input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-2" id="s2id_autogen2_search" placeholder="">
                                                </div>
                                                <ul class="select2-results" role="listbox" id="select2-results-2">
                                                </ul>
                                            </div>
                                        </div>
                                        <select name="basicTable_length" aria-controls="basicTable" class="select2-offscreen" style="width: 60px;" tabindex="-1" title="">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        entries</label>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div id="basicTable_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control input-sm" placeholder="" id="basicTable_filter" aria-controls="basicTable"></label>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-bordered responsive dataTable no-footer dtr-inline sortable" role="grid" aria-describedby="basicTable_info">
                            <thead class="">
                            <tr role="row">
                                <th>Group Name</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Created By</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{ $group->groupname }}</td>
                                    <td>
                                        @if ($group->status ===1)
                                            Active
                                        @elseif($group->status ===0)
                                            Inactive
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td>{{ $group->created_at}}</td>
                                    <td>{{ $group->createdby }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" href="#" data-toggle="dropdown">
                                                <i class="fa fa-cogs"></i> Select Action <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="{{route('group.show',$group->id)}}">
                                                        <i class="fa fa-pencil"></i> View </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('group.edit',$group->id)}}">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('group.destroy',$group->id)}}">
                                                        <i class="fa fa-trash-o"></i> Delete </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-ban"></i> Deactivate </a>
                                                </li>
                                                <li class="divider">
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="i"></i> Assign </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="dataTables_info" id="basicTable_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 57 entries
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="basicTable_paginate">
                                    {!! $groups->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- tab-pane -->

                <div class="tab-pane" id="profile4">
                    <h4 class="nomargin">Profile title goes here...</h4>
                    <p>Profile content goes here</p>
                </div><!-- tab-pane -->

                <div class="tab-pane" id="about4">
                    <h4 class="nomargin">About title goes here...</h4>
                    <p>About content goes here</p>
                </div><!-- tab-pane -->

                <div class="tab-pane" id="contact4">
                    <h4 class="nomargin">Contact title goes here...</h4>
                    <p>Contact content goes here</p>
                </div><!-- tab-pane -->
            </div><!-- tab-content -->

        </div><!-- col-md-6 -->
    </div><!--row-->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

@endsection
