<?php namespace Zix\Core\Http\Controllers;

use Zix\Core\Http\Requests\Translation as TranslationRequests;
use Zix\Core\Http\Resources\Translation as TranslationResources;
use Zix\Core\Models;

//use Zix\Core\Events\Translation as TranslationEvents;

/**
 * Class TranslationController
 * @property Models\Translation model
 * @package Zix\Core\Http\Controllers
 * @resource Translation
 */
class TranslationController
{
    /**
     * TestController constructor.
     * @param Models\Translation $model
     */
    public function __construct(Models\Translation $model)
    {
        $this->model = $model;
    }


    /**
     * @param TranslationRequests\TranslationShowRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(TranslationRequests\TranslationShowRequest $request)
    {
        return response()->json(datatables()->of($this->model->query())->make(true));
    }

    /**
     * @param TranslationRequests\TranslationShowRequest $request
     * @param Models\Translation $translation
     * @return TranslationResources\TranslationResource
     */
    public function show(TranslationRequests\TranslationShowRequest $request, Models\Translation $translation)
    {
        return new TranslationResources\TranslationResource($translation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TranslationRequests\TranslationStoreRequest $request
     * @return TranslationResources\TranslationResource
     */
    public function store(TranslationRequests\TranslationStoreRequest $request)
    {
        $model = $this->model->create($request->input());
        //event(new TranslationEvents\TranslationStoredEvent($model));

        return new TranslationResources\TranslationResource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Models\Translation $translation
     * @param  TranslationRequests\TranslationUpdateRequest $request
     * @return TranslationResources\TranslationResource
     */
    public function update(TranslationRequests\TranslationUpdateRequest $request, Models\Translation $translation)
    {
        $translation->update($request->input());
        //event(new TranslationEvents\TranslationUpdatedEvent($translation));

        return new TranslationResources\TranslationResource($translation);
    }

    /**
     * @param TranslationRequests\TranslationDestroyRequest $request
     * @param Models\Translation $translation
     * @return TranslationResources\TranslationResource
     */
    public function destroy(TranslationRequests\TranslationDestroyRequest $request, Models\Translation $translation)
    {
        //event(new TranslationEvents\TranslationDestroyedEvent($translation));
        $translation->delete();

        return new TranslationResources\TranslationResource($translation);
    }
}