<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('title');      
            $table->string('fname');      
            $table->string('lname')->nullable();   
            $table->string('email'); 
            $table->unsignedBigInteger('country');   
            $table->unsignedBigInteger('state');  
            $table->unsignedBigInteger('city');    
            $table->string('phone');   
            $table->unsignedBigInteger('troom');   
            $table->unsignedBigInteger('bed'); 
            $table->unsignedBigInteger('nroom'); 
            $table->string('meal'); 
            $table->date('cin'); 
            $table->date('cout'); 
            $table->integer('status')->default('1');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
