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
        Schema::create('cat_grupables', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id();
            $table->morphs('cat_grupable');
            $table->unsignedBigInteger('cat_grupos_captura_id');
            $table->timestamps();
            $table->foreign('cat_grupos_captura_id')
                ->references('id')
                ->on('cat_grupos_capturas')
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
        Schema::dropIfExists('cat_grupables');
    }
};
