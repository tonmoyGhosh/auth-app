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
