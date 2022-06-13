<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login( Request $request ) {
        $credentials = $request->only('email', 'password');

        if ( !auth()->attempt($credentials) )
            abort(400, 'Login ou senha incorreto(s)');

        $token = auth()->user()->createToken('logged_token');

        return response()
            ->json([
                'data' => [
                    'token' => $token->plainTextToken,
                    'userId' => auth()->user()['id']
                ]
            ]);
    }

    public function logout( ) {
        auth()->user()->currentAccessToken()->delete();
        return response()
            ->json([], 204);
    }
}
