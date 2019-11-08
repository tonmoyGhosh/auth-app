@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <h3 class="mt-4">User Role Setup | Set Role</h3>
        </div>
        <div class="col-md-4">
            <br>
            <a href="{{ route('user.list') }}" class="btn btn-primary">User List</a>
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

    <form action="{{ route('user.role_set', $user->id) }}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <label for="exampleInputEmail1">Role</label>
            <select class="form-control" name="role">
                <option value="">Select Role</option>
                @if($roles && count($roles) > 0)
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
