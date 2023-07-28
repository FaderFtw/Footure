<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $data=[
            'name' => ['required', 'string', 'max:255', Rule::unique('teams','name')->ignore($this->team)],
            'coach' => ['required', 'string', Rule::unique('teams', 'coach')->ignore($this->team)],
            'stadium' => ['required', 'string'],
            'city' => ['required', 'string'],
            'capacity' => ['required', 'integer' , 'min:10000'],
            'founded_at' => ['date'],
            'league_id' => ['nullable', Rule::exists('leagues', 'id')],
            'logo' => ['image', 'mimes:jpg,bmp,png', 'dimensions:min_width=200,min_height=300']
        ];

        return $data;
    }
}
