@extends('admin::layouts.template.app')

@section('content')

<div id="toolbar">
    <div class="form-inline" role="form">
        <a href="{{route('users.create')}}" class="btn btn-success">{{ __('admin_lang::table.add_user') }}</a>
    </div>
</div>

<table @include('admin::layouts.table.setting')  data-url="/admin/ajax/users">
    <thead>
    <tr>
        <th data-field="id" data-sortable="true">ID</th>
        <th data-field="name" data-sortable="true">Name</th>
        <th data-field="role" >Roles</th>
        <th data-field="action">Action</th>
    </tr>
    </thead>
</table>
@endsection

