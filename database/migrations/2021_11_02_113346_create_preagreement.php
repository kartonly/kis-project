<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreagreement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preagreements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('organisationId')->constrained('organisation','id');
            $table->foreignId('clientId')->constrained('clients','id');
            $table->integer('TouristsCount');
            $table->foreignId('employee')->constrained('users','id');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('preagreement');
    }
}
