<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    function index(Request $request)
    {
        // Check if a category filter is provided in the request
        $categoryId = $request->query('category_id');
        $priceSort = $request->query('price_sort');
        $searchTerm = $request->query('search-product');
    
        // Get most rated customer
        $topRatedCustomer = Customer::withAvg('ratings', 'rating')
        ->withCount('ratings')
        ->has('ratings', '>=', 1)  // Only customers with at least one rating
        ->orderByDesc('ratings_avg_rating')
        ->orderByDesc('ratings_count')
        ->with(['products' => function($query) {
            $query->where('quantity', '>', 0)
                ->latest()
                ->take(4);
        }])
        ->first();

        // Fetch products based on the category filter, sorting, and search term
        $products = Product::with('category')
            ->where('quantity', '>', 0) // Add this condition to filter out sold out products
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($priceSort, function ($query) use ($priceSort) {
                if ($priceSort === 'low_to_high') {
                    $query->orderBy('price', 'asc');
                } elseif ($priceSort === 'high_to_low') {
                    $query->orderBy('price', 'desc');
                }
            })
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            })
            ->orderBy('created_at', 'desc')   
            ->paginate(8);
    
        // Fetch categories
        $categories = Category::take(2)->get();
        $category2 = Category::skip(2)->take(3)->get();
        $categoriesAll = Category::all();
    
        return view('front.index', compact('products', 'categories', 'category2', 'categoriesAll','topRatedCustomer'));
    }
    

    public function showProfile($id)
    {
        // Get customer data by ID
        $customer = Customer::with('ratings')->findOrFail($id); // Eager load ratings
    
        // Fetch the products of the customer
        $products = $customer->products()
        ->where('quantity', '>', 0) // Add this condition to filter out sold out products
        ->paginate(8);
    
        // Pass the data to the view
        return view('front.user-page', compact('customer', 'products'));
    }

    public function about(){
        return view('front.about-us');
    }
    

}
