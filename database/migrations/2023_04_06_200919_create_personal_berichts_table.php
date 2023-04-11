<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_berichts', function (Blueprint $table) {
            $table->uuid('cis_row_id')->primary()->unique()->key();
            $table->string('user')->key();
            $table->string('einsatzmittel')->key()->nullable();
            $table->string('bericht')->key();
            $table->string('job')->key()->nullable();
            $table->string('pa_nr')->nullable();
            $table->string('pa_time')->nullable();
            $table->string('pa_work')->nullable();
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
        Schema::dropIfExists('personal_berichts');
    }
};
