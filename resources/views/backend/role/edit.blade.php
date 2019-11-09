@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <h3 class="mt-4">Role Management | Edit Role</h3>
        </div>
        <div class="col-md-4">
            <br>
            <a href="{{ route('role.index') }}" class="btn btn-primary">Role List</a>
        </div>
    </div>

    <form action="{{ route('role.update', $role->id) }}" method="post">
        {{ method_field('patch') }}
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Role Name</label>
            <input type="text" class="form-control" placeholder="Role Name" name="name" value="{{ $role->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
