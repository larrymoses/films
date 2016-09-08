<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Users;
use App\Film;
use App\Group;
use Auth;
use DB;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       
        return view('home.home');
    }    
    public function redirect()
    {
        if((Auth::User()->GroupID===1 || Auth::User()->GroupID===2)){
            return redirect('dashboard');
        }
        elseif ((Auth::User()->GroupID===3)) {
            return redirect('rater');
        }
        elseif ((Auth::User()->GroupID===4)) {
            return redirect('moderator');
        } elseif ((Auth::User()->GroupID===5)) {
            return redirect('client');
        }
    }   
     public function reportsDasboard()
    {
        $data['users']=Users::count();
        $data['groups']=Group::count();
        $data['films']=Film::count();
        return view('home.index')->with('data',$data);
    }
}
