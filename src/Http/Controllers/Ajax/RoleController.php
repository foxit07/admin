<?php


namespace Foxit07\Admin\Http\Controllers\Ajax;
use Foxit07\Admin\Models\Role;

class RoleController
{
    public function index()
    {

        list($total, $row) = $this->ajax();

        return response()->json(['total' => $total, 'rows' => $row], 200);

    }


    public function ajax()
    {


        $total = Role::all()->count();

        $search = request('search');
        $sort = request('sort') ?? 'id';
        $order = request('order') ?? 'asc';

        $offset = request('offset');
        $limit = request('limit');

        $roles = Role::where('name', 'LIKE', '%' . $search . '%')->orWhereHas('permissions', function ($q) use ($search){
            return $q->where('name', 'LIKE', '%' . $search . '%');
        })
            ->offset($offset)->limit($limit)
            ->orderBy($sort, $order)
            ->get();

        if($search){
            $total = $roles->count();
        }

        $roles->map(function ($role, $key) {
            $role->perm = $role->permissions->map(function($permission, $key){

                return $permission->name;
            });

            $edit = 'roles.edit';
            $destroy = 'roles.destroy';
            $id = $role->id;

            $role->action = view('admin::layouts.form.action', compact('id', 'edit', 'destroy'))->render();
        });

        return [$total, $roles];
    }
}