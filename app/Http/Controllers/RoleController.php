<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles', compact('roles'));
    }

    /**
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
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
     * @param Role $role
     * @return void
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return void
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * @param Role $role
     * @return void
     */
    public function destroy(Role $role)
    {
        //
    }
}
