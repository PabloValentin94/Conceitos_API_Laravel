<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = "livros"; // Definindo a tabela do banco de dados a qual esta model se refere.

    protected $primaryKey = "id"; // Definindo o campo referente à chave estrangeira da tabela especificada anteriormente.

    protected $fillable = ["id", "nome", "abreviacao", "posicao", "fk_testamento"]; // Definindo os campos desta model que podem ser preenchidos em massa (Mass Assignment).
}
