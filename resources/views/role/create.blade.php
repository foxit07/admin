@extends('admin::layouts.template.app')

@section('content')

<form action="{{ route('roles.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Role</label>
        <input id="name" type="text" name="name" class="form-control">
    </div>

    @foreach($permissions as $key => $permission)
        <div class="form-check">
            <input type="checkbox" id="checkbox-{{ $key }}" name="permission[]" value="{{ $permission->id }}" class="form-check-input">
            <label for="checkbox-{{ $key }}"  class="form-check-label"> {{ $permission->name }}</label>
        </div>
    @endforeach

    <div class="form-group">
        <button type="submit" class="btn btn-primary"> Create </button>
    </div>
</form>

@endsection