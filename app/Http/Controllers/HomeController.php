<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(){
        $jobs = Job::where('status', 'approve')->get();
        return view('ui-display.index',compact('jobs'));
    }    
}
