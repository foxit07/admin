<form action="{{ route('roles.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="name">

    @foreach($permissions as $permission)
        <label for="checkbox[]"> {{ $permission->name }}</label>
        <input type="checkbox" id="checkbox[]" name="permission[]" value="{{ $permission->id }}">
        <br>
    @endforeach

    <button type="submit"> Create </button>
</form>