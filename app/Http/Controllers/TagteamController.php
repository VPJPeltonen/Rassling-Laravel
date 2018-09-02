<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TagTeam;

class TagteamController extends Controller
{
  public function index(){
    $tagteams = TagTeam::all();

    return view('tagteams.index' , compact('tagteams'));
  }

  public function show(TagTeam $tagteam){
    return view('tagteams.show ' , compact('tagteam'));
  }
}
