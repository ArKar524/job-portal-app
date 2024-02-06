<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\InterviewInfo;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy("created_at","desc")->get();
        
        return view('ui-display.profile.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.employer.job.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' =>'required',
            'position' =>'required',
            'salary' =>'required',  
            'description' =>'required',      
        ]);
         $userId =  Auth::user()->id;
        $job = Job::create([
            'user_id' =>$userId,
            'position' =>$request->position,
            'category_id' => $request->category_id,
            'description' =>$request->description,
            'salary' =>$request->salary,
        ]);
        return redirect('/employer/jobs')->with('successMsg','Successfully created a new Job');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $applications = Application::where('job_id', $id)->get();
        $job = Job::find($id)->get();
        return view('admin-panel.employer.job.application',compact('applications','job',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);
        $categories = Category::all();
        return view('admin-panel.employer.job.edit',compact('job','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' =>'required',
            'position' =>'required',
            'salary' =>'required',  
            'description' =>'required',      
        ]);
        $job = Job::find($id);
        $job->position = $request->position;
        $job->category_id = $request->category_id;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->save();
        return redirect('/employer/jobs')->with('successMsg','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect('/employer/jobs')->with('successMsg','Successfully deleted');
    }


    public function jobApprove( $id) {
        // dd($id);
        $job = Job::find($id);
        $job->update([
            'status' => 'approve'
        ]);
        return redirect('/admin/jobs')->with('successMsg','Successfully approved the job');
    }

    public function jobDecline( $id) {
        // dd($id);
        $job = Job::find($id);
        $job->update([
            'status' => 'decline'
        ]);
        return redirect('/admin/jobs')->with('successMsg','Successfully Declined the job');
    }
    public function jobRemove( $id) {
        // dd($id);
        $job = Job::find($id);
        $job->update([
            'status' => 'remove'
        ]);
        return redirect('/admin/jobs')->with('successMsg','Successfully Remove the job');
    }
}
