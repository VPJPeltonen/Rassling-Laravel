<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\TagMatch;

class MatchController extends Controller
{
  public function index(){
    $matches = Match::all();
    $tagmatches = TagMatch::all();

    return view('matches.index' , compact('matches'), compact('tagmatches'));
  }

  public function show(Match $match){
    return view('matches.show ' , compact('matche'));
  }
}
