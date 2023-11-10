<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SCHEMAPRODUCTS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products.tbbrands',function(Blueprint $table){
            $table->id();
            $table->char('nameb',50);
            $table->char('imagb',200);
            $table->char('statub')->default(true);
            $table->timestamps();
        });
        Schema::create('products.tbcategories',function(Blueprint $table){
            $table->id();
            $table->char('namec',50);
            $table->char('statuc')->default(true);
            $table->timestamps();
        });
        Schema::create('products.tbproducts',function(Blueprint $table){
            $table->id();
            $table->char('namep',100);
            $table->float('pricp',255);
            $table->integer('stocp');
            $table->foreignId('brandp')->constrained('products.tbbrands');
            $table->foreignId('catgop')->constrained('products.tbcategories');
            $table->char('statup')->default(true);
            $table->timestamps();
        });
        Schema::create('products.tbproducts_images',function(Blueprint $table){
            $table->id();
            $table->foreignId('prodp')->constrained('products.tbproducts');
            $table->char('imagp',200);
            $table->char('statup')->default(true);
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
        Schema::dropIfExists('products.tbbrands');
        Schema::dropIfExists('products.tbcategories');
        Schema::dropIfExists('products.tbproducts');
        Schema::dropIfExists('products.tbproducts_images');
    }
}
