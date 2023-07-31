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
            $table->foreignId('asm_recomendacione_id')->constrained('asm_recomendaciones')->onDelete('cascade');
            $table->foreignId('cat_grupos_captura_id')->nullable()->constrained('cat_grupos_capturas')->onDelete('set null');
            $table->string('justifica_seleccion',1500)->nullable();
            $table->foreignId('asm_cat_clasificacione_id')->nullable()->constrained('asm_cat_clasificaciones')->onDelete('set null');
            $table->foreignId('asm_cat_prioridade_id')->nullable()->constrained('asm_cat_prioridades')->onDelete('set null');
            $table->string('justifica_prioridad',1500)->nullable();
            $table->tinyInteger('asm')->nullable();
            $table->string('justifica_asm',1500)->nullable();
            $table->foreignId('asm_cat_accione_id')->nullable()->constrained('asm_cat_acciones')->onDelete('set null');
            $table->foreignId('cat_estatu_id')->nullable()->constrained('cat_estatus')->default(1);
            $table->string('tema_otro',100)->nullable();
            $table->boolean('final')->default(false);
            $table->tinyInteger('deleted')->default(0);
            $table->index('asm_recomendacione_id');
            $table->index('asm');
            $table->index('cat_estatu_id');
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
        Schema::dropIfExists('asm_criterios');
    }
};
