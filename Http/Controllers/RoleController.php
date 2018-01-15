<?php namespace Zix\Core\Http\Controllers;

use Zix\Core\Models;
use Zix\Core\Http\Resources\Role as RoleResources;
//use Zix\Core\Events\Role as RoleEvents;
use Zix\Core\Http\Requests\Role as RoleRequests;
use Zix\Core\Http\Requests\Permission as PermissionRequests;

/**
 * Class RoleController
 * @property Models\Role model
 * @package Zix\Core\Http\Controllers
 */
class RoleController
{
    /**
     * TestController constructor.
     * @param Models\Role $model
     */
    public function __construct(Models\Role $model)
    {
        $this->model = $model;
    }

    /**
     * @param RoleRequests\RoleShowRequest $request
     * @return RoleResources\RoleResourceCollection
     */
    public function index(RoleRequests\RoleShowRequest $request)
    {
        return datatables()->eloquent($this->model->with('permissions'))->toJson();
    }

    /**
     * @param RoleRequests\RoleShowRequest $request
     * @param Models\Role $role
     * @return RoleResources\RoleResource
     */
    public function show(RoleRequests\RoleShowRequest $request, Models\Role $role)
    {
        return new RoleResources\RoleResource($role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequests\RoleStoreRequest $request
     * @return RoleResources\RoleResource
     */
    public function store(RoleRequests\RoleStoreRequest $request)
    {
        $model = $this->model->create($request->input());
        //event(new RoleEvents\RoleStoredEvent($model));

        return new RoleResources\RoleResource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Models\Role $role
     * @param  RoleRequests\RoleUpdateRequest $request
     * @return RoleResources\RoleResource
     */
    public function update(RoleRequests\RoleUpdateRequest $request, Models\Role $role)
    {
        $role->update($request->input());
        //event(new RoleEvents\RoleUpdatedEvent($role));

        return new RoleResources\RoleResource($role);
    }

    /**
     * @param RoleRequests\RoleDestroyRequest $request
     * @param Models\Role $role
     * @return RoleResources\RoleResource
     */
    public function destroy(RoleRequests\RoleDestroyRequest $request, Models\Role $role)
    {
        //event(new RoleEvents\RoleDestroyedEvent($role));
        $role->delete();

        return new RoleResources\RoleResource($role);
    }

    /**
     * @param PermissionRequests\PermissionUpdateRequest $request
     * @param Models\Role $role
     * @return RoleResources\RoleResource
     */
    public function updatePermissions(PermissionRequests\PermissionUpdateRequest $request, Models\Role $role)
    {
        return new RoleResources\RoleResource($role->syncPermissions($this->getRequestPermissionsKeys($request)));
    }

    /**
     * @param PermissionRequests\PermissionUpdateRequest $request
     * @return static
     */
    private function getRequestPermissionsKeys(PermissionRequests\PermissionUpdateRequest $request)
    {
        return collect($request->input())->filter(function ($permission) {
            return $permission;
        })->keys();
    }
}