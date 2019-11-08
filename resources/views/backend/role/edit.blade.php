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

    @if ($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if (Session::has('successMsg'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('successMsg') }}</p>
    </div>
    @endif

    <form action="{{ route('role.update', $role->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Role Name</label>
            <input type="text" class="form-control" placeholder="Role Name" name="name" value="{{ $role->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
