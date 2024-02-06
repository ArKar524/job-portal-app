<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{

    // employees
    public function index(){
        return view('admin-panel.auth.user.register');
    }
    public function register(Request $request){
   
        $request->validate([
            'name' =>'required',
            'email' =>'required|unique:users|email',
            'password' =>'required',
        ]);
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'status' => 'user'
    ]);

    return redirect('/login')->with('successMsg','Successfully finished registration. Please Login');

    }

    public function login(){
        return view('admin-panel.auth.user.login');
    }
    public function login1(Request $request){
        // dd($request->email);
        $loginUser = $request->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);
        if(Auth::attempt($loginUser)){
            return redirect('/admin')->with('','');
        } else {
            return back()->with('errorMsg','Invalid Credentials');
        }
    }

    public function logout(){
        // FacadesSession::flush();
        Auth::logout();
        return redirect('/');
    }

    // end employee 
}
