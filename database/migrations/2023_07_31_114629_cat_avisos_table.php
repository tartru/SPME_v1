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
        Schema::create('cat_avisos', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('from_id')->nullable();
            $table->foreignId('cat_system_id')->nullable()->constrained('cat_systems')->onDelete('set null');
            $table->string('title',150)->nullable();
            $table->string('body',1500)->nullable();
            $table->string('options',50)->nullable();
            $table->foreignId('cat_statu_id')->nullable()->constrained('cat_estatus')->onDelete('set null');
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);
            $table->foreign('from_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_avisos');
    }
};
