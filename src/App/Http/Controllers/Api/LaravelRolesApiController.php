<?php

namespace vildanbina\LaravelRoles\App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use vildanbina\LaravelRoles\App\Http\Requests\StoreRoleRequest;
use vildanbina\LaravelRoles\Traits\RolesAndPermissionsHelpersTrait;
use vildanbina\LaravelRoles\Traits\RolesUsageAuthTrait;

class LaravelRolesApiController extends Controller
{
    use RolesAndPermissionsHelpersTrait;
    // use RolesUsageAuthTrait;

    /**
     * Return all the roles, Permissions, and Users data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getDashboardData();

        return response()->json([
            'code'      => 200,
            'status'    => 'success',
            'message'   => 'Success returning all roles and permissions data.',
            'data'      => $data['data'],
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $roleData = $request->roleFillData();
        $rolePermissions = $request->get('permissions');
        $role = $this->storeRoleWithPermissions($roleData, $rolePermissions);

        return response()->json([
            'code'      => 201,
            'status'    => 'created',
            'message'   => 'Success created new role.',
            'role'      => $role,
        ], 201);
    }
}
