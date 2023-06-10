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
            $table->id()->autoIncrement();
            $table->string('nombre',120);
            $table->string('password');
            $table->string('email')->unique(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('full_name');
            $table->string('puesto');
            $table->string('area');
            $table->string('last_ip',25);
            $table->timestamp('last_login_attempt');
            $table->tinyInteger('login_attempts');
            $table->string('ban_reason');
            $table->enum('estatus', ['activo','bloqueado','eliminado']);
            $table->timestamps();
            $table->timestamp('logged_at');
            $table->timestamp('bloqued_at');
            $table->timestamp('activated_at');
            $table->timestamp('deleted_at');
            $table->rememberToken();
            
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
