<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username')->unique();;
            $table->string('name');
            $table->string('email')->unique();;
            $table->bigInteger('phone_no');
            $table->string('password');
            $table->string('confirm_password');
            $table->string('profile_image');
            $table->bigInteger('age');
            $table->string('gender')->default('male');
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
