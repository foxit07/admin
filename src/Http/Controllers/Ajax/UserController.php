<?php


namespace Foxit07\Admin\Http\Controllers\Ajax;

use Foxit07\Admin\Http\Controllers\Controller;
use App\User;


class UserController extends Controller
{



    public function index()
    {

        list($total, $row) = $this->ajax();

        return response()->json(['total' => $total, 'rows' => $row], 200);

    }


    public function ajax()
    {


        $total = User::all()->count();

        $search = request('search');
        $sort = request('sort') ?? 'id';
        $order = request('order') ?? 'asc';

        $offset = request('offset');
        $limit = request('limit');

        $users = User::where('name', 'LIKE', '%' . $search . '%')->orWhereHas('roles', function ($q) use ($search){
           return $q->where('name', 'LIKE', '%' . $search . '%');
        })
            ->offset($offset)->limit($limit)
            ->orderBy($sort, $order)
            ->get();

        if($search){
            $total = $users->count();
        }

         $users->map(function ($user, $key) {
            $user->role = $user->roles->map(function($role, $key){
                return $role->name;
            });

            $edit = 'users.edit';
            $destroy = 'users.destroy';
            $id = $user->id;

            $user->action = view('admin::layouts.form.action', compact('id', 'edit', 'destroy'))->render();
        });

        return [$total, $users];
    }


}