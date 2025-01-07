@extends('layouts.master')

@section('title', 'Messages')
@section('name', ' Users Messages')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Messages </h4>
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
                    <th>Message</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($contacts as $item )
                    
                <tr>
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->customer->email ?? 'No User'}}</td>
                    <td>{{ $item->message }}</td>
                    <td>
                        @if ($item->status === 'new')
                            <a href="javascript:void(0)" 
                            class="btn btn-dark mark-seen-btn" 
                            data-id="{{ $item->id }}">
                                New
                            </a>
                        @else
                            <a href="javascript:void(0)" 
                            class="btn btn-secondary disabled">
                                Seen
                            </a>
                        @endif
                    </td>
                    
                    
                    <td>
                        <form action="{{ url('admin/delete-contact/' . $item->id) }}" method="POST" style="display: inline;">
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.mark-seen-btn');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const contactId = this.getAttribute('data-id');

            // Send AJAX request to update the status
            fetch(`/admin/mark-seen/${contactId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.innerText = 'Seen'; // Change button text
                    this.classList.remove('btn-dark'); // Remove dark class
                    this.classList.add('btn-secondary'); // Add purple class
                    // this.classList.add('disabled'); // Disable button
                } else {
                    alert('Failed to update status.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});

</script>
@endsection