<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProductType;
class TypeController extends Controller
{
    public function index(){
      $product_types = ProductType::all();
      return view('type.manage',compact('product_types'));
    }

    public function store(Request $request){
      $this->validate($request,[
        'type_name' => 'required|min:3|unique:product_types,type_name',
      ]);

      $product_types = new ProductType;
      $product_types->type_name = $request->type_name;
      $product_types->save();

      return redirect()->back();
    }

    public function patch(Request $request,$id){
      $product_types = ProductType::find($id);

      $product_types->type_name = $request->type_name;
      $product_types->save();
      return redirect()->back();
    }

    public function destroy($id){
      $product_types = ProductType::find($id);
      $product_types->delete();

      return redirect()->back();
    }
}
