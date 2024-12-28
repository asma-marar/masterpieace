@extends('layouts.master')

@section('title', 'User')

@section('content')
<div class="container-fuild px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Edit User</h1>
        </div>
                        <div class="card-body">
                
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ( $errors->all() as $error )
                                    <div>{{ $errors }}</div>
                                @endforeach
                            </div>
                            @endif
                
                            <form action="{{ url('admin/update-user/'.$user->id)}}" method="POST" >
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="">User Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                </div>
                
                                <div class="mb-3">
                                    <label for="">User Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">User phone</label>
                                    <input type="number" name="phone" value="{{ $user->phone }}" class="form-control">
                                </div>
                
                                <div class="mb-3">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                        <option value="intermediary" {{ $user->role == 'intermediary' ? 'selected' : '' }}>Intermediary</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">User City</label>
                                    <input type="text" name="city" value="{{ $user->city }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">User Address</label>
                                    <input type="text" name="address" value="{{ $user->address }}" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
@endsection