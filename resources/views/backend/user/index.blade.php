@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-8">
            <h3 class="mt-4">User List</h3>
        </div>
    </div>
    
    <hr>
    
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($users && count($users) > 0)
                @foreach($users as $key => $user)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames() }}</td>
                    <td><a href="{{ route('user.role_form', $user->id) }}" class="btn btn-primary">Set Role</a></td>
                </tr>
                @endforeach
            @else
            <tr>
                <th>No Result Found!!</th>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
