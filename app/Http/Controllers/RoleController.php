<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Role\RoleCreateValidation;
use App\Http\Requests\Admin\Role\RoleUpdateValidation;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.roles', compact('roles'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $request->session()->flashInput([]);
        return view('admin.role.createOrUpdate');
    }

    /**
     * @param RoleCreateValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleCreateValidation $request)
    {
        $validate = $request->validated();
        Role::create($validate);
        return back()->with(['success' => true]);
    }

    /**
     * @param Role $role
     * @return void
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Role $role)
    {
        $request->session()->flashInput($role->toArray());
        return view('admin.role.createOrUpdate', compact('role'));
    }

    /**
     * @param RoleUpdateValidation $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleUpdateValidation $request, Role $role)
    {
        $validate = $request->validated();
        $role->update($validate);
        return back()->with(['success' => true]);
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with(['delete' => true]);
    }
}
