<?php

namespace App\Http\Controllers;

use App\Models\SellPoint;
use App\Interface\HasRoutes;
use Illuminate\Support\Facades\Route;

class SellPointController extends Controller implements HasRoutes
{
    public static function getRoutes(): void
    {
        Route::get('all-sellpoints', [static::class, 'index']);
    }

    public function index()
    {
        return response()->json(SellPoint::get());
    }
}
