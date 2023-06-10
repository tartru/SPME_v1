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
        Schema::create('cat_grupos_capturas', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id();
            $table->string('nombre', 50);
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->index('nombre');
            $table->index('active');
            $table->index('deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_grupos_capturas');
    }
};
