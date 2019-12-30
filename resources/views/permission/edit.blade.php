@extends('admin::layouts.template.app')

@section('content')

<form action="{{ route('permissions.update', $permission->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group">
        <label for="name">Permission</label>
        <input id="name" type="text" name="name" value="{{ $permission->name }}" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-warning ">{{ __('admin-lang::table.btn_update') }}</button>
    </div>
</form>

@endsection