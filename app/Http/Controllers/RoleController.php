<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(10);
        return view('manage.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255|unique:permissions,name',
            'display_name' => 'required|max:255|unique:permissions,display_name',
            'description' => 'required|max:255',
        ]);
        $role = new Role([
            'name' => $validated['name'],
            'display_name' => $validated['display_name'],
            'description' => $validated['description'],
        ]);
        if($role->save())
        {
            return redirect()->route('roles.show', $role->id);
        }
        $request->session()->flash('error', 'Sorry but a problem occurred while trying to create the permission.');
        return view('manage.roles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('manage.roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('manage.roles.edit', ['role' => $role, 'permissions' => Permission::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @throws
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            'display_name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        /** @var Role $role **/
        $role = Role::findOrFail($id);
        $role->update([
            'display_name' => $validated['display_name'],
            'description' => $validated['description'],
        ]);
        $permissionIds = [];
        foreach($request->all() as $input => $value)
        {
            $inputExploded = explode('-', $input);
            if($inputExploded[0] == 'active')
            {
                $permissionIds[] = $inputExploded[1];
            }
        }
        if(count($permissionIds) > 0)
        {
            $role->permissions()->detach();
            foreach($permissionIds as $id)
            {
                $role->permissions()->attach($id);
            }
        }
        if(!$role->save())
        {
            $request->session()->flash('error', 'Sorry but a problem occurred while trying to updating the user.');
        }
        return redirect()->route('roles.show', $role->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return route('roles.index');
    }
}
