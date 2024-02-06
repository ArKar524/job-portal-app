<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index() {
        $employerCount = Employer::Count();
        $jobCount = Job::Count();;
        $userCount = User::where('status','user')->count();
        return view('admin-panel.admin.index',compact('employerCount','jobCount','userCount'));
    }

    public function jobs() {
        $applicationCount = Application::all()->count();
        $jobs = Job::orderBy("created_at","desc")->where('user_id',Auth::user()->id)->get();

        return view('admin-panel.employer.job.index',compact('jobs','applicationCount'));
    }

    public function allJobs() {
        $allJobs = Job::all();
        $user = User::all();

        return view('admin-panel.admin.job.index',compact('allJobs','user',));
    }
    
    
}
