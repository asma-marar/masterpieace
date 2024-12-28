<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index()
    {
        $category= Category::all();
        return view ('admin.category.index' , compact('category'));
    }

    public function create()
    {
        return view ('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move('uploads/category/' , $filename);
            $category-> image =$filename;

        }

        $category->save();
        return redirect('admin/category')->with('message', 'Category Added successfully');
    }

    public function edit($category_id)
    {
        $category= Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $category =Category::find($category_id);
        $category->name = $data['name'];
        $category->description = $data['description'];

        if($request->hasfile('image')){
            $destination= 'uploads/category/' . $category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move('uploads/category/' , $filename);
            $category-> image =$filename;

        }

        $category->save();
        return redirect('admin/category')->with('message', 'Category updated successfully');
    }

    public function delete($category_id)
    {
        $category =Category::find($category_id);
        if($category)
        {
            $destination= 'uploads/category/' . $category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $category->delete();
            return redirect('admin/category')->with('message', 'Category deleted successfully');
        }
        else
        {
            return redirect('admin/category')->with('message', 'No Category Id Found');
        }

    }
}
