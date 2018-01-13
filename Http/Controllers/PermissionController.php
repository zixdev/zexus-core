<?php namespace Zix\Core\Http\Controllers;

use Zix\Core\Models;
use Zix\Core\Http\Resources\Permission as PermissionResources;
//use Zix\Core\Events\Permission as PermissionEvents;
use Zix\Core\Http\Requests\Permission as PermissionRequests;

/**
 * Class PermissionController
 * @property Models\Permission model
 * @package Zix\Core\Http\Controllers
 */
class PermissionController
{
    /**
     * TestController constructor.
     * @param Models\Permission $model
     */
    public function __construct(Models\Permission $model)
    {
        $this->model = $model;
    }

    /**
     * @param PermissionRequests\PermissionShowRequest $request
     * @return PermissionResources\PermissionResourceCollection
     */
    public function index(PermissionRequests\PermissionShowRequest $request)
    {
        return new PermissionResources\PermissionResourceCollection(datatables()->of($this->model->query()));
    }

    /**
     * @param PermissionRequests\PermissionShowRequest $request
     * @param Models\Permission $permission
     * @return PermissionResources\PermissionResource
     */
    public function show(PermissionRequests\PermissionShowRequest $request, Models\Permission $permission)
    {
        return new PermissionResources\PermissionResource($permission);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionRequests\PermissionStoreRequest $request
     * @return PermissionResources\PermissionResource
     */
    public function store(PermissionRequests\PermissionStoreRequest $request)
    {
        $model = $this->model->create($request->input());
        //event(new PermissionEvents\PermissionStoredEvent($model));

        return new PermissionResources\PermissionResource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Models\Permission  $permission
     * @param  PermissionRequests\PermissionUpdateRequest $request
     * @return PermissionResources\PermissionResource
     */
    public function update(PermissionRequests\PermissionUpdateRequest $request, Models\Permission $permission)
    {
        $permission->update($request->input());
        //event(new PermissionEvents\PermissionUpdatedEvent($permission));

        return new PermissionResources\PermissionResource($permission);
    }

    /**
     * @param PermissionRequests\PermissionDestroyRequest $request
     * @param Models\Permission $permission
     * @return PermissionResources\PermissionResource
     */
    public function destroy(PermissionRequests\PermissionDestroyRequest $request, Models\Permission $permission)
    {
        //event(new PermissionEvents\PermissionDestroyedEvent($permission));
        $permission->delete();

        return new PermissionResources\PermissionResource($permission);
    }
}