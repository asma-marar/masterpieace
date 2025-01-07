@extends('layouts.master')

@section('title', 'Reviews')
@section('name', 'Users Reviews')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Reviews </h4>
        </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
        @endif

        <table id="exampleTable" class="table table-boardered">
            <thead>
                <tr>
                    <th>Rated User</th>
                    <th>User email</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reviews as $review )
                    
                <tr>
                    <td>{{ $review->ratedCustomer->name}}</td>
                    <td>{{ $review->ratedCustomer->email}}</td>
                    <td>{{ $review->rating}}</td>
                    <td>{{ $review->comment}}</td>
                    <td>
                        <form action="{{ url('admin/delete-review/' . $review->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    </div>

</div>
@endsection