<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * @package Migrations
     * @author Shaarif <shaarifsabah5299@gmail.com>
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('user_status')->comment('1 means admin,2 means user,3 means users client')->nullable();
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->unique();
            $table->string('customer_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
