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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_kategori");
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('deskripsi');
            $table->string('gambar')->nullable();
            $table->integer('targetdana');
            $table->integer('danaskrg')->default(0);
            $table->integer('status')->default(1);
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
