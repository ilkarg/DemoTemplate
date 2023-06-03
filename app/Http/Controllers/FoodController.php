<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function getFoods() {
        $foods = Food::all();
        return response()->json($foods);
    }
}
