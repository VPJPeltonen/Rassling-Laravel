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
            $table->integer('height')->nullable($value = true);
            $table->integer('weight')->nullable($value = true);
            $table->date('birth')->nullable($value = true);
            $table->char('gender')->nullable($value = true);
        });
        //championships
        Schema::create('championships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('promotion')->nullable($value = true);
        });
        //tag teams
        Schema::create('tag_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('wrestler1');
            $table->string('wrestler2');
            $table->foreign('wrestler1')->references('name')->on('wrestlers');
            $table->foreign('wrestler2')->references('name')->on('wrestlers');
        });        
        //times wrestlers held the championships
        Schema::create('championship_reigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wrestler');
            $table->string('championship');
            $table->date('begining')->nullable($value = true);
            $table->date('end')->nullable($value = true);
            $table->foreign('wrestler')->references('name')->on('wrestlers');
            $table->foreign('championship')->references('name')->on('championships');
        });  
        //times tag teams have held championships
        Schema::create('tag_reigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag_team');
            $table->string('championship');
            $table->date('begining')->nullable($value = true);
            $table->date('end')->nullable($value = true);
            $table->foreign('tag_team')->references('name')->on('tag_teams');
            $table->foreign('championship')->references('name')->on('championships');
        });   
        //singles match results     
        Schema::create('singles_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('result');
            $table->string('winner')->nullable($value = true);
            $table->string('championship')->nullable($value = true);
            $table->boolean('championship_change')->nullable($value = true);
            $table->time('length')->nullable($value = true);
            $table->date('date')->nullable($value = true);
            $table->string('promotion')->nullable($value = true);
            $table->foreign('winner')->references('name')->on('wrestlers');
            $table->foreign('championship')->references('name')->on('championships');
        });    
        //singles match participants
        Schema::create('singles_participations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wrestler');
            $table->string('contest');
            $table->foreign('wrestler')->references('name')->on('wrestlers');
            $table->foreign('contest')->references('id')->on('singles_results');
        });    
        //tag matches
        Schema::create('tag_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('result');
            $table->string('winner')->nullable($value = true);
            $table->string('championship')->nullable($value = true);
            $table->boolean('championship_change')->nullable($value = true);
            $table->time('length')->nullable($value = true);
            $table->date('date')->nullable($value = true);
            $table->string('promotion')->nullable($value = true);
            $table->foreign('winner')->references('name')->on('tag_teams');
            $table->foreign('championship')->references('name')->on('championships');
        });  
        //tag team match participants  
        Schema::create('tag_participations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('team');
            $table->string('contest');
            $table->foreign('team')->references('name')->on('tag_teams');
            $table->foreign('contest')->references('id')->on('tag_results');
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
