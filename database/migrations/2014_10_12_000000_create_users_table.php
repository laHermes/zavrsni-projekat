<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('chf', 15,2)->change();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('chf_boolean')->default(false);
            $table->boolean('eur_boolean')->default(false);
            $table->decimal('eur', 15,2);
            $table->boolean('usd_boolean')->default(false);
            $table->decimal('usd', 15,2);
            $table->boolean('gbp_boolean')->default(false);
            $table->decimal('gbp', 15,2);
            $table->string('photo_dir')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
