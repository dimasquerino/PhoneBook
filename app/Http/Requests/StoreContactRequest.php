<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
        $id = $this->id ?? '';

        return [
            'user_id' => [
                'integer',
            ],
            'name' => [
                'required',
                "unique:contacts,name,{$id},id",
                'string',
                'max: 100'
            ],
            'telephone' => [
                'required',
                "unique:contacts,telephone,{$id},id",
                'string',
                'max: 100'
            ],
            'observation' => [
                'nullable',
                'string',
                'max: 255'
            ],
            'avatar' => [
                'nullable',
                'image',
                'max:2048'
            ]
        ];
    }
}
