<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class LandingPageController extends Controller
{

    function index(Request $request)
    {
        $categoriesAll = Category::all();
        $categoryId = $request->input('category_id'); // Retrieve the category_id from the URL
        
        // Fetch products based on the category_id or all if no category is selected
        $products = Product::when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->get();

        return view('front.products', [
            'categoriesAll' => $categoriesAll,
            'products' => $products,
            'categoryId' => $categoryId, // Pass the selected category ID to the view
        ]);
    }


function showProduct(Request $request)
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

    // Return the view with the filtered products and categories
    return view('front.product', compact('products', 'categories', 'category2', 'categoriesAll'));
}





}
