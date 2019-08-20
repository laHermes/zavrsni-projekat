<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExchangeTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->decimal('CHFtoEUR', 15, 2)->nullable();
            $table->decimal('CHFtoGBP', 15, 2)->nullable();
            $table->decimal('CHFtoUSD', 15, 2)->nullable();
          
            $table->decimal('EURtoCHF', 15, 2)->nullable();
            $table->decimal('EURtoUSD', 15, 2)->nullable();
            $table->decimal('EURtoGBP', 15, 2)->nullable();

            $table->decimal('USDtoCHF', 15, 2)->nullable();
            $table->decimal('USDtoEUR', 15, 2)->nullable();
            $table->decimal('USDtoGBP', 15, 2)->nullable();

            $table->decimal('GBPtoCHF', 15, 2)->nullable();
            $table->decimal('GBPtoEUR', 15, 2)->nullable();
            $table->decimal('GBPtoUSD', 15, 2)->nullable();

            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
