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
        Schema::create('cat_entidades_federativas', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('cve_entidad',5)->nullable();
            $table->string('nombre',100);
            $table->string('abreviacion',10)->nullable()->default(null);
            $table->unsignedBigInteger('cat_regione_id')->nullable()->default(null);
            $table->tinyInteger('deleted')->nullable()->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);
            $table->foreign('cat_regione_id')
                ->references('id')
                ->on('cat_regiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('cat_entidades_federativas');
    }
};
