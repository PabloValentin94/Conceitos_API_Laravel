<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([

            "name" => "required|string",
            "email" => "required|string|unique:users,email",
            "password" => "required|string|confirmed"
            // Apesar de não ser declarado manualmente, há também o campo "password_confirmation", que é passado no Postman.

        ]);

        $user = User::create([

            "name" => $fields["name"],
            "email" => $fields["email"],
            "password" => bcrypt($fields["password"])

        ]);

        if($user)
        {
            return response()->json([

                "message" => "Usuário cadastrado com sucesso. Faça login para gerar um token.",
                "user" => $user

            ], 201);
        }

        else
        {
            return response()->json(["message" => "Erro ao cadastrar o usuário!"], 404);
        }
    }

    public function login(Request $request)
    {
        $fields = $request->validate([

            "email" => "required|string",
            "password" => "required|string"

        ]);

        $user = User::where("email", $fields["email"])->first();

        if(!$user || !Hash::check($fields["password"], $user->password))
        {
            return response()->json([

                "message" => "Erro ao efetuar o login! Verifique seus dados e se realmente está cadastrado."

            ], 401);
        }

        else
        {
            $token = $user->createToken("login_token");

            return response()->json([

                "message" => "Login efetuado com sucesso.",
                "token" => $token->plainTextToken,
                "user" => $user

            ], 200);
        }
    }

    public function logout($id)
    {
        $user = User::find($id);

        if(isset($user))
        {
            $qnt_tokens_excluidos = $user->tokens()->delete();

            return response()->json([

                "message" => "Tokens de acesso excluídos com sucesso.",
                "number of tokens deleted" => $qnt_tokens_excluidos,
                "user" => $user

            ], 200);
        }

        else
        {
            return response()->json(["message" => "Usuário não encontrado!"], 404);
        }
    }
}
