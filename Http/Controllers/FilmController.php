<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Datatables;
use Auth;
use App\AuditLog;
use App\Users;
class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre=DB::table('genres')->lists('name','name');
        $category=DB::table('category')->lists('name','name');
        return view('films/index',compact('genre','category'));
    }  
    public function filmSynopsis()
    {
        $users=Users::where('GroupID', 3)->get();
        $genre=DB::table('genres')->lists('name','name');
        $category=DB::table('category')->lists('name','name');
        return view('films/synopsis',compact('genre','category','users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films/create');
    }
    public function video(Request $request) {
//        return $request->all();exit();
        if(Input::hasFile('file')) {
            //upload an image to the /img/tmp directory and return the filepath.

            $file = Input::file('file');
            $filmID = $request->input('posterFilmID');
            $filmName = $request->input('posterFilmName');
            $tmpFilePath = '/uploads/film/Videos/'.$filmName;
            $tmpFileName = $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;

            $film = Film::find($filmID);
            $film->clip = '1';
            $film->clipname = $tmpFileName;
            $film->clip_path = $tmpFilePath.'/'.$tmpFileName;
            $film->save();


            return response()->json(array('path'=> $path), 200);
        } else {
            return response()->json(false, 200);
        }
    }

    public function poster(Request $request) {
        if(Input::hasFile('file')) {
            //upload an image to the /img/tmp directory and return the filepath.

            $file = Input::file('file');
            $filmID = $request->input('posterFilmID');
            $filmName = $request->input('posterFilmName');
            $tmpFilePath = '/uploads/film/posters/'.$filmName;
            $tmpFileName = $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath . $tmpFileName;

            $film = Film::find($filmID);
            $film->poster = 'Yes';
            $film->posteruploaded = 1;
            $film->postername = $tmpFileName;
            $film->path = $tmpFilePath.'/'.$tmpFileName;
            $film->save();


            return response()->json(array('path'=> $path), 200);
        } else {
            return response()->json(false, 200);
        }
    }

    public function ratedfilms()
    {
        return view('films.rated');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:films|max:255',
            'length' => 'required',
        ]);
        $film = new Film();
        $film->name = $request->input('name');
        $film->category = $request->input('category');
        $film->length = $request->input('length');
        $film->origin = $request->input('origin');
        $film->genre = $request->input('genre');
        $film->producer = $request->input('producer');
        $film->poster = $request->input('poster');
        $film->year_of_production = $request->input('year_of_production');
        $film->description = $request->input('description');
        $film->createdby = Auth::User()->id;
        $film->save();

        $logs=new AuditLog;
        $logs->username =Auth::User()->username;
        $logs->activity ="Create Film New Film";
        $logs->status ="1";
        $logs->userID =Auth::User()->id;
        $logs->save();


        return response()->json([
            'success'=>false,
            'status'=>'00',
            'message' =>'<code>'. Input::get('name').'</code>'.' Created Successfully'
        ]);


    }

    public function getFilmsList()
    {
        $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                               <div class="clearfix"></div>
                               <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-edit" data-id=" {{ $id }}" class="edit">Edit</a></li>
                                <div class="clearfix"></div>
                                @if($rated===2)
                                    <li><a href="'.url("certificate/print/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">Film Certificate</button></li>
                                @endif
                                <div class="clearfix"></div>
                                @if($posterrated==1)
                                    <li><a href="'.url("certificate/poster/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">Poster Certificate</button></li>
                                @endif
                                <div class="clearfix"></div>
                                @if($rated===0)
                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-upload" data-id=" {{ $id }}" data-name="{{$name}}" class="upload">Upload Film</a></li>
                                    @if($poster=="Yes")
                                        @if($posteruploaded==0)
                                        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-poster" data-id=" {{ $id }}" data-name="{{$name}}" class="poster">Upload Poster</a></li>
                                        @elseif($posteruploaded==1)
                                        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-poster" data-id=" {{ $id }}" data-name="{{$name}}" class="poster">Update Poster</a></li>
                                    @endif
                                    @endif
                                @endif
                                <div class="clearfix"></div>
                            </ul>
                        </div>';
        $films = DB::table('films');
        return Datatables::of($films)
            ->editColumn('rated','@if($rated==0)
                                <span class="badge badge-default">Awaiting Rating</span>
                            @elseif($rated==1)
                                <span class="badge badge-primary">Awaiting Moderation</span>
                            @elseif($rated==2)
                                <span class="badge badge-success">Rating Successful</span>
                            @elseif($rated==3)
                                <code class="badge badge-danger">Rectected</code>
                            @endif')
            ->editColumn('poster','@if($poster=="Yes")
                                <span class="badge badge-success">YES</span>
                                @if($posteruploaded==1)
                                    <button data-toggle="modal" data-target=".bs-example-modal-viewposter" data-id=" {{ $id }}" data-name="{{$name}}" data-poster="{{$path}}"  class="btn btn-circle btn-success btn-xs viewposter">View Poster</button>
                                 @elseif($posteruploaded==0)
                                    <button class="btn btn-circle btn-danger btn-xs poster" data-toggle="modal" data-target=".bs-example-modal-poster" data-id=" {{ $id }}" data-name="{{$name}}" >Upload Img</button>
                                 @endif
                            @elseif($poster=="No")
                                <span class="badge badge-danger">NO</span>
                            @endif')
            ->editColumn('id',"{{ \$id }}")
            ->addColumn('actions',$action)
            ->make(true);
    }
    public function getRatedFilmsList()
    {
        $films = DB::table('films')->where('rated',1);
        $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="'.url("rate/page1/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">View Rate Film</button></li>
                            </ul>
                        </div>';

        return Datatables::of($films)
            ->editColumn('id',"{{ \$id }}")
            ->addColumn('actions',$action)
            ->make(true);
    }

    //get the bank details by id
    public function getEditData($id)
    {
        $group=Film::find($id);
        return json_encode($group);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::All(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            //Record Audit Logs
            $logs=new AuditLog;
            $logs->username =Auth::User()->username;
            $logs->activity ="Edit Film; Validation error ";
            $logs->status ="0";
            $logs->userID =Auth::User()->id;
            $logs->save();
            return response()->json([
                'success'=>false,
                'status'=>'01',
                'errors'=>$validator->errors()->toArray()
            ]);
        }
        else{
            $film = Film::find(Input::get('id'));
            if( Input::get('updater')==2){
                $film->status = $request->input('updatestatus');
                $film->deactivatedby = Auth::User()->id;
                $film->save();
            }elseif( Input::get('updater')==3){
                $film->status = $request->input('updatestatus');
                $film->activatedby = Auth::User()->id;
                $film->save();
            }
            else{
                $film->name = $request->input('name');
                $film->genre = $request->input('genre');
                $film->category = $request->input('category');
                $film->length = $request->input('length');
                $film->origin = $request->input('origin');
                $film->year_of_production = $request->input('year_of_production');
                $film->description = $request->input('description');
                $film->updatedby = Auth::User()->id;
                $film->updated_at = strtotime("now");
                $film->save();

                $logs=new AuditLog;
                $logs->username =Auth::User()->username;
                $logs->activity ="Edit film <code>".$request->input('name')."</code> details";
                $logs->status ="1";
                $logs->userID =Auth::User()->id;
                $logs->save();
            }
            return response()->json([
                'success'=>false,
                'datainput'=>$film,
                'status'=>'00',
                'message' =>'<code>'. Input::get('name').'</code>'.' Updated Successfully'
            ]);
        }
    }
}
