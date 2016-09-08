<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $configs=Config::paginate(10);
        return view('config.index',compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'configname' => 'required',
            'configvalue' => 'required',
            'description' => 'required',
        ]);
        $config = new Config();

        // save image data into database //
//        $config->name = $request->input('name');
        $config->configname = $request->input('configname');
        $config->configvalue = $request->input('configvalue');
        $config->description = $request->input('description');
        $config->status = 1;
        $config->save();

        return redirect('config/')->with('message','Configuration Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $config=Config::find($id);
        return view('config.edit',compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $task = Config::findOrFail($id);
        $this->validate($request, [
            'configvalue' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $task->fill($input)->save();
        Session::flash('message', 'Task successfully added!');
        return redirect()->back();

//        return redirect('config/')->with('message','Configuration Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Config::find($id)->delete();
        return redirect('config/')->with('message','Configuration Deleted!');
    }
}
