<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\
{

    TestamentoController,
    LivroController,
    VersiculoController

};

// Execute o comando "php artisan route:list" no terminal para visualizar as rotas declaradas.

Route::get("/test", function() {

    return "Rota de teste.";

});

// Definindo todos os API Resources de uma vez.

Route::apiResources([

    "testamento" => TestamentoController::class, // Rotas - "Testamento".
    "livro" => LivroController::class, // Rotas - "Livro".
    "versiculo" => VersiculoController::class // Rotas - "Versiculo".

]);

// Módulo - "Testamento".

// Route::apiResource("testamento", TestamentoController::class);

// Route::get("testamento", [TestamentoController::class, "index"]);
// Route::post("testamento", [TestamentoController::class, "store"]);
// Route::get("testamento/{id}", [TestamentoController::class, "show"]);
// Route::put("testamento/{id}", [TestamentoController::class, "update"]);
// Route::delete("testamento/{id}", [TestamentoController::class, "destroy"]);

// Módulo - "Livro".

// Route::apiResource("livro", LivroController::class);

// Route::get("livro", [LivroController::class, "index"]);
// Route::post("livro", [LivroController::class, "store"]);
// Route::get("livro/{id}", [LivroController::class, "show"]);
// Route::put("livro/{id}", [LivroController::class, "update"]);
// Route::delete("livro/{id}", [LivroController::class, "destroy"]);

// Módulo - "Versiculo".

// Route::apiResource("versiculo", VersiculoController::class);

// Route::get("versiculo", [VersiculoController::class, "index"]);
// Route::post("versiculo", [VersiculoController::class, "store"]);
// Route::get("versiculo/{id}", [VersiculoController::class, "show"]);
// Route::put("versiculo/{id}", [VersiculoController::class, "update"]);
// Route::delete("versiculo/{id}", [VersiculoController::class, "destroy"]);
