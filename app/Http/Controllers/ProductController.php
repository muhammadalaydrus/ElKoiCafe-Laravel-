<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProductType;
use App\Product;

class ProductController extends Controller
{
    public function index(){
      $product_types = ProductType::all();
      $products = Product::paginate(3);
      return view('product.product', compact('product_types','products'));
    }

    public function manage(){
      $product_types = ProductType::all();
      $products = Product::paginate(4);
      return view('product.manage', compact('products','product_types'));
    }

    public function storeProduct(Request $request){
      $this->validate($request,[
        'product_name' => 'required|unique:products,product_name|min:5',
        'type' => 'required',
        'Price' => 'required|numeric',
        'image' => 'required',
      ]);

      $products =  new Product;

      $image = $request->file('image');
      $filename = str_random(10) . $image->getClientOriginalName();
      $image->move(public_path('/productImg/') , $filename);

      $products->product_name = $request->product_name;
      $products->product_type_id = $request->type;
      $products->Price = $request->Price;
      $products->product_image = $filename;
      $products->save();

      return redirect('/manageProduct');
    }

    public function showUpdateForm($id){
      $products = Product::find($id);
      $product_types = ProductType::all();
      return view('product.update',compact('products','product_types'));
    }

    public function patch(Request $request,$id){
      $this->validate($request,[
        // 'product_name' => 'required|unique:products,product_name|min:5',
        // 'type' => 'required',
        // 'Price' => 'required|numeric',
        // 'stock' =>  'required',
        // 'image' => 'required',
      ]);
      $products = Product::find($id);

      $image = $request->file('image');
      $filename = str_random(10) . $image->getClientOriginalName();
      $image->move(public_path('/productImg/') , $filename);

      $products->product_name = $request->product_name;
      $products->product_type_id =$request->type;
      $products->Price= $request->Price;
      $products->product_image = $filename;
      $products->product_stock = $request->stock;
      $products->save();

      return redirect('/manageProduct');

    }

    public function destroy($id){
      $products = Product::find($id);
      $products->delete();

      return redirect()->back();
    }
}
