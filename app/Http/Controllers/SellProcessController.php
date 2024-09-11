<?php

namespace App\Http\Controllers;

use App\Interface\HasRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\SellProcess\CreateSellProcessRequest;
use App\Models\SellProcess;
use App\Models\Student;

class SellProcessController extends Controller implements HasRoutes
{
    public static function getRoutes(): void
    {
        Route::post('new-sell-process', [static::class, 'create']);
    }

    public function create(CreateSellProcessRequest $request)
    {
        $data = $request->validated();
        if ($data['price'] == 0)
            return response()->json(['message' => "the transaction can't be accomplished, price can't be 0"], 404);

        $student = Student::find($data['student_id']);
        $student_available_points = $student->current_points + $student->added_points;
        if ($student_available_points < $data['price'])
            return response()->json(['message' => "The buyer's balance isn't enough to complete this transaction."], 403);

        $sell_process = SellProcess::create($data);
        $student->current_points = $student->current_points - $data['price'];
        $student->save();

        return response()->json($sell_process);
    }
}
