<?php namespace Zix\Core\Http\Controllers;

use Zix\Core\Models;
use Zix\Core\Http\Resources\LanguageLine as LanguageLineResources;
//use Zix\Core\Events\LanguageLine as LanguageLineEvents;
use Zix\Core\Http\Requests\LanguageLine as LanguageLineRequests;

/**
 * Class LanguageLineController
 * @property Models\LanguageLine model
 * @package Zix\Core\Http\Controllers
 */
class LanguageLineController
{
    /**
     * TestController constructor.
     * @param Models\LanguageLine $model
     */
    public function __construct(Models\LanguageLine $model)
    {
        $this->model = $model;
    }


    /**
     * @param LanguageLineRequests\LanguageLineShowRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(LanguageLineRequests\LanguageLineShowRequest $request)
    {
        return response()->json(datatables()->of($this->model->query())->make(true));
    }

    /**
     * @param LanguageLineRequests\LanguageLineShowRequest $request
     * @param Models\LanguageLine $languageline
     * @return LanguageLineResources\LanguageLineResource
     */
    public function show(LanguageLineRequests\LanguageLineShowRequest $request, Models\LanguageLine $languageline)
    {
        return new LanguageLineResources\LanguageLineResource($languageline);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LanguageLineRequests\LanguageLineStoreRequest $request
     * @return LanguageLineResources\LanguageLineResource
     */
    public function store(LanguageLineRequests\LanguageLineStoreRequest $request)
    {
        $model = $this->model->create($request->input());
        //event(new LanguageLineEvents\LanguageLineStoredEvent($model));

        return new LanguageLineResources\LanguageLineResource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Models\LanguageLine  $languageline
     * @param  LanguageLineRequests\LanguageLineUpdateRequest $request
     * @return LanguageLineResources\LanguageLineResource
     */
    public function update(LanguageLineRequests\LanguageLineUpdateRequest $request, Models\LanguageLine $languageline)
    {
        $languageline->update($request->input());
        //event(new LanguageLineEvents\LanguageLineUpdatedEvent($languageline));

        return new LanguageLineResources\LanguageLineResource($languageline);
    }

    /**
     * @param LanguageLineRequests\LanguageLineDestroyRequest $request
     * @param Models\LanguageLine $languageline
     * @return LanguageLineResources\LanguageLineResource
     */
    public function destroy(LanguageLineRequests\LanguageLineDestroyRequest $request, Models\LanguageLine $languageline)
    {
        //event(new LanguageLineEvents\LanguageLineDestroyedEvent($languageline));
        $languageline->delete();

        return new LanguageLineResources\LanguageLineResource($languageline);
    }
}