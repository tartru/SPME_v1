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
        Schema::create('cat_tipo_capturas', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('nombre', 100);
            $table->string('descripcion', 512)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_tipo_capturas');
    }
};
