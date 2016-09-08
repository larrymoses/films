<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;
use DB;
use Auth;
use Datatables;
use App\AuditLog;
use App\Film;
use Illuminate\Support\Facades\Storage;
class ClientFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre=DB::table('genres')->lists('name','name');
        $category=DB::table('category')->lists('name','name');
        return view('client.films',compact('category','genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function upload_film(Request $request)
    {
        $id=$request->input('uploadID');
        $file=$request->file('film');
        $user=Auth::User()->username;
        if (!empty($file)) {
            if ($request->file('film')->isValid()) {
                if(Storage::put(
                    'client_films/'.$user.'/'.$file->getClientOriginalName(), file_get_contents($request->file('film')->getRealPath())
                )) {
                    $film = Film::find($id);
                    $film->url = Storage::url('client_films/' . $user . '/' . $file->getClientOriginalName());
                    $film->uploadname = $file->getClientOriginalName();
                    $film->save();

                    return response()->json([
                        'success' => true,
                        'status' => "00",
                        'message' => 'Uploaded Successfully'
                    ]);
                }
            }else{
                return response()->json([
                    'success' => false,
                    'status' => "01",
                    'error' => 'Unsupported File type'
                ]);
            }
        }else{
            response()->json([
                'success' => false,
                'status' => "01",
                'error' => 'We have A  problem please contact system admin'
            ]);
        }
    }

    public function delete(Request $request)
    {

        $id=$request->input('id');
        $reason=$request->input('reason');
        $logs=new AuditLog;

        $film=Film::find($id);
        if($film->delete()){
            $logs->username =Auth::User()->username;
            $logs->activity ="Deleted film with reason: ".$reason;
            $logs->status ="1";
            $logs->userID =Auth::User()->id;
            $logs->save();
            return response()->json([
                'success'=>false,
                'status'=>'00',
                'message' =>'<code>Film Deleted </code>'.' Film Deleted Successfully'
            ]);
        }
        $logs->username =Auth::User()->username;
        $logs->activity ="Delete film with reason : ".$reason.' failed';
        $logs->status ="0";
        $logs->userID =Auth::User()->id;
        $logs->save();
        return response()->json([
            'success'=>false,
            'status'=>'01',
            'message' =>'<code>Film Delete </code>'.'Failed'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function get_client_films()
    {
        $action='<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                                @if($rated===0)
                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-delete" data-id=" {{ $id }}" data-name="{{$name}}" class="delete">Delete</a></li>
                                <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-upload" data-id=" {{ $id }}" data-name="{{$name}}" class="upload">Upload Film</a></li>
                                @elseif($rated===2)
                                 <li> <a href="'.url("certificate/print/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">View Certificate</button>
                                 </li>
                                @endif
                                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-edit" data-id=" {{ $id }}" class="edit">Edit</a></li>
                                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-upload" data-id=" {{ $id }}" data-name="{{$name}}" class="upload">Upload Film</a></li>
                                @if($posterrated==1)
                                    <li><a href="'.url("certificate/poster/".'{{ $id }}').'"   data-id=" {{ $id }}" data-name="{{$name}}" class="class="btn btn-primary viewToEditBtn">Poster Certificate</button></li>
                                @endif
                            </ul>
                        </div>';
        $films = DB::table('films')->where('createdby',Auth::User()->id);
        return Datatables::of($films)
            ->editColumn('rated','@if($rated===0)
                                <code class="text-default">Awaiting Rating</code>
                            @elseif($rated===1)
                                <code class="text-primary">Awaiting Moderation</code>
                            @elseif($rated===2)
                                <code class="text-success">Rating Successful</code>
                            @elseif($rated===3)
                                <code class="text-danger">Rectected</code>
                            @endif')
            ->editColumn('id',"{{ \$id }}")
            ->addColumn('actions',$action)
            ->make(true);
    }
}
