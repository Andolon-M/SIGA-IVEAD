<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_users', function (Blueprint $table) {
            $table->id();
            $table ->string('dni_user')->unique()->nullable();
            $table ->string('tipo_dni')->nullable();
            $table ->date('birthdate')->nullable();
            $table ->string('gender')->nullable();
            $table ->string('cell')->nullable();
            $table ->string('direccion')->nullable();
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_users');
    }
};
