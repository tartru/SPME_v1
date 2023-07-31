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
        Schema::create('cat_entidables', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id();
            $table->morphs('cat_entidable');
            $table->unsignedBigInteger('cat_entidades_federativa_id');
            $table->timestamps();
            $table->foreign('cat_entidades_federativa_id')
                ->references('id')
                ->on('cat_entidades_federativas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_entidables');
    }
};
