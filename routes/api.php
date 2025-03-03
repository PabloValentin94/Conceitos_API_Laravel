<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\
{

    TestamentoController,
    LivroController,
    VersiculoController

};

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});*/

Route::get("/test", function() {

    return "Rota de teste.";

});

// Módulo - "Testamento".

Route::get("testamento", [TestamentoController::class, "index"]);
Route::post("testamento", [TestamentoController::class, "store"]);
Route::get("testamento/{id}", [TestamentoController::class, "show"]);
Route::put("testamento/{id}", [TestamentoController::class, "update"]);
Route::delete("testamento/{id}", [TestamentoController::class, "destroy"]);

// Módulo - "Livro".

Route::get("livro", [LivroController::class, "index"]);
Route::post("livro", [LivroController::class, "store"]);
Route::get("livro/{id}", [LivroController::class, "show"]);
Route::put("livro/{id}", [LivroController::class, "update"]);
Route::delete("livro/{id}", [LivroController::class, "destroy"]);

// Módulo - "Versiculo".

Route::get("versiculo", [VersiculoController::class, "index"]);
Route::post("versiculo", [VersiculoController::class, "store"]);
Route::get("versiculo/{id}", [VersiculoController::class, "show"]);
Route::put("versiculo/{id}", [VersiculoController::class, "update"]);
Route::delete("versiculo/{id}", [VersiculoController::class, "destroy"]);
