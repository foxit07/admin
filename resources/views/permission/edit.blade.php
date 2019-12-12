<form action="{{ route('permissions.update', $permission->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="text" name="name" value="{{ $permission->name }}">
    <button type="submit"> Update </button>
</form>