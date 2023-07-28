<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class StoreLeagueRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $data=[
            'name' => ['required', 'string', 'max:255', Rule::unique('leagues','name')],
            'country' => ['required', 'string'],
            'desc' => ['string','nullable'],
            'founder' => ['required'],
            'founded_at' => ['nullable', 'date'],
            'logo' => ['required','image', 'mimes:jpg,bmp,png', 'dimensions:min_width=200,min_height=300']
        ];

        return $data;
    }
}
