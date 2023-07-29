<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMatchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function rules(): array
    {
        $data=[
            'name' => ['required', 'string', 'max:255', Rule::unique('leagues','name')->ignore($this->league)],
            'country' => ['required', 'string'],
            'desc' => ['string','nullable'],
            'founder' => ['required'],
            'founded_at' => ['nullable', 'date'],
            'logo' => ['image', 'mimes:jpg,bmp,png', 'dimensions:min_width=200,min_height=300']
        ];

        return $data;
    }

}
