<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asm_fichas', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion',1500);
            $table->date('fecha_inicial')->default(now());
            $table->date('fecha_final')->nullable();
            $table->text('comentario_general')->nullable();
            $table->text('comentario_especifico')->nullable();
            $table->foreignId('cat_programas_presupuestale_id')->constrained();
            $table->foreignId('cat_dependencia_id')->constrained();
            $table->foreignId('cat_estatu_id')->constrained()->default(1);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asm_fichas');
    }
};
