<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class UiDisplayController extends Controller
{
    public function jobs(){
        $categories = Category::all();
        $jobs = Job::where('status','approve')->get();
        return view('ui-display.job.jobs', compact('categories','jobs'));
    }
    public function searchByCategory(Request $request, $id) {
        // dd($id);
        $categories = Category::all();
        $jobs = Job::where('status','approve')->where('category_id',$id)->get();

        return view('ui-display.job.jobs', compact('categories','jobs'));
    }

    public function team(){
        return view('ui-display.team');
    }

    public function contact(){
        return view('ui-display.contact');
    }

    public function terms(){
        return view('ui-display.terms');
    }

    public function about(){
        return view('ui-display.about');
    }

    public function job_details($id) {
        
        $job = Job::find($id);
        return view('ui-display.job.job-details',compact('job'));
    }

    public function testimonials(){
        return view('ui-display.testimonials');
    }
}

