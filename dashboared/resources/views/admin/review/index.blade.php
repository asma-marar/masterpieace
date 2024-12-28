@extends('layouts.master')

@section('title', 'Orders')
@section('name', 'Orders Users')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Contacts </h4>
        </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
        @endif

        <table id="exampleTable" class="table table-boardered">
            <thead>
                <tr>
                    <th>Contact ID</th>
                    <th>User Email</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($contacts as $item )
                    
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->email ?? 'No User'}}</td>
                    <td>{{ $item->message }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td><a href="javascript:void(0)" 
                        class="btn btn-success edit-status-btn" 
                        data-id="{{ $item->id }}" 
                        data-status="{{ $item->status }}">
                        Edit
                     </a>
                     
                    </td>
                    <td>
                        <form action="{{ url('admin/delete-contact/' . $item->id) }}" method="POST" style="display: inline;">
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