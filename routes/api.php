<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\
{

    TestamentoController

};

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});*/

Route::get("/test", function() {

    return "Rota de teste.";

});

Route::get("testamento", [TestamentoController::class, "index"]);
Route::get("testamento/{id}", [TestamentoController::class, "show"]);
Route::post("testamento", [TestamentoController::class, "store"]);
Route::put("testamento/{id}", [TestamentoController::class, "update"]);
Route::delete("testamento/{id}", [TestamentoController::class, "destroy"]);
