<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->boolean('gender')->nullable();
            $table->enum('status', ['student', 'faculty'])->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->inDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
