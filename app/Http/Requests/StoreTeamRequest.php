<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class StoreTeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $data=[
            'name' => ['required', 'string', 'max:255', Rule::unique('teams','name')],
            'coach' => ['required', 'string', Rule::unique('teams', 'coach')],
            'stadium' => ['required', 'string'],
            'city' => ['required', 'string'],
            'capacity' => ['required', 'integer' , 'min:10000'],
            'founded_at' => ['date'],
            'league_id' => ['nullable', Rule::exists('leagues', 'id')],
            'logo' => ['required','image', 'mimes:jpg,bmp,png', 'dimensions:min_width=200,min_height=300']
        ];

        return $data;
    }
}
