@extends('layouts.master')

@section('title', 'Category')
@section('name', 'View Category')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Category <a href="{{ url ('admin/add-category')}}" class="btn btn-primary btn-sm float-end" > Add Category </a> </h4>
        </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
        @endif

        <table id="exampleTable" class="table table-boardered">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($category as $item )
                    
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('uploads/category/' . $item->image)}}" width="50px" height="50px" alt="image">
                    </td>
                    <td><a href="{{ url ('admin/edit-category/' . $item->id)}}" class="btn btn-success">Edit</a></td>
                    <td>
                        <a href="{{ url ('admin/delete-category/' . $item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    </div>

</div>
@endsection