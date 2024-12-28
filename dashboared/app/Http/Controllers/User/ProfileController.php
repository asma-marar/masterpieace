<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class ProfileController extends Controller
{


    public function index()
    {
        // Get the authenticated customer
        $customer = Auth::guard('customer')->user();

        // Pass the customer data to the view
        return view('front.profile', compact('customer'));
    }


    public function edit()
    {
    $customer = auth('customer')->user();

    return view('front.edit-profile', compact('customer'));
    }


    public function update(Request $request)
    {
        $customer = Customer::find(auth()->id());
    
        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found');
        }
    
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $customer->id,
            'phone_number' => 'nullable|string|max:20', // Match the form field name
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($customer->profile_image && file_exists(public_path('uploads/profile/' . $customer->profile_image))) {
                    unlink(public_path('uploads/profile/' . $customer->profile_image));
                }
    
                $file = $request->file('profile_image');
                $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                
                // Ensure directory exists
                $uploadPath = public_path('uploads/profile');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
    
                // Move the file
                $file->move($uploadPath, $fileName);
                $customer->profile_image = $fileName;
            }
    
            // Update other fields
            $customer->name = $validated['name'];
            $customer->email = $validated['email'];
            $customer->phone = $validated['phone_number'] ?? null; // Match the form field name
            $customer->address = $validated['address'] ?? null;
            $customer->city = $validated['city'] ?? null;
    
            $customer->save();
    
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update profile: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function add()
    {
        $categories = Category::all(); // Fetch all categories
        return view('front.add-product' , compact('categories'));
    }

    public function store(Request $request)
    {
        // Get the authenticated customer
        $customer = Auth::guard('customer')->user();
    
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'color' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
        ]);
    
        // Create a new Product instance
        $product = new Product();
        $product->customer_id = $customer->id; // Assign the logged-in customer's ID
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category_id'];
        $product->quantity = $validatedData['quantity'];
        $product->color = $validatedData['color'];
        $product->size = $validatedData['size'];
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product'), $imageName);
            $product->image = 'uploads/product/' . $imageName;
        }
    
        // Save the product to the database
        $product->save();
    
        // Redirect with a success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    
    

// public function order()
// {

//     return view('front.order-history');
// }

}