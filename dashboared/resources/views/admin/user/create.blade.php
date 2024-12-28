@extends('layouts.master')

@section('title', 'User')
@section('name', 'Add User')

@section('content')
<div class="container-fuild px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add User</h1>
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ( $errors->all() as $error )
                    <div>{{ $errors }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/add-user')}}" method="POST" >
                @csrf
                <div class="mb-3">
                    <label for="">User Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">User Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">User phone</label>
                    <input type="number" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">User Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Role</label>
                    <input type="text" name="role" class="form-control">
                    
                    
                </div>

                <div class="mb-3">
                    <label for="">User City</label>
                    <input type="text" name="city" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">User Address</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection