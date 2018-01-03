<?php

namespace Zix\Core\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class SiteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255', 'unique:sites,name'],
            'ui' => ['required', 'min:3', 'max:255', 'unique:sites,ui'],
            'url' => ['required', 'min:3', 'max:255', 'unique:sites,url'],
        ];
    }
}
