<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){

        $categoryId = $request->query('category_id');
        $searchTerm = $request->query('search-product');


        // Fetch products based on the category filter or fetch all if no filter is applied
        $products = Product::with('category')
        ->when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })
        ->when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        })
        ->get();
        $categoriesAll = Category::all();

        return view('front.product', compact('products', 'categoriesAll'));


    }

    public function detail($id)
    {
        // Find the product by its ID or fail if not found
        $detail = Product::with(['category', 'productImages'])->findOrFail($id);
        
        $category = $detail->category;
        $relatedProducts = Product::where('category_id', $category->id) // Filter by category
                            ->where('id', '!=', $id) // Exclude the current product
                            ->get();


        // Pass the product detail to the view
        return view('front.product-detail', compact('detail' , 'relatedProducts'));
    }




}
