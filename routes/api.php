<?php

// Execute o comando "php artisan route:list" no terminal para visualizar as rotas declaradas.

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\
{

    AuthController,
    TestamentoController,
    LivroController,
    VersiculoController

};

Route::post("user/register", [AuthController::class, "register"]);
Route::post("user/login", [AuthController::class, "login"]);
Route::get("user/logout/{id}", [AuthController::class, "logout"]);

// Impedindo que as rotas sejam executadas sem o uso de tokens de acesso do Sanctum.

Route::middleware("auth:sanctum")->group(function() {

    // Definindo todos os API Resources de uma vez.

    Route::apiResources([

        "testamento" => TestamentoController::class, // Rotas - "Testamento".
        "livro" => LivroController::class, // Rotas - "Livro".
        "versiculo" => VersiculoController::class // Rotas - "Versiculo".

    ]);

});

// Módulo - "Testamento".

// Route::apiResource("testamento", TestamentoController::class);

// Módulo - "Livro".

// Route::apiResource("livro", LivroController::class);

// Módulo - "Versiculo".

// Route::apiResource("versiculo", VersiculoController::class);
