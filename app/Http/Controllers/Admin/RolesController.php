<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use Carbon\Carbon;


class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::get(); // use pagination and  add custom pagination on index.blade
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleRequest $request)
    {

        try {

            $role = $this->process(new Role, $request);
            if ($role)
                return redirect()->route('admin.roles.index')->with(['success' => 'The item has been added successfully']);
            else
                return redirect()->route('admin.roles.index')->with(['error' => 'Something went wrong']);
        } catch (\Exception $ex) {
            return $ex;
            // return message for unhandled exception
            return redirect()->route('admin.roles.index')->with(['error' => 'Something went wrong']);
        }
    }

    public function edit($id)
    {
          $role = Role::findOrFail($id);
        return view('admin.roles.edit',compact('role'));
    } 

    public function update($id,RoleRequest $request)
    {
        try {
            $role = Role::findOrFail($id);
            $role = $this->process($role, $request);
            if ($role)
                return redirect()->route('admin.roles.index')->with(['success' => 'The item has been updated successfully']);
            else
                return redirect()->route('admin.roles.index')->with(['error' => 'Something went wrong']);
        } catch (\Exception $ex) {
            // return message for unhandled exception
            return redirect()->route('admin.roles.index')->with(['error' => 'Something went wrong']);
        } 
    }

    protected function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions = json_encode($r->permissions);
        $role->save();
        return $role;
    }


}
