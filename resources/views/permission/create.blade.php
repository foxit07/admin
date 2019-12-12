<form action="{{ route('permissions.store') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="name">
    <button type="submit"> Create </button>
</form>