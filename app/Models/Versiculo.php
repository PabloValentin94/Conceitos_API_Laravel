<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Versiculo extends Model
{
    protected $table = "versiculos"; // Definindo a tabela do banco de dados a qual esta model se refere.

    protected $primaryKey = "id"; // Definindo o campo referente à chave estrangeira da tabela especificada anteriormente.

    protected $fillable = ["id", "indice_capitulo", "indice_versiculo", "texto", "fk_livro"]; // Definindo os campos desta model que podem ser preenchidos em massa (Mass Assignment).
}
