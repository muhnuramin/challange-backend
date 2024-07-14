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
        Schema::create('budayas', function (Blueprint $table) {
            $table->id('cultures_id');
            $table->string('judul');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->boolean('statusPublish')->default(false);
            $table->string('gambar')->nullable();
            $table->string('emailpenulis');
            $table->string('namapenulis');
            $table->string('nohp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budayas');
    }
};
