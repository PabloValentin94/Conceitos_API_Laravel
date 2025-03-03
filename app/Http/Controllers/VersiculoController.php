<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Versiculo;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->all();

        return Versiculo::create([

            "indice_capitulo" => $fields["indice_capitulo"],
            "indice_versiculo" => $fields["indice_versiculo"],
            "texto" => $fields["texto"],
            "fk_livro" => $fields["fk_livro"]

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Versiculo::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $register = Versiculo::findOrFail($id);

        $register->update($request->all());

        return $register;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Versiculo::destroy($id);
    }
}
