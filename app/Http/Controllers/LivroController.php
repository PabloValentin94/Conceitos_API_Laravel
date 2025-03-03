<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

// Para usar o API Resoruce é preciso alterar o nome dos parâmetros "$id" pelo nome estabelecido no parâmetro "$name" desse recurso.

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->all();

        return Livro::create([

            "nome" => $fields["nome"],
            "abreviacao" => $fields["abreviacao"],
            "posicao" => $fields["posicao"],
            "fk_testamento" => $fields["fk_testamento"]

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $livro)
    {
        return Livro::findOrFail($livro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $register = Livro::findOrFail($livro);

        $register->update($request->all());

        return $register;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $livro)
    {
        return Livro::destroy($livro);
    }
}
