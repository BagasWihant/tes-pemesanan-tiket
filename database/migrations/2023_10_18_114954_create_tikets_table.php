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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('harga');
            $table->integer('kuota');
            $table->char('diskon_type');
            $table->integer('diskon')->nullable();
            $table->integer('harga_jual');
            $table->string('img');
            $table->dateTimeTz('berlaku_mulai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
