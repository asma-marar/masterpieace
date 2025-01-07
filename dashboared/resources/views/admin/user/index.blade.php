@extends('layouts.master')

@section('title', 'Users')
@section('name', 'View Users')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Users 
                {{-- <a href="{{ url ('admin/add-user')}}" class="btn btn-primary btn-sm float-end" > Add Users </a> --}}
             </h4>
        </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
        @endif

        <table id="exampleTable" class="table table-boardered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User phone</th>
                    <th>Address</th>
                    <th>City</th>
                    {{-- <th>Edit</th> --}}
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $item )
                    
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                    {{ $item->address }}
                    </td>
                    <td>{{ $item->city }}</td>
                    {{-- <td><a href="{{ url ('admin/edit-user/' . $item->id)}}" class="btn btn-success">Edit</a></td> --}}
                    <td>
                        <form action="{{ url('admin/delete-user/' . $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                        {{-- <a href="{{ url ('admin/delete-user/' . $item->id)}}" class="btn btn-danger">Delete</a> --}}
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    </div>

</div>
@endsection