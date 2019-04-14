<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ShippingController extends Controller
{
  public function index(){
    return view('shipping.index',compact('text'));
  }
}
