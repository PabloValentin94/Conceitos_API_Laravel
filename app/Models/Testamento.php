<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testamento extends Model
{
    protected $table = "testamentos"; // Definindo a tabela do banco de dados a qual este model se refere.

    protected $primaryKey = "id"; // Definindo o campo referente à chave estrangeira da tabela especificada anteriormente.

    protected $fillable = ["nome"]; // Definindo os campos deste model que podem ser preenchidos em massa (Mass Assignment).

    public $timestamps = true; // Definindo se a tabela referente a este model utilizará timestamps de controle de alteração do conteúdo de registros.

    // Método que associa os models de alguns livros ao do seu testamento.

    public function livros()
    {
        return $this->hasMany("App\Models\Livro", "fk_testamento", "id");
    }
}
