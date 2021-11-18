<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('second_name')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('role', ['agent', 'manager', 'accountant', 'admin'])->nullable();
            $table->date('birth_date')->nullable();
            $table->foreignId("organisation")->constrained('organisation','id');
            $table->foreignId('photo')->nullable()->constrained('photos', 'id');
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
