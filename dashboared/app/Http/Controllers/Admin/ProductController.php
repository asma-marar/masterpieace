<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Order;
use Illuminate\Support\Facades\File;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $orders= Order::all();
        return view ('admin.product.index' , compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view ('admin.product.create',  compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        $data = $request->validated();

        $product = new Product();
        $product->name = $data['name'];
        $product->description = $data['description'];

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move('uploads/product/' , $filename);
            $product-> image =$filename;

        }
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        $product->quantity = $data['quantity'];
        $product->size = $data['size'];
        $product->color = $data['color'];

        $product->save();
        return redirect('admin/product')->with('message', 'Product Added successfully');
    }

    public function edit($product_id)
    {
        $product= Product::find($product_id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(ProductFormRequest $request, $product_id)
    {
        $data = $request->validated();

        $product =Product::find($product_id);
        $product->name = $data['name'];
        $product->description = $data['description'];

        if($request->hasfile('image')){
            $destination= 'uploads/product/' . $product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move('uploads/product/' , $filename);
            $product-> image =$filename;

        }
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        $product->quantity = $data['quantity'];
        $product->size = $data['size'];
        $product->color = $data['color'];
        $product->save();

        return redirect('admin/product')->with('message', 'Product updated successfully');
    }

    public function delete($product_id)
    {
        $product =Product::find($product_id);
        if($product)
        {
            $destination= 'uploads/product/' . $product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $product->delete();
            return redirect('admin/product')->with('message', 'Product deleted successfully');
        }
        else
        {
            return redirect('admin/product')->with('message', 'No Product Id Found');
        }

    }

}
