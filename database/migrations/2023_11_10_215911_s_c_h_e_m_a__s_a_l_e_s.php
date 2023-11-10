<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SCHEMASALES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales.tbinvoices',function(Blueprint $table){
            $table->id();
            $table->foreignId('cliei')->constrained('users.tbclients');
            $table->float('totai',10,2);
            $table->char('statui',1)->default(true);
            $table->timestamps();
        });

        Schema::create('sales.tbinvoices_details',function(Blueprint $table){
            $table->id();
            $table->foreignId('invoi')->constrained('sales.tbinvoices');
            $table->foreignId('prodi')->constrained('products.tbproducts');
            $table->integer('quanti');
            $table->float('pricei',10,2);
            $table->float('totali',10,2);
            $table->char('statui',1)->default(true);
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
            Schema::dropIfExists('sales.tbinvoices_details');
            Schema::dropIfExists('sales.tbinvoices');
    }
}
