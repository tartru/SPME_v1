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
        Schema::create('cat_roles_tareas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre',120);
            $table->string('descripcion');
            $table->enum('status', ['activo','bloqueado','eliminado']);
            $table->timestamps();
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_roles_tareas');
    }
};
