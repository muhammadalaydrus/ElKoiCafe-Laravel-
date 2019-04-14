<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cart;
use App\Product;
use Auth;

class CartController extends Controller
{
    public function index(){
      $carts = Cart::all();
      $getPrice = Cart::select('Total_Price','Qty')->where('user_id',Auth::user()->id)->get();
      $total = 0;
      $qty = 0;
      foreach ($getPrice as $c) {
        $total+= $c->Total_Price;
        $qty += $c->Qty;
      }
      //dd($total);
      // foreach ($carts as $c) {
      //   dd($c->Product['product_image']);
      // }
      return view('cart.cart',compact('carts','total','qty'));
    }

    public function store(Request $request,$id){
      $itemPrice = Product::select('Price')->where('id',$id)->first();
      $flag = false;

      $getQty = Cart::select('Qty')->where('product_id',$id)
                ->where('user_id',Auth::user()->id)->first();

      $checkCarts = Cart::select('user_id','product_id')->where('user_id',Auth::user()->id)->where('product_id',$id)
                    ->first();
      $checkProduct = Cart::select('product_id')->where('user_id',Auth::user()->id)->where('product_id',$id)
                    ->first();


      if($checkCarts != null){
        $flag = true;
      }
      else{
        $carts = new Cart;
        $carts->user_id = Auth::user()->id;
        $carts->product_id = $id;
        $carts->Qty = $request->Qty;
        $carts->Total_Price = $itemPrice->Price * $request->Qty;

        $carts->save();
        return redirect()->back();
      }

      if($flag){
            if($checkProduct != null){
                $newQty = $getQty->Qty + $request->Qty;
                Cart::where('user_id',Auth::user()->id)->where('product_id',$id)->update(['Qty' => $newQty]);
                $newtotalPrice = $newQty * $itemPrice->Price;
                Cart::where('user_id',Auth::user()->id)->where('product_id',$id)->update(['Total_Price' => $newtotalPrice]);
                $newQty = 0;
                $flag = false;
                return redirect()->back();
            }
          }
    }

    public function destroy($id){
      $cart = Cart::where('product_id',$id);
      $cart->delete();
      return redirect()->back();
    }


}
