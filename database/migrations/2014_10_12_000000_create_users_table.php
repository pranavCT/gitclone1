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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('age', 10)->nullable()->default(null);
            $table->string('gender', 15)->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('password');
            $table->string('phone_number', 20)->nullable()->default(null);
            $table->string('qualification')->nullable()->default(null);
            $table->string('city', 50)->nullable()->default(null);
            $table->string('state', 50)->nullable()->default(null);
            $table->string('country', 50)->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->tinyInteger('user_type')->default('2');
            $table->tinyInteger('is_logged_in')->default('1');
            $table->dateTime('last_login')->nullable()->default(null);
            $table->tinyInteger('status')->default('1');
            $table->softDeletes();
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
