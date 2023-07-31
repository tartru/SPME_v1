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
        Schema::create('users', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->string('name', 120);
            $table->string('password')->nullable()->default(null);
            $table->string('email', 100);
            $table->string('type', 20);
            $table->string('full_name')->nullable()->default(null);
            $table->string('puesto')->nullable()->default(null);
            $table->string('area')->nullable()->default(null);
            $table->string('last_ip',25)->nullable()->default(null);
            $table->timestamp('last_login')->nullable()->default(null);
            $table->tinyInteger('login_attempts')->nullable()->default(0);
            $table->string('ban_reason')->nullable()->default(0);
            $table->tinyInteger('bloqued')->nullable()->default(0);
            $table->tinyInteger('active')->nullable()->default(0);
            $table->tinyInteger('deleted')->nullable()->default(0);
            $table->timestamps();
            $table->timestamp('logged_at')->nullable()->default(null);
            $table->timestamp('bloqued_at')->nullable()->default(null);
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
        Schema::dropIfExists('users');
    }
};
