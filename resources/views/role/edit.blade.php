@extends('admin::layouts.template.app')

@section('content')

<form action="{{ route('roles.update', $role->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="name">Role</label>
        <input type="text" name="name" value="{{ $role->name }}" class="form-control">
    </div>

    <div class="form-group">
    @foreach($permissions as $permission)
        @php
            $hasPermission = false
        @endphp
        @foreach($role->permissions as $key => $rolePermission)
            @if($permission->id == $rolePermission->id)
                <div class="form-check">
                    <input type="checkbox" id="checkbox-{{ $key }}" name="permission[]" value="{{ $permission->id }}" checked  class="form-check-input">
                    <label for="checkbox-{{ $key }}" class="form-check-label"> {{ $permission->name }}  </label>
                </div>

                @php
                    $hasPermission = true
                @endphp
                @break
            @endif
        @endforeach
        @if( $hasPermission == false)
            <div class="form-check">
                <input type="checkbox" id="checkbox-{{ $key }}" name="permission[]" value="{{ $permission->id }}" class="form-check-input">
                <label for="checkbox-{{ $key }}"  class="form-check-label"> {{ $permission->name }}</label>
            </div>
        @endif
    @endforeach
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-warning ">{{ __('admin-lang::table.btn_update') }}</button>
    </div>
</form>
@endsection