<?php

namespace App\Http\Controllers;

use App\Models\UsersRole;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

/**
 * Class UsersRoleController
 * @package App\Http\Controllers
 */
class UsersRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersRoles = UsersRole::paginate();

        return view('users-role.index', compact('usersRoles'))
            ->with('i', (request()->input('page', 1) - 1) * $usersRoles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('estado', 'activo')->pluck('id', 'id');
        $users = User::where('estado', 'activo')->pluck('id', 'id');
        return view('users-role.create', compact('roles', 'users'));
        /**$usersRole = new UsersRole();
        return view('users-role.create', compact('usersRole'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UsersRole::$rules);

        $usersRole = UsersRole::create($request->all());

        return redirect()->route('users-roles.index')
            ->with('success', 'UsersRole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usersRole = UsersRole::find($id);
        $user = $usersRole->user;
        $role = $usersRole->role;

        return view('users-role.show', compact('usersRole','user','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::where('estado', 'activo')->pluck('id', 'id');
        $users = User::where('estado', 'activo')->pluck('id', 'id');
        $usersRole = UsersRole::find($id);
        return view('users-role.edit', compact('usersRole', 'roles', 'users'));
        /*$usersRole = UsersRole::find($id);

        return view('users-role.edit', compact('usersRole'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UsersRole $usersRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersRole $usersRole)
    {
        request()->validate(UsersRole::$rules);

        $usersRole->update($request->all());
        return redirect()->route('users-roles.index')
            ->with('success', 'UsersRole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usersRole = UsersRole::find($id)->delete();

        return redirect()->route('users-roles.index')
            ->with('success', 'UsersRole deleted successfully');
    }
    public function cestado($id)
    {
        $usersRole = UsersRole::findOrFail($id);

        if ($usersRole->estado === 'Activo') {
            $usersRole->estado = 'Inactivo';
        } else {
            $usersRole->estado = 'Activo';
        }

        $usersRole->save();

        return redirect()->back()->with('Exito', 'Estado cambiado exitosamente.');
    }
}
