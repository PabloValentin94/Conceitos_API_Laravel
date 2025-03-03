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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 80)->unique()->nullable(false);
            $table->string("abreviacao", 5)->unique()->nullable(false);
            $table->integer("posicao")->unique()->nullable(false);
            $table->foreignId("fk_testamento")->nullable(false)->constrained("testamentos", "id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
