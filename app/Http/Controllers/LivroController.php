<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

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
    public function show(string $id)
    {
        return Livro::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->all();

        $register = Livro::findOrFail($id);

        $register->update($request->all());

        return $register;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Livro::destroy($id);
    }
}
