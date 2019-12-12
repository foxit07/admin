<a  href="{{ route($edit, $id) }}">
    <i class="fas fa-edit"></i>
</a>
<form action="{{ route($destroy, $id) }}" method="POST" style="display: inline;">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" style="border: none; background: none; outline: none">
        <i class="fas fa-trash"></i>
    </button>
</form>
