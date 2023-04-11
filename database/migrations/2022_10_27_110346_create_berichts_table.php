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
        Schema::create('berichts', function (Blueprint $table) {
            $table->uuid('cis_row_id')->primary()->unique()->key();
            $table->boolean('is_closed')->default(0);
            $table->string('created_by')->key();
            $table->string('closed_by')->nullable();
            $table->dateTime('closed_at')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('berichts');
    }
};
