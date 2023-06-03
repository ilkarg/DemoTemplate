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

    public function getSliderFoods() {
        $foods = Food::orderByDesc('id')
            ->take(5)
            ->get();
        return response()->json($foods);
    }

    public function getFood(string $id) {
        $food = Food::find($id);
        if ($food == null) {
            return response()->json(['response' => 'Food by current id not found']);
        }
        return view('food', [
            'name' => $food->name,
            'image' => $food->image,
            'price' => $food->price,
            'country' => $food->country,
            'category' => $food->category,
            'ingredients' => $food->ingredients
        ]);
    }
}
