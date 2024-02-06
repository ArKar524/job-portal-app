<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function index() {
        $jobCount = Job::where('user_id',Auth::user()->id)->get();
        $jobs = Job::where('user_id',Auth::user()->id)->count();

        if(Auth::user()->employer->status === 'null'){ 
            return redirect('/employerLogin');
        }
        return view("admin-panel.employer.index", compact('jobCount', 'jobs'));
    }
    public function employerRegisterIndex(){
        return view('admin-panel.auth.employer.register');
    }

    public function employerRegisterStore(Request $request){
   
        // dd($request->image);
        $request->validate([
            'name' => 'required',
            'email' =>'required|unique:users',
            'password' =>'required',
            'address' =>'required',
            'description' =>'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/employer-images/',$imageName);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'employer'
        ]);
        $employer = new Employer([
            'address' => $request->address,
            'description' => $request->description,
            'image' => $imageName,
            'website' => $request->website,
        ]);
        $user->employer()->save($employer);
       

    return redirect('/employerLogin')->with('successMsg','You Have Successfully finished registration. Please Login');
    }

    public function employerLoginIndex(){
        return view('admin-panel.auth.employer.login');
    }
    public function employerLoginStore(Request $request){
        $loginUser = $request->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);
        // dd($loginUser);
        if(Auth::attempt($loginUser)){
            return redirect('/employer');
        } else {

            return redirect('/employerLogin')->with('errorMsg','Invalid credentials');
        }
    }
   
    public function Logout(){
        // FacadesSession::flush();
        Auth::logout();
        return redirect('/');
    }
}
