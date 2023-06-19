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
        Schema::create('asm_criterios', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id();
            $table->foreignId('asm_recomendacione_id')->constrained()->onDelete('cascade');
            $table->string('tema_otro')->nullable();
            $table->string('justifica_seleccion',1500);
            $table->string('justifica_prioridad',1500)->nullable();
            $table->tinyInteger('asm')->nullable();
            $table->string('justifica_asm',1500)->nullable();
            $table->foreignId('cat_estatu_id')->constrained();
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);
            $table->index('asm');
            $table->index('cat_estatu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asm_criterios');
    }
};
