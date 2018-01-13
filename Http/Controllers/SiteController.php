<?php namespace Zix\Core\Http\Controllers;

use Zix\Core\Models;
use Zix\Core\Http\Resources\Site as SiteResources;
//use Zix\Core\Events\Site as SiteEvents;
use Zix\Core\Http\Requests\Site as SiteRequests;

/**
 * Class SiteController
 * @property Models\Site model
 * @package Zix\Core\Http\Controllers
 */
class SiteController
{
    /**
     * TestController constructor.
     * @param Models\Site $model
     */
    public function __construct(Models\Site $model)
    {
        $this->model = $model;
    }

    /**
     * @param SiteRequests\SiteShowRequest $request
     * @return SiteResources\SiteResourceCollection
     * @throws \Exception
     */
    public function index(SiteRequests\SiteShowRequest $request)
    {
        return response()->json(datatables()->of($this->model->query())->make(true));
    }

    /**
     * @param SiteRequests\SiteShowRequest $request
     * @param Models\Site $site
     * @return SiteResources\SiteResource
     */
    public function show(SiteRequests\SiteShowRequest $request, Models\Site $site)
    {
        return new SiteResources\SiteResource($site);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SiteRequests\SiteStoreRequest $request
     * @return SiteResources\SiteResource
     */
    public function store(SiteRequests\SiteStoreRequest $request)
    {
        $model = $this->model->create($request->input());
        //event(new SiteEvents\SiteStoredEvent($model));

        return new SiteResources\SiteResource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Models\Site  $site
     * @param  SiteRequests\SiteUpdateRequest $request
     * @return SiteResources\SiteResource
     */
    public function update(SiteRequests\SiteUpdateRequest $request, Models\Site $site)
    {
        $site->update($request->input());
        //event(new SiteEvents\SiteUpdatedEvent($site));

        return new SiteResources\SiteResource($site);
    }

    /**
     * @param SiteRequests\SiteDestroyRequest $request
     * @param Models\Site $site
     * @return SiteResources\SiteResource
     */
    public function destroy(SiteRequests\SiteDestroyRequest $request, Models\Site $site)
    {
        //event(new SiteEvents\SiteDestroyedEvent($site));
        $site->delete();

        return new SiteResources\SiteResource($site);
    }
}