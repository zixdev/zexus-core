<?php namespace Zix\Core\Http\Controllers;

use Zix\Core\Models;
use Zix\Core\Http\Resources\Config as ConfigResources;
//use Zix\Core\Events\Config as ConfigEvents;
use Zix\Core\Http\Requests\Config as ConfigRequests;

/**
 * Class ConfigController
 * @property Models\Config model
 * @package Zix\Core\Http\Controllers
 */
class ConfigController
{
    /**
     * TestController constructor.
     * @param Models\Config $model
     */
    public function __construct(Models\Config $model)
    {
        $this->model = $model;
    }

    /**
     * @param ConfigRequests\ConfigShowRequest $request
     * @return ConfigResources\ConfigResourceCollection
     */
    public function index(ConfigRequests\ConfigShowRequest $request)
    {
        return new ConfigResources\ConfigResourceCollection(datatables()->of($this->model->query()));
    }

    /**
     * @param ConfigRequests\ConfigShowRequest $request
     * @param Models\Config $config
     * @return ConfigResources\ConfigResource
     */
    public function show(ConfigRequests\ConfigShowRequest $request, Models\Config $config)
    {
        return new ConfigResources\ConfigResource($config);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConfigRequests\ConfigStoreRequest $request
     * @return ConfigResources\ConfigResource
     */
    public function store(ConfigRequests\ConfigStoreRequest $request)
    {
        $model = $this->model->create($request->input());
        //event(new ConfigEvents\ConfigStoredEvent($model));

        return new ConfigResources\ConfigResource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Models\Config  $config
     * @param  ConfigRequests\ConfigUpdateRequest $request
     * @return ConfigResources\ConfigResource
     */
    public function update(ConfigRequests\ConfigUpdateRequest $request, Models\Config $config)
    {
        $config->update($request->input());
        //event(new ConfigEvents\ConfigUpdatedEvent($config));

        return new ConfigResources\ConfigResource($config);
    }

    /**
     * @param ConfigRequests\ConfigDestroyRequest $request
     * @param Models\Config $config
     * @return ConfigResources\ConfigResource
     */
    public function destroy(ConfigRequests\ConfigDestroyRequest $request, Models\Config $config)
    {
        //event(new ConfigEvents\ConfigDestroyedEvent($config));
        $config->delete();

        return new ConfigResources\ConfigResource($config);
    }
}