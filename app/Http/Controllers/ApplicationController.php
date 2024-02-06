<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Education;
use App\Models\InterviewInfo;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id =Auth::user()->id;
        $isExit = Application::where('job_id', $request->jobId)->where('user_id', $user_id)->first();
    //    dd($request->all());
        $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'skills' =>'required|array|min:1',
            'skills.*' => 'required|string',
            'educations' =>'required|array|min:1',
            'educations.*' => 'required|string',
            'schools' =>'required|array|min:1',
            'schools.*' => 'required|string',
            'years' =>'required|array|min:1',
            'years.*' => 'required|string',
            'experience' =>'required',
            'expected_salary' =>'required',
        ]);

    //    dd($request->all());
   
    //    if (!$isExit) {
                $application = Application::create([
                'job_id' => $request->jobId,
                'user_id' => $user_id,
                'name' => $request->name,
                'email' => $request->email,
                'experience' => $request->experience,
                'expected_salary' => $request->expected_salary,
                'status' => 'pending'
            ]);
                //   different for skills saving data
            // if($request->has('skills')){
            //     foreach ($request->skills as $index => $skill) {
            //         $application->skill()->create([
            //             'skill' => $skill[$index],
            //         ]);
            //     }
            // }

            if ($request->has('skills')) {
                $skills = $request->input('skills');
            
                for ($i = 0; $i < count($skills); $i++) {
                    $application->skill()->create([
                        'skill' => $skills[$i],
                    ]);
                }
            }
            

          if($request->has('educations')) {
            $educations = $request-> educations;
            $schools = $request->schools;
            $years = $request->years;

            for ($i = 0 ; $i < count($educations); $i++) {
                $application->education()->create([
                    'education' => $educations[$i],
                    'school' => $schools[$i],
                    'year' => $years[$i],
                ]);
            }
           

          }
    //    }
        return redirect('/profile')->with('successMsg','Successfully Apply the Job! Good luck');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $isExit = Application::where('job_id', $id)->where('user_id', Auth::user()->id)->first();

        if($isExit) {
            return back()->with('errorMsg','You Already Apply For This Job');
        } else {
            $jobId = $id;
            return view('ui-display.application.index',compact('jobId'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::find($id);
        $application->update([
            'status' => 'unApplied',
        ]);
        return redirect('/profile')->with('successMsg','Successfully Deleted the Job Application');
    }
    public function applicationAccept( $id) {
        // dd($id);
        $application = Application::find($id);
        $application->update([
            'status' => 'accepted',
        ]);
        return back()->with('successMsg','Successfully Accepted the Job Application');
    }

    public function applicationDecline( $id) {
        // dd($id);
        $application = Application::find($id);
        $application->update([
            'status' => 'decline',
        ]);
        return back()->with('successMsg','Successfully Declined the Job Application');
    }
}
