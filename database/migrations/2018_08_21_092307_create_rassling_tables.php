<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRasslingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //wrestlers
        Schema::create('wrestlers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->int('height');
            $table->int('weight');
            $table->date('birth')
            $table->char('gender')
        });
        //championships
        Schema::create('championships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('promotion');
        });
        //tag teams
        Schema::create('tag_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->int('wrestler1');
            $table->int('wrestler2');
            $table->foreign('wrestler1')->references('id')->on('wrestlers');
            $table->foreign('wrestler2')->references('id')->on('wrestlers');
        });        
        //times wrestlers held the championships
        Schema::create('championship_reigns', function (Blueprint $table) {
            $table->increments('id');
            $table->int('wrestler');
            $table->int('championship');
            $table->date('begining');
            $table->date('end');
            $table->foreign('wrestler')->references('id')->on('wrestlers');
            $table->foreign('championship')->references('id')->on('championships');
        });  
        //times tag teams have held championships
        Schema::create('championship_reigns', function (Blueprint $table) {
            $table->increments('id');
            $table->int('tag_team');
            $table->int('championship');
            $table->date('begining');
            $table->date('end');
            $table->foreign('wrestler')->references('id')->on('wrestlers');
            $table->foreign('championship')->references('id')->on('championships');
        });   
        //singles match results     
        Schema::create('singles_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('result');
            $table->int('winner');
            $table->int('championship');
            $table->boolean('championship_change');
            $table->time('length');
            $table->date('date');
            $table->string('promotion');
            $table->foreign('winner')->references('id')->on('wrestlers');
            $table->foreign('championship')->references('id')->on('championships');
        });    
        //singles match participants
        Schema::create('singles_participations', function (Blueprint $table) {
            $table->increments('id');
            $table->int('wrestler');
            $table->int('match');
            $table->foreign('wrestler')->references('id')->on('wrestlers');
            $table->foreign('match')->references('id')->on('singles_results');
        });    
        //tag matches
        Schema::create('tag_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('result');
            $table->int('winner');
            $table->int('championship');
            $table->boolean('championship_change');
            $table->time('length');
            $table->date('date');
            $table->string('promotion');
            $table->foreign('winner')->references('id')->on('tag_teams');
            $table->foreign('championship')->references('id')->on('championships');
        });  
        //tag team participants  
        Schema::create('tag', function (Blueprint $table) {
            $table->increments('id');
            $table->int('team');
            $table->int('match');
            $table->foreign('wrestler')->references('id')->on('tag_teams');
            $table->foreign('match')->references('id')->on('tag_results');
        });                                    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
