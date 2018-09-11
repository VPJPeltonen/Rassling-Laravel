<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Championship;

class ChampionshipController extends Controller
{
  public function index(){
    $championships = Championship::all();
    $championshipreigns = ChampionshipReign::all();
    return view('championships.index' , compact('championships'), compact('$championshipreigns'));
  }

  public function show(Championship $championship){
    return view('championships.show ' , compact('championship'));
  }
}
