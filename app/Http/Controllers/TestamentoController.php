<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Testamento;

// Para usar o API Resoruce é preciso alterar o nome dos parâmetros "$id" pelo nome estabelecido no parâmetro "$name" desse recurso.

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos os registros imediatamente.

        // return Testamento::all();

        // Permite modificar a consulta antes de executá-la. É útil para carregar relacionamentos do objeto da model.

        return Testamento::with("livros")->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->all();

        $testamento_criado = Testamento::create([

            "nome" => $fields["nome"]

        ]);

        if($testamento_criado)
        {
            return response()->json([

                "message" => "Testamento criado com sucesso.",
                "model" => $testamento_criado

            ], 201);
        }

        else
        {
            return response()->json(["message" => "Erro ao criar o testamento!"], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $testamento)
    {
        /*
            Os relacionamentos da model não são carregados automaticamente na instância de um objeto. Para resolver
            isso, use o método "with" da model desejada e passe os relacionamentos necessários como parâmetro.
        */

        $testamento_encontrado = Testamento::with("livros")->find($testamento);

        if(isset($testamento_encontrado))
        {
            return response()->json([

                "message" => "Testamento encontrado.",
                "model" => $testamento_encontrado

            ], 200);
        }

        else
        {
            return response()->json(["message" => "Testamento não encontrado!"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $testamento)
    {
        $register = Testamento::findOrFail($testamento);

        if($register->update($request->all()))
        {
            return response()->json([

                "message" => "Testamento atualizado com sucesso.",
                "model" => $register

            ], 200);
        }

        else
        {
            return response()->json(["message" => "Erro ao atualizar o testamento!"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $testamento)
    {
        if(Testamento::destroy($testamento))
        {
            return response()->json(["message" => "Testamento deletado com sucesso."], 200);
        }

        else
        {
            return response()->json(["message" => "Erro ao deletar o testamento!"], 404);
        }
    }
}
