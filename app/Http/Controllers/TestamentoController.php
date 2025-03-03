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
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->all();

        return Testamento::create([

            "nome" => $fields["nome"]

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $testamento)
    {
        return Testamento::findOrFail($testamento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $testamento)
    {
        $register = Testamento::findOrFail($testamento);

        $register->update($request->all());

        return $register;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $testamento)
    {
        return Testamento::destroy($testamento);
    }
}
