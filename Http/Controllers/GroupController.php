<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use DB;
use Auth;
use Datatables;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\VarDumper;

class GroupController extends Controller
{
    public function __construct(){
        $this->middleware(array('auth'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function Index()
    {

        return view('group.index');
    }
    //get the bank details by id
    public function getEditData($id)
    {
        $group=Group::find($id);
        return json_encode($group);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function Create()
    {
        $banks = DB::table('banks')->lists('name', 'id');
        return view('group.create')->with('banks', $banks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::All(), [
            'groupname' => 'required|unique:groups|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'status'=>'01',
                'error'=>$validator->errors()->toArray()
            ]);
        }
        else{
            $group = new Group();
            $group->groupname = $request->input('groupname');
            $group->description = $request->input('description');
            $group->createdby = Auth::User()->id;
            $group->save();
            return response()->json([
                'success'=>false,
                'status'=>'00',
                'message' =>'<code>'. Input::get('groupname').'</code>'.' Created Successfully'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $group=Group::find($id);
        return view('group.show', ['group'=>$group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $group=Group::find($id);
        return view('group.edit', ['group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(Input::All(), [
//            'groupname' => 'required|unique:groups|max:255',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'status'=>'01',
                'errors'=>$validator->errors()->toArray()
            ]);
        }

        else{
            $group = Group::find(Input::get('id'));
            if( Input::get('updater')==2){
                $group->status = $request->input('updatestatus');
                $group->deactivatedby = Auth::User()->id;
                $group->save();
            }elseif( Input::get('updater')==3){
                $group->status = $request->input('updatestatus');
                $group->activatedby = Auth::User()->id;
                $group->save();
            }
            else{
                $group->groupname = $request->input('groupname');
                $group->description = $request->input('description');
                $group->createdby = Auth::User()->id;
                $group->save();
            }
                return response()->json([
                    'success'=>false,
                    'datainput'=>$group,
                    'status'=>'00',
                    'message' =>'<code>'. Input::get('groupname').'</code>'.' Updated Successfully'
                ]);

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUserGroups($status)
    {
        if($status==1){
            $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-edit" data-id=" {{ $id }}" class="edit">Edit</a></li>
                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-deactivate" data-id=" {{ $id }}" data-name="{{$groupname}}" class="deactivate">Deactivate</a></li>
                            </ul>
                        </div>';
        } elseif($status==0){
            $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-edit" data-id=" {{ $id }}" class="edit">Edit</a></li>
                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-decline" data-id=" {{ $id }}" class="decline">Decline</a></li>
                                <li><a href="#"  data-toggle="modal" data-target=".bs-example-modal-approve" data-id=" {{ $id }}" data-name="{{$groupname}}" class="activate">Approve</a></li>
                            </ul>
                        </div>';
        }elseif($status==3){
            $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-edit" data-id=" {{ $id }}" class="edit">Edit</a></li>
                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-decline" data-id=" {{ $id }}"  class="decline" >Decline</a></li>
                                <li><a href="#"  data-toggle="modal" data-target=".bs-example-modal-activate" data-id=" {{ $id }}" data-name="{{$groupname}}" class="activate">Activate</a></li>
                                </ul>
                        </div>';
        }elseif($status==4){
            $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                               <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-decline" data-id=" {{ $id }}"  class="decline" >Deny</a></li>
                               <li><a href="#"  data-toggle="modal" data-target=".bs-example-modal-approve" data-id=" {{ $id }}" data-name="{{$groupname}}" class="activate">Approve</a></li>
                               </ul>
                        </div>';
        }
        $groups=DB::table('groups')
            ->join('users', 'groups.createdby', '=', 'users.id')
            ->where('groups.status', '=', $status)
            ->select('groups.*', 'users.name');
        /// print_r($groups);


        return Datatables::of($groups)
            ->editColumn('id',"{{ \$id }}")
            ->addColumn('actions',$action)
            ->make(true);
    }

}
