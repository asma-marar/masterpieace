@extends('layouts.master')

@section('title', 'Product')
@section('name', 'Add Product')

@section('content')
<div class="container-fuild px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Product</h1>
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $errors }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Description</label>
                    <input type="text" name="description" value="{{ $product->description }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Image</label>
                    <input type="file" name="image" value="{{ $product->image }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Price</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="defaultSelect">Select Category</label>
<select class="form-select form-control" name="category_id" id="defaultSelect" required>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

                </div>

                <div class="mb-3">
                    <label for="">Product Quantity</label>
                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product Size</label>
                    <input type="text" name="size" value="{{ $product->size }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Product color</label>
                    <input type="text" name="color" value="{{ $product->color }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary ">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection