<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Interface\HasRoutes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Teacher\LoginRequest;

class TeacherController extends Controller implements HasRoutes
{
    public static function getRoutes(): void
    {
        Route::post('teacher-login', [static::class, 'teacher_login']);
    }

    public function teacher_login(LoginRequest $request)
    {
        $data = $request->validated();
        $teacher = Teacher::where('email', $data['email'])->first();

        if ($teacher) {
            if (Hash::check($data['password'], $teacher->password)) {
                return response()->json($teacher);
            } else {
                return response()->json(['message' => 'Invalid Credintials'], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid Credintials'], 404);
        }
    }
}
