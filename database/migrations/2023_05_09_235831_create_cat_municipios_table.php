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
        Schema::create('cat_municipios', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('nombre');
            $table->string('cve_mun',3)->nullable();
            $table->string('cve_ent_mun',5)->nullable();
            $table->unsignedBigInteger('cat_entidades_federativa_id');
            $table->tinyInteger('deleted')->nullable()->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);
            $table->foreign('cat_entidades_federativa_id')
                ->references('id')
                ->on('cat_entidades_federativas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_municipios');
    }
};
