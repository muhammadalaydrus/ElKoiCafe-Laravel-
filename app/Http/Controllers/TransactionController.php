<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use App\Cart;
use Auth;
class TransactionController extends Controller
{
    public function index(){
      $userTransaction = Transaction::where('user_id',Auth::user()->id)->get();
      $userTransactiondate = Transaction::select('created_at')->where('user_id',Auth::user()->id)->first();
      $getpayment = Transaction::select('payment')->where('user_id',Auth::user()->id)->first();

      return view('transaction.history',compact('userTransaction','userTransactiondate','getpayment'));
    }

    public function adminIndex(){
      $adminTransactiondate = Transaction::select('created_at')->where('user_id',Auth::user()->id)->first();
      $adminTransaction = Transaction::all();
      return view('transaction.adminHistory',compact('adminTransaction','adminTransactiondate'));
    }

    public function store(Request $request){
      $this->validate($request,[
        'payment' => 'required|numeric',
      ]);
      $cart = Cart::where('User_id',Auth::user()->id)->get();
      $getPrice = Cart::select('Total_Price')->where('user_id',Auth::user()->id)->get();
      $total = 0;
      foreach ($getPrice as $c) {
        $total+= $c->Total_Price + $c->Total_Price;
      }
      foreach ($cart as $c) {
        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->product_id = $c->product_id;
        $transaction->payment = $request->payment;
        $transaction->Qty = $c->Qty;
        $transaction->Total_Price = $c->Total_Price;
        $transaction->save();
      }
      Cart::where('user_id',Auth::user()->id)->delete();
      return redirect()->back();
    }
}
