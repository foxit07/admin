@extends('admin::layouts.template.app')

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="{{ $user->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="text" name="password" class="form-control">
        </div>

        <div class="form-group" id="roles">
            <label for="roles">Roles</label>
            @foreach($roles as $key => $role)
                @php
                    $userHasRole = false
                @endphp
                @foreach($user->roles as $userRole)
                    @if($role->id == $userRole->id)
                        <div class="form-check">
                            <input type="checkbox" id="checkbox_{{ $key }}" name="role[]" value="{{ $role->id }}" checked  class="form-check-input">
                            <label for="checkbox_{{ $key }}"> {{ $role->name }}</label>
                        </div>
                        @php
                            $userHasRole = true
                        @endphp
                        @break
                    @endif
                @endforeach
                @if(  $userHasRole == false)
                    <div class="form-check">
                        <input type="checkbox" id="checkbox_{{ $key }}" name="role[]" value="{{ $role->id }}"  class="form-check-input">
                        <label for="checkbox_{{ $key }}"> {{ $role->name }}</label>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
@endsection