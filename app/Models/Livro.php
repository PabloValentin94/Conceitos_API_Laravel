<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = "livros"; // Definindo a tabela do banco de dados a qual este model se refere.

    protected $primaryKey = "id"; // Definindo o campo referente à chave estrangeira da tabela especificada anteriormente.

    protected $fillable = ["nome", "abreviacao", "posicao", "fk_testamento"]; // Definindo os campos deste model que podem ser preenchidos em massa (Mass Assignment).

    public $timestamps = true; // Definindo se a tabela referente a este model utilizará timestamps de controle de alteração do conteúdo de registros.

    // Método que associa o model de um livro ao do seu testamento.

    public function testamento()
    {
        return $this->belongsTo("App\Models\Testamento", "fk_testamento", "id");
    }

    // Método que associa os models de alguns versículos ao do seu livro.

    public function versiculos()
    {
        return $this->hasMany("App\Models\Versiculo", "fk_livro", "id");
    }
}
