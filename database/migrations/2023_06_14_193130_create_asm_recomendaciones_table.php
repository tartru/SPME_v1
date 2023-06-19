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
        Schema::create('asm_recomendaciones', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('clave',50)->nullable();
            $table->string('nombre',1500);
            $table->string('Tipo',100)->nullable();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamp('deleted_at')->nullable()->default(null);
            $table->timestamps();
            $table->foreignId('asm_ficha_id')->constrained();
            $table->index('clave');
            $table->index('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asm_recomendaciones');
    }
};
