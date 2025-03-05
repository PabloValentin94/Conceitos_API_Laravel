<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Versiculo;

// Para usar o API Resoruce é preciso alterar o nome dos parâmetros "$id" pelo nome estabelecido no parâmetro "$name" desse recurso.

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos os registros imediatamente.

        // return Versiculo::all();

        // Permite modificar a consulta antes de executá-la. É útil para carregar relacionamentos do objeto da model.

        return Versiculo::with("livro")->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->all();

        $versiculo_criado = Versiculo::create([

            "indice_capitulo" => $fields["indice_capitulo"],
            "indice_versiculo" => $fields["indice_versiculo"],
            "texto" => $fields["texto"],
            "fk_livro" => $fields["fk_livro"]

        ]);

        if($versiculo_criado)
        {
            return response()->json([

                "message" => "Versículo criado com sucesso.",
                "model" => $versiculo_criado

            ], 201);
        }

        else
        {
            return response()->json(["message" => "Erro ao criar o versículo!"], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $versiculo)
    {
        /*
            Os relacionamentos da model não são carregados automaticamente na instância de um objeto. Para resolver
            isso, use o método "with" da model desejada e passe os relacionamentos necessários como parâmetro.
        */

        $versiculo_encontrado = Versiculo::with("livro")->find($versiculo);

        if(isset($versiculo_encontrado))
        {
            return response()->json([

                "message" => "Versículo encontrado.",
                "model" => $versiculo_encontrado

            ], 200);
        }

        else
        {
            return response()->json(["message" => "Versículo não encontrado."], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $versiculo)
    {
        $register = Versiculo::findOrFail($versiculo);

        if($register->update($request->all()))
        {
            return response()->json([

                "message" => "Versículo atualizado com sucesso.",
                "model" => $register

            ], 200);
        }

        else
        {
            return response()->json(["message" => "Erro ao atualizar o versículo!"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $versiculo)
    {
        if(Versiculo::destroy($versiculo))
        {
            return response()->json(["message" => "Versículo deletado com sucesso."], 200);
        }

        else
        {
            return response()->json(["message" => "Erro ao deletar o versículo!"], 404);
        }
    }
}
