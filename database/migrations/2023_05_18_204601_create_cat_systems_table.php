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
        Schema::create('cat_systems', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('siglas',120);
            $table->string('nombre')->nullable()->default(null);
            $table->string('descripcion',1024)->nullable()->default(null);
            $table->tinyInteger('active')->nullable()->default(1);
            $table->tinyInteger('deleted')->nullable()->default(0);
            $table->timestamps();
            $table->timestamp('active_at')->default(null)->nullable();
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
        Schema::dropIfExists('cat_systems');
    }
};
