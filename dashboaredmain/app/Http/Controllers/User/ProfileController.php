<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;



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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048', 
            'additional_images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
        ], [
            // Enhanced error messages
            'image.required' => 'Please upload a primary product image',
            'image.mimes' => 'Primary image must be a JPEG, PNG or JPG file',
            'image.max' => 'Primary image must not exceed 2MB',
            'additional_images.*.required' => 'Please upload additional product images',
            'additional_images.*.mimes' => 'Additional images must be JPEG, PNG, JPG files',
            'additional_images.*.max' => 'Additional images must not exceed 2MB each',
            'name.required' => 'Product name is required',
            'name.max' => 'Product name cannot exceed 255 characters',
            'description.required' => 'Product description is required',
            'price.required' => 'Product price is required',
            'price.numeric' => 'Price must be a valid number',
            'price.min' => 'Price cannot be negative',
            'category_id.required' => 'Please select a category',
            'category_id.exists' => 'Selected category is invalid',
            'quantity.required' => 'Stock quantity is required',
            'quantity.integer' => 'Quantity must be a whole number',
            'quantity.min' => 'Quantity cannot be negative',
            'color.required' => 'Please select a color',
            'size.required' => 'Please select a size'
        ]);
    
        try {
            // Get the authenticated customer
            $customer = Auth::guard('customer')->user();
        
            // Create a new Product instance
            $product = new Product();
            $product->customer_id = $customer->id;
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
            
            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $image) {
                    // Generate a unique name for the image
                    $imageName = time() . '_' . $image->getClientOriginalName();
            
                    // Move the image to the desired location
                    $image->move(public_path('uploads/product'), $imageName);
            
                    // Construct the image path
                    $imagePath = 'uploads/product/' . $imageName;
            
                    // Save to the product_images table
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                        'is_primary' => false
                    ]);
                }
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Product added successfully!'
            ], 200);
    
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add product. Please try again.'
            ], 500);
        }
    }



    public function products()
    {
        $products = Product::where('customer_id', Auth::guard('customer')->id())
                        ->where('quantity', '>', 0) // Add this condition to filter out sold out products
                        ->orderBy('created_at', 'desc')
                        ->paginate(6);
        
        $categories = Category::all(); // For the edit form
        
        return view('front.profile-products', compact('products', 'categories'));
    }

public function editProduct(Product $product)
{
    // Check if product belongs to logged-in customer
    if ($product->customer_id !== Auth::guard('customer')->id()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    // Get additional images if they exist
    $additionalImages = $product->productImages ?? [];

    return response()->json([
        'success' => true,
        'product' => $product,
        'additionalImages' => $additionalImages,
        'categories' => Category::all()
    ]);
}

public function updateProduct(Request $request, Product $product)
{
    // Check if product belongs to logged-in customer
    if ($product->customer_id !== Auth::guard('customer')->id()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    // Validate request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'size' => 'required|string',
        'color' => 'required|string',
        'quantity' => 'required|integer|min:0',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Handle primary image
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products'), $imageName);
        $validated['image'] = 'uploads/products/' . $imageName;
    }

    // Handle additional images
    if ($request->hasFile('additional_images')) {
        // Delete old additional images
        foreach ($product->productImages as $oldImage) {
            if (file_exists(public_path($oldImage->image_path))) {
                unlink(public_path($oldImage->image_path));
            }
            $oldImage->delete();
        }

        // Save new additional images
        foreach ($request->file('additional_images') as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);
            
            $product->productImages()->create([
                'image_path' => 'uploads/products/' . $imageName
            ]);
        }
    }

    $product->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Product updated successfully'
    ]);
}

}