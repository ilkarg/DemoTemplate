<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request) {
        $credentials = $request->validate([
            'name' => 'required',
        ]);

        Category::create([ 'name' => $credentials['name'] ]);

        return response()->json([
            'response' => 'Категория успешно создана'
        ]);
    }

    public function getCategories() {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function deleteCategory(string $id) {
        Category::where('id', $id)->delete();
        return response()->json(['response' => 'OK']);
    }
}
