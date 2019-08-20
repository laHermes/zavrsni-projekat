<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherCurrenciesToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->boolean('eur_boolean')->default(false);
          $table->decimal('eur', 15,2);
          $table->boolean('usd_boolean')->default(false);
          $table->decimal('usd', 15,2);
          $table->boolean('gbp_boolean')->default(false);
          $table->decimal('gbp', 15,2);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
