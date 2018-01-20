<?php namespace Zix\Core\Http\Controllers;

use Zix\Core\Models;
use Zix\Core\Http\Resources\SiteConfig as SiteConfigResources;
//use Zix\Core\Events\SiteConfig as SiteConfigEvents;
use Zix\Core\Http\Requests\SiteConfig as SiteConfigRequests;

/**
 * Class SiteConfigController
 * @property Models\Site model
 * @package Zix\Core\Http\Controllers
 */
class SiteConfigController
{


    /**
     * @param SiteConfigRequests\SiteConfigShowRequest $request
     * @param Models\Site $site
     * @return SiteConfigResources\SiteConfigResource
     */
    public function show(SiteConfigRequests\SiteConfigShowRequest $request, Models\Site $site)
    {
        return new SiteConfigResources\SiteConfigResource($site);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SiteConfigRequests\SiteConfigStoreRequest $request
     * @param Models\Site $site
     * @return SiteConfigResources\SiteConfigResource
     */
    public function store(SiteConfigRequests\SiteConfigStoreRequest $request, Models\Site $site)
    {
//        $model = $this->model->create($request->input());
        //event(new SiteConfigEvents\SiteConfigStoredEvent($model));
        collect($request->all())->map(function ($value, $key) use ($site) {
            return $site->configs()->updateOrCreate(
                ['key' => $key],
                [
                    'key' => $key,
                    'value' => $value
                ]
            );
        });
//        $site->configs()->create();
//        config()->create($request->only(['key', 'value']))
        return new SiteConfigResources\SiteConfigResource($site);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Models\SiteConfig $siteconfig
     * @param  SiteConfigRequests\SiteConfigUpdateRequest $request
     * @return SiteConfigResources\SiteConfigResource
     */
    public function update(SiteConfigRequests\SiteConfigUpdateRequest $request, Models\SiteConfig $siteconfig)
    {
        $siteconfig->update($request->input());
        //event(new SiteConfigEvents\SiteConfigUpdatedEvent($siteconfig));

        return new SiteConfigResources\SiteConfigResource($siteconfig);
    }

    /**
     * @param SiteConfigRequests\SiteConfigDestroyRequest $request
     * @param Models\SiteConfig $siteconfig
     * @return SiteConfigResources\SiteConfigResource
     */
    public function destroy(SiteConfigRequests\SiteConfigDestroyRequest $request, Models\SiteConfig $siteconfig)
    {
        //event(new SiteConfigEvents\SiteConfigDestroyedEvent($siteconfig));
        $siteconfig->delete();

        return new SiteConfigResources\SiteConfigResource($siteconfig);
    }
}