<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HowToController extends Controller
{
      public function index(){
        return view('howto.index',compact('text'));
      }
}
