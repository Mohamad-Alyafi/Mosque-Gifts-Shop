<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use App\Interface\HasRoutes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserController extends Controller implements HasRoutes
{
    public static function getRoutes(): void
    {
        Route::get('test', [static::class, 'test']);

        Route::post('user-login', [static::class, 'user_login']);
    }

    public function user_login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            if (Hash::check($data['password'], $user->password)) {
                return response()->json(['message' => 'Login successful']);
            } else {
                return response()->json(['message' => 'Invalid Credintials'], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid Credintials'], 404);
        }
    }

    public function test()
    {
        return response()->json(['message' => 'The connection is successful!'], 200);
    }
}
