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
        Schema::create('users_systems', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cat_system_id');
            $table->tinyInteger('active')->nullable()->default(1);
            $table->tinyInteger('deleted')->nullable()->default(0);
            $table->timestamps();
            $table->timestamp('active_at')->default(null)->nullable();
            $table->timestamp('deleted_at')->default(null)->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('cat_system_id')
                ->references('id')
                ->on('cat_systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_systems');
    }
};
