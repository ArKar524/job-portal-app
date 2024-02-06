<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\InterviewInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{   
    public function index(Request $request) {
        if(!Auth::check()){
            return redirect('/login');
        }
        $interviewInfo = InterviewInfo::all();
        $applications = Application::where('user_id', Auth::user()->id)->get();
        return view('ui-display.profile.index', compact('applications', 'interviewInfo'));
    }
}
