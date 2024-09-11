<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Interface\HasRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Studnt\showResource;
use App\Http\Requests\Student\StudentByBarcodeRequest;

class StudentController extends Controller implements HasRoutes
{
    public static function getRoutes(): void
    {
        Route::post('student-by-barcode', [static::class, 'show']);
    }

    public function show(StudentByBarcodeRequest $request)
    {
        $barcode = $request->barcode;
        $student = Student::where('barcode', $barcode)->first();

        if ($student)
            return response()->json((new showResource($student))->toArray($request));
        return response()->json(['message' => 'Invalid student barcode'], 404);
    }
}
