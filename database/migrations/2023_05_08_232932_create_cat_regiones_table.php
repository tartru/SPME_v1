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
        Schema::create('cat_regiones', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('nombre',120);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->default(null)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_regiones');
    }
};
