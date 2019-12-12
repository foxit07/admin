@extends('admin::layouts.template.app')

@section('content')

<div id="toolbar">
    <a href="{{route('users.create')}}" class="btn btn-success">Add User</a>
</div>

<table @include('admin::layouts.table.setting') >
    <thead>
    <tr>
        <th data-field="state" data-checkbox="true"></th>
        <th data-field="id" data-sortable="true">ID</th>
        <th data-field="name" data-sortable="true">Name</th>
        <th data-field="role" >Roles</th>
        <th data-field="action">Action</th>
    </tr>
    </thead>
</table>
@endsection

