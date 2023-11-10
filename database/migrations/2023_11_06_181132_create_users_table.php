<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('user', 30);
            $table->char('name', 50);
            $table->char('lastname', 50);
            $table->char('email', 50);
            $table->char('password', 255);
            $table->char('role', 1);
            $table->char('status', 1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
