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

    public function addFood(Request $request) {
        $credentials = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'country' => 'required',
            'category' => 'required',
            'ingredients' => 'required'
        ]);

        $imageName = time().'.'.$credentials['image']->extension();
        $credentials['image']->move(public_path('assets'), $imageName);

        $food = Food::create([
            'name' => $credentials['name'],
            'image' => '/assets/'.$imageName,
            'price' => $credentials['price'],
            'country' => $credentials['country'],
            'category' => $credentials['category'],
            'ingredients' => $credentials['ingredients']
        ]);

        return response()->json([
            'response' => 'Блюдо успешно добавлено',
            'food' => $food
        ]);
    }

    public function updateFood(Request $request) {
        $credentials = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'country' => 'required',
            'category' => 'required',
            'ingredients' => 'required'
        ]);

        $imageName = time().'.'.$credentials['image']->extension();
        $credentials['image']->move(public_path('assets'), $imageName);

        Food::where('id', $request->input('id'))
            ->update([
                'name' => $credentials['name'],
                'image' => '/assets/'.$imageName,
                'price' => $credentials['price'],
                'country' => $credentials['country'],
                'category' => $credentials['category'],
                'ingredients' => $credentials['ingredients']
            ]);

        return response()->json([
            'response' => 'Данные успешно обновлены'
        ]);
    }

    public function deleteFood(string $id) {
        Food::where('id', $id)->delete();
        return response()->json(['response' => 'OK']);
    }
}
