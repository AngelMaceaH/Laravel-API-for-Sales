<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SCHEMAUSERS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users.tbroles',function(Blueprint $table){
            $table->id();
            $table->char('rolen', 30);
            $table->timestamps();
        });
        Schema::create('users.tbusers', function (Blueprint $table) {
            $table->id();
            $table->char('usern', 30);
            $table->char('namen', 50);
            $table->char('lastn', 50);
            $table->char('email', 50);
            $table->char('passn', 255);
            $table->char('saltn', 255);
            $table->foreignId('rolen')->constrained('users.tbroles');
            $table->char('statun', 1);
            $table->timestamps();
        });
        Schema::create('users.tbclients', function (Blueprint $table) {
            $table->id();
            $table->char('userc', 30);
            $table->char('namec', 50);
            $table->char('lastc', 50);
            $table->char('email', 50);
            $table->char('phone', 50);
            $table->char('address',255);
            $table->char('passc', 255);
            $table->char('saltc', 255);
            $table->char('statuc', 1);
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
        Schema::dropIfExists('users.tbroles');
        Schema::dropIfExists('users.tbusers');
        Schema::dropIfExists('users.tbclients');
    }
}
