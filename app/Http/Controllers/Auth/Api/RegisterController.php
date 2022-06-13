<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function register( Request $request, User $user ) {

        //TODO: validar request
        $userData = $request->only('name', 'email','password');
        $userData['password'] = bcrypt($userData['password']);

        if ( !$user = $user->create($userData) )
            abort(500, 'Falha ao criar usuário.');

        return response()
            ->json([
                'data' => [
                    'user' => $user
                ]
            ]);
    }
}
