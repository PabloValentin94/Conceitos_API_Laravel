<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Testamento;

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
    public function show(string $id)
    {
        return Testamento::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->all();

        $register = Testamento::findOrFail($id);

        $register->update([

            "nome" => $fields["nome"]

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Testamento::destroy($id);
    }
}
