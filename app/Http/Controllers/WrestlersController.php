<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wrestler;

class WrestlersController extends Controller
{
    public function index(){
      $wrestlers = Wrestler::all();

      return view('wrestlers.index' , compact('wrestlers'));
    }

    public function show(Wrestler $wrestler){
      return view('wrestlers.show ' , compact('wrestler'));
    }
}
