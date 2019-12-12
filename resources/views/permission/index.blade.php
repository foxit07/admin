<table data-toggle="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>
                @include('admin::layouts.form.action', [
                    'id' => $permission->id,
                    'edit' => 'permissions.edit',
                    'destroy' => 'permissions.destroy',
                ])
            </td>
        </tr>
    @endforeach
    </tbody>
</table>