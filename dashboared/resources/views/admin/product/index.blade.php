@extends('layouts.master')

@section('title', 'Product')
@section('name', 'View Product')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Products <a href="{{ url ('admin/add-product')}}" class="btn btn-primary btn-sm float-end" > Add Product </a> </h4>
        </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
        @endif

        <table class="table-sm table-boardered w-100" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $item )
                    
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('uploads/product/' . $item->image)}}" width="50px" height="50px" alt="image">
                    </td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category ? $item->category->name : 'No Category' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->color }}</td>

                    <td><a href="{{ url ('admin/edit-product/' . $item->id)}}" class="btn btn-success">Edit</a></td>
                    <td>
                        <a href="{{ url ('admin/delete-product/' . $item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    </div>

</div>
@endsection