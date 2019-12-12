<?php


namespace Foxit07\Admin\Http\Controllers;
use Foxit07\Admin\Traits\Authorizable;
use App\User;
use Foxit07\Admin\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    use Authorizable;

    public function index(Request $request)
    {

        if($request->ajax()){

            return $this->ajax();
        }


        return view('admin::user.index');
    }


    public function ajax()
    {
        /* https://examples.wenzhixin.net.cn/examples/bootstrap_table/data?search=&sort=&order=asc&offset=0&limit=10*/

        /*
         {
          "total": 800,
          "totalNotFiltered": 800,
          "rows": [
            {
              "id": 0,
              "name": "Item 0",
              "price": "$0"
            },
            {
              "id": 1,
              "name": "Item 1",
              "price": "$1"
            },
          ]
        }
         */

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

        return response()->json(['total' => $total, 'rows' =>  $users]);
    }

    public function show($id)
    {

    }

    public function create()
    {
        $roles = Role::all();
        return view('admin::user.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $request->merge(['password' => bcrypt($request->get('password'))]);
        $user = User::create($request->all());
        $user->assignRole(request('role'));

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('admin::user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);


        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        // Handle the user roles
        $user->syncRoles($request->get('role'));



        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }


}