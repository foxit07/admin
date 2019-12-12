<table data-toggle="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Permissions</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>
                @foreach($role->permissions as $permission)
                    {{ $permission->name }} <br>
                @endforeach
            </td>
            <td>
                @include('admin::layouts.form.action', [
                    'id' => $role->id,
                    'edit' => 'roles.edit',
                    'destroy' => 'roles.destroy',
                ])
            </td>
        </tr>
    @endforeach
    </tbody>
</table>