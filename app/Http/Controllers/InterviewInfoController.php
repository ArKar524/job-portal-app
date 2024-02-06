<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\InterviewInfo;
use Illuminate\Http\Request;

class InterviewInfoController extends Controller
{
    public function store(Request $request) {

        $isExit = InterviewInfo::where('application_id', $request->application_id)->first();
        // dd($isExit);
        if($isExit) {
            return back()->with('errorMsg', 'You Have Already Written Interview Info! You Cannot Modify That.');
        }else{
            $request->validate([
                'application_id' =>'required',
                'description' =>'required',
            ]);
            InterviewInfo::create([
                'application_id' => $request->application_id,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('successMsg', 'Interview Information Saved');
        }
    }

    
}
