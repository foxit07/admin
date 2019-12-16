@extends('admin::layouts.template.app')

@section('content')
    <div id="toolbar">
        <div class="form-inline" role="form">
            <a href="{{route('roles.create')}}" class="btn btn-success">{{ __('admin_lang::table.add_role') }}</a>
        </div>
    </div>

    <table @include('admin::layouts.table.setting')  data-url="/admin/ajax/roles">
        <thead>
        <tr>
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="name" data-sortable="true">Name</th>
            <th data-field="perm" >Permissions</th>
            <th data-field="action">Action</th>
        </tr>
        </thead>
    </table>

@endsection