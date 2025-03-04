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

        $livro_criado = Livro::create([

            "nome" => $fields["nome"],
            "abreviacao" => $fields["abreviacao"],
            "posicao" => $fields["posicao"],
            "fk_testamento" => $fields["fk_testamento"]

        ]);

        if($livro_criado)
        {
            return response()->json([

                "message" => "Livro criado com sucesso.",
                "model" => $livro_criado

            ], 201);
        }

        else
        {
            return response()->json(["message" => "Erro ao criar o livro!"], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $livro)
    {
        $livro_encontrado = Livro::find($livro);

        if(isset($livro_encontrado))
        {
            return response()->json([

                "message" => "Livro encontrado.",
                "model" => $livro_encontrado

            ], 200);
        }

        else
        {
            return response()->json(["message" => "Livro não encontrado!"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $register = Livro::findOrFail($livro);

        if($register->update($request->all()))
        {
            return response()->json([

                "message" => "Livro atualizado com sucesso.",
                "model" => $register

            ], 200);
        }

        else
        {
            return response()->json(["message" => "Erro ao atualizar o livro!"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $livro)
    {
        if(Livro::destroy($livro))
        {
            return response()->json(["message" => "Livro deletado com sucesso."], 200);
        }

        else
        {
            return response()->json(["message" => "Erro ao deletar o livro!"], 404);
        }
    }
}
