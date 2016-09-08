<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;
use Auth;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['all']=DB::table('films')->where('createdby',Auth::User()->id)->count(DB::raw('DISTINCT id'));
        $data['unrated']=DB::table('films')->where('createdby',Auth::User()->id)->where('rated',0)->count(DB::raw('DISTINCT id'));
        $data['rated']=DB::table('films')->where('createdby',Auth::User()->id)->where('rated',1)->count(DB::raw('DISTINCT id'));
        $data['moderated']=DB::table('films')->where('createdby',Auth::User()->id)->where('rated',2)->count(DB::raw('DISTINCT id'));
        $data['declined']=DB::table('films')->where('createdby',Auth::User()->id)->where('rated',3)->count(DB::raw('DISTINCT id'));
        return view('client.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function client_profile()
    {
        return view('client.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_picture(Request $request)
    {
        if(Input::hasFile('file')) {
            //upload an image to the /img/tmp directory and return the filepath.

            $file = Input::file('file');
            $userID = Auth::User()->id;
            $userName = Auth::User()->username;
            $tmpFilePath = '/uploads/users/profile/'.$userName;
            $tmpFileName = $file->getClientOriginalName();
            $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
            $path = $tmpFilePath .'/'. $tmpFileName;

            $user = Users::find($userID);
            $user->avator = $tmpFilePath.'/'.$tmpFileName;
            $user->save();


            return response()->json(array('path'=> $path), 200);
        } else {
            return response()->json(false, 200);
        }
        
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
}
