<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AuditLog;
use Datatables;
use DB;
class AuditLogsController extends Controller
{
    public function __construct(){
        $this->middleware(array('auth'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $logs=AuditLog::All();
       return view('logs.index')->with('logs',$logs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function getLogs()
    {

        $logs=DB::table('audit_logs');
        return Datatables::of($logs)
            ->editColumn('status','@if($status===1)
                                <span class="text-success">Success</span>
                            @elseif($status===0)
                                <span class="text-danger">Failled</span>
                            @endif')
            ->editColumn('id',"{{ \$id }}")
            ->make(true);
    }
}
