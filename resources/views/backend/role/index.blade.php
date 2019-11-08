@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-8">
            <h3 class="mt-4">Role Management</h3>
        </div>
        <div class="col-md-4">
            <br>
            <a href="{{ route('role.create') }}" class="btn btn-primary">Create Role</a>
        </div>
    </div>
    
    <hr>

    @if (Session::has('successMsg'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('successMsg') }}</p>
    </div>
    @endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Permission</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($roles && count($roles) > 0)
                @foreach($roles as $key => $role)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $role->name }}</td>
                    <td>None</td>
                    <td><a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary">Edit</a></td>
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
