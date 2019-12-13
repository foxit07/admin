<?php


namespace Foxit07\Admin\Http\Controllers\Ajax;
use Foxit07\Admin\Models\Permission;

class PermissionController
{
    public function index()
    {

        list($total, $row) = $this->ajax();

        return response()->json(['total' => $total, 'rows' => $row], 200);

    }


    public function ajax()
    {


        $total = Permission::all()->count();

        $search = request('search');
        $sort = request('sort') ?? 'id';
        $order = request('order') ?? 'asc';

        $offset = request('offset');
        $limit = request('limit');

        $permissions = Permission::where('name', 'LIKE', '%' . $search . '%')
            ->offset($offset)->limit($limit)
            ->orderBy($sort, $order)
            ->get();

        if($search){
            $total = $permissions->count();
        }

        $permissions->map(function ($permission, $key) {

            $edit = 'permissions.edit';
            $destroy = 'permissions.destroy';
            $id = $permission->id;

            $permission->action = view('admin::layouts.form.action', compact('id', 'edit', 'destroy'))->render();
        });

        return [$total, $permissions];
    }
}