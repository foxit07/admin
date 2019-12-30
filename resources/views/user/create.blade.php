@extends('admin::layouts.template.app')

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="text" name="password" class="form-control">
        </div>

        <div class="form-group" id="roles">
            <label for="roles">Roles</label>
            @foreach($roles as $key => $role)
                <div class="form-check">
                    <input type="checkbox" id="checkbox_{{ $key }}" name="role[]" value="{{ $role->id }}" class="form-check-input">
                    <label for="checkbox_{{ $key }}" class="form-check-label"> {{ $role->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"> {{ __('admin-lang::table.btn_save') }} </button>
        </div>
    </form>
@endsection