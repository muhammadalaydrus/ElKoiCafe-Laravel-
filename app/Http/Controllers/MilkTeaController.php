<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\ProductType;

class MilkTeaController extends Controller
{
  public function showpage($type){
    $type = ProductType::where('type_name' , $type)->first();
    $products = Product::where('product_type_id' , $type->id)->paginate(2);
    $product_types = ProductType::all();

    return view('milktea.product', compact('products','product_types'));
  }

  // public function filter(){
  //   $product_types = ProductType::all();
  //   $products = Product::paginate(4);
  //   return view('milktea.manage', compact('products','product_types'));
  // }

  public function storeProduct(Request $request){
    $this->validate($request,[
      'product_name' => 'required|unique:products,product_name|min:5',
      'type' => 'required',
      'Mprice' => 'required|numeric',
      'Lprice' => 'required|numeric',
      'image' => 'required',
    ]);

    $products =  new Product;

    $image = $request->file('image');
    $filename = str_random(10) . $image->getClientOriginalName();
    $image->move(public_path('/productImg/') , $filename);

    $products->product_name = $request->product_name;
    $products->product_type_id = $request->type;
    $products->product_M_price = $request->Mprice;
    $products->product_L_price = $request->Lprice;
    $products->product_image = $filename;
    $products->save();

    return redirect('/');

  }

  public function showUpdateForm($id){
    $products = Product::find($id);
    $product_types = ProductType::all();
    return view('product.update',compact('products','product_types'));
  }

  public function patch(Request $request,$id){
    $this->validate($request,[
      'product_name' => 'required|unique:products,product_name|min:5',
      'type' => 'required',
      'Mprice' => 'required|numeric',
      'Lprice' => 'required|numeric',
      'stock' =>  'required',
      'image' => 'required',
    ]);
    $products = Product::find($id);

    $image = $request->file('image');
    $filename = str_random(10) . $image->getClientOriginalName();
    $image->move(public_path('/productImg/') , $filename);

    $products->product_name = $request->product_name;
    $products->product_type_id =$request->type;
    $products->product_M_price= $request->Mprice;
    $products->product_L_price = $request->Lprice;
    $products->product_image = $filename;
    $products->product_stock = $request->stock;
    $products->save();

    return redirect('/');

  }

  public function destroy($id){
    $products = Product::find($id);
    $products->delete();

    return redirect()->back();
  }
}
