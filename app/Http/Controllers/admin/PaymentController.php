<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index() {

        $payments = Payment::all();
        $isExit = Payment::where('employer_id', Auth::user()->id)->first();
        // dd($isExit);
        return view('admin-panel.payment.index',compact( 'isExit', 'payments' ));
    }
     public function request(Request $request) {
        $employerId = Auth::user()->id;
        $image = $request->image;
        $imageName = uniqid(). '_'. $image->getClientOriginalName();

        $image->storeAs('public/payment-images/', $imageName);
        $payment = Payment::create([
            'employer_id' => $employerId,
            'image' => $imageName,
            'transaction_number' => $request->transaction_number,
        ]);
        return redirect('/employer/payment')->with('successMsg','Payment Request is Successfull . Please wait Confirm By Admin');
    }
    public function confirm(Request $request ,$id) {
        
        $payment = Payment::find($id);
        $payment->update([
            'status' => 'confirm'
        ]);
        Employer::where('user_id',$request->employer_id)->update([
            'status' => 'employer'
        ]);
        return redirect('/employer/payment')->with('successMsg','Successfully Confirm the Payment');
    }


}
