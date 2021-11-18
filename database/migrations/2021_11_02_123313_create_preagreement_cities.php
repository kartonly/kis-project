<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreagreementCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preagreement_cities', function (Blueprint $table) {
            $table->foreignId('preagreementId')->constrained('preagreement','id');
            $table->foreignId('cityId')->constrained('city','id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preagreement_cities');
    }
}
