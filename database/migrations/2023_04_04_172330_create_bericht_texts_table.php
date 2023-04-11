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
        Schema::create('bericht_texts', function (Blueprint $table) {
            $table->uuid('cis_row_id')->primary()->unique()->key();
            $table->uuid('cis_row_id_bericht')->key();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
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
        Schema::dropIfExists('bericht_texts');
    }
};
