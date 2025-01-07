@extends('layouts.master')

@section('title', 'category')

@section('content')
<div class="container-fuild px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Edit Category</h1>
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $errors }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Category Description</label>
                    <input type="text" name="description" value="{{ $category->description }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Category Image</label>
                    <input type="file" name="image" class="form-control">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary mt-4">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection