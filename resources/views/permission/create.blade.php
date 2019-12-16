@extends('admin::layouts.template.app')

@section('content')

<form action="{{ route('permissions.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Permission</label>
        <input id="name" type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"> {{ __('admin_lang::table.btn_save') }}</button>
    </div>
</form>

@endsection