<form action="{{ route('roles.update', $role->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="text" name="name" value="{{ $role->name }}">
    @foreach($permissions as $permission)
        @php
            $hasPermission = false
        @endphp
        @foreach($role->permissions as $rolePermission)
            @if($permission->id == $rolePermission->id)
                <label for="checkbox"> {{ $permission->name }}</label>
                <input type="checkbox" id="checkbox" name="permission[]" value="{{ $permission->id }}" checked >
                <br>
                @php
                    $hasPermission = true
                @endphp
                @break
            @endif
        @endforeach
        @if( $hasPermission == false)
            <label for="checkbox"> {{ $permission->name }}</label>
            <input type="checkbox" id="checkbox" name="permission[]" value="{{ $permission->id }}" >
            <br>
        @endif
    @endforeach
    <button type="submit">Update</button>
</form>