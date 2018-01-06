<?php namespace Zix\Core\Http\Controllers;


use Zix\Core\Http\Requests\Translation\TranslationShowRequest;
use Zix\Core\Models\Translation;

/**
 * Class TranslationGroupController
 * @package Zix\Core\Http\Controllers
 * @resource Translation
 */
class TranslationGroupController
{

    /**
     * TranslationGroupController constructor.
     * @param Translation $model
     */
    public function __construct(Translation $model)
    {
        $this->model = $model;
    }

    /**
     * @param TranslationShowRequest $request
     * @param $groups
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public function show(TranslationShowRequest $request, $groups)
    {
        $translations = [];
        $groups = explode(',', $groups);
        foreach ($groups as $group) {
            $translations[$group] = trans($group);
        }
        return $translations;
    }
}