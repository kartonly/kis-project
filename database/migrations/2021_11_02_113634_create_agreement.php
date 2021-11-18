<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('organisation')->constrained('organisation','id');
            $table->foreignId('preagreement')->constrained('preagreement','id');
            $table->foreignId('employee')->constrained('users','id');
            $table->date('start');
            $table->date('end');
            $table->boolean('payment');
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
        Schema::dropIfExists('agreement');
    }
}
