<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    function index(Request $request)
{
    // Check if a category filter is provided in the request
    $categoryId = $request->query('category_id');

    // Fetch products based on the category filter or fetch all if no filter is applied
    $products = Product::with('category')
        ->when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })
        ->get();

    // Fetch categories
    $categories = Category::take(2)->get();
    $category2 = Category::skip(2)->take(3)->get();
    $categoriesAll = Category::all();


        return view('front.index' , compact('products', 'categories', 'category2', 'categoriesAll'));
    }
}
