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
        Schema::create('cat_origenes_presupuestales', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('position');
            $table->string('nota', 1024)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('activated_at')->nullable()->default(null);
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
        Schema::dropIfExists('cat_origenes_presupuestales');
    }
};
