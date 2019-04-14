<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;
use Auth;

class ConfirmController extends Controller
{
    public function index(){
      return view('confirm.confirm', compact('user'));
    }

    public function patchConfirm(Request $request){
      $this->validate($request,[
          // 'name' => 'required|min:5|max:25',
          // 'bank' => 'required|min:5|max:25'
      ]);

      $payment = new Payment;

      $image = $request->file('payment_receipt');
      $filename = str_random(10) . $image->getClientOriginalName();
      $image->move(public_path('/receiptImg/') , $filename);

      $payment->user_id = Auth::user()->id;
      $payment->name  = $request['name'];
      $payment->bank = $request['bank'];
      $payment->card_owner = $request['card_owner'];
      $payment->payment_receipt = $filename;
      $payment->buyer_email = $request['buyer_email'];
      $payment->save();

      return redirect('/confirm');

    }
}
