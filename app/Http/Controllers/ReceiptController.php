<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payment;
use Auth;

class ReceiptController extends Controller
{
  public function index(){
    $userReceipts = Payment::where('user_id',Auth::user()->id)->get(); // tarik semua data berdasarkan user_id
    //$userReceiptDate = Payment::select('created_at')->where('user_id',Auth::user()->id)->first();
    //$getReceipt = Payment::select('payment')->where('user_id',Auth::user()->id)->first();
    return view('receipt.adminReceiptHistory',compact('userReceipts'));
  }

  public function index2(){
    $adminReceiptDates = Payment::where('user_id',Auth::user()->id)->get();
    $adminReceipts = Payment::all();
    return view('receipt.userhistory',compact('adminReceiptDates','adminReceipt'));
  }

  public function store(Request $request){
    $this->validate($request,[
      //'payment' => 'required|numeric',
    ]);
    $payment = Payment::where('User_id',Auth::user()->id)->get();
    foreach ($payment as $p) {
      $bayar = new Payment;
      $bayar->user_id = Auth::user()->id;
      $bayar->name = $request->name;
      $bayar->email = $p->email;
      $bayar->card_owner = $p->card_owner;
      $bayar->bank = $p->bank;
      $bayar->payment_receipt = $p->payment_receipt;
      $bayar->save();
    }

    Payment::where('user_id',Auth::user()->id)->delete();
    return redirect()->back();
  }
}
