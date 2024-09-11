<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Interface\HasRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller implements HasRoutes
{
    public static function getRoutes(): void
    {
        Route::get('all-categories', [static::class, 'index']);
        Route::get('categories-of-sellpoint', [static::class, 'categories_of_sellpoint']);
    }

    public function index()
    {
        return response()->json(Category::with('sell_point')->get());
    }

    public function categories_of_sellpoint(Request $request)
    {
        $sell_point_id = $request->input('sell_point_id', null);
        if ($sell_point_id) {
            $categories = Category::where('sell_point_id', $sell_point_id)->with('sell_point')->get();
            if ($categories->count() == 0)
                return response()->json(['message' => 'Invalid sell point ID'], 404);
            return response()->json($categories);
        }
        return response()->json(['message' => 'Invalid sell point ID'], 404);
    }
}
