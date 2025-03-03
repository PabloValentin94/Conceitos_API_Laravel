<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Versiculo extends Model
{
    protected $table = "versiculos"; // Definindo a tabela do banco de dados a qual este model se refere.

    protected $primaryKey = "id"; // Definindo o campo referente à chave estrangeira da tabela especificada anteriormente.

    protected $fillable = ["indice_capitulo", "indice_versiculo", "texto", "fk_livro"]; // Definindo os campos deste model que podem ser preenchidos em massa (Mass Assignment).

    public $timestamps = true; // Definindo se a tabela referente a este model utilizará timestamps de controle de alteração do conteúdo de registros.
}
