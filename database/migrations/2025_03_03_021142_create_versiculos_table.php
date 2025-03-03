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
        Schema::create('versiculos', function (Blueprint $table) {
            $table->id();
            $table->integer("indice_capitulo")->nullable(false);
            $table->integer("indice_versiculo")->nullable(false);
            $table->text("texto")->nullable(false); // Colunas do tipo "text" não podem ser definidas como únicas, no MySQL, devido ao seu comprimento variável.
            $table->foreignId("fk_livro")->nullable(false)->constrained("livros", "id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versiculos');
    }
};
