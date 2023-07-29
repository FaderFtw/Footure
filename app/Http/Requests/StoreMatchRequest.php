<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMatchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $data=[
            'league_id' => ['required', Rule::exists('leagues', 'id')],
            'team_id_home' => ['required','different:team_id_away', Rule::exists('teams', 'id')],
            'team_id_away' => ['required','different:team_id_home', Rule::exists('teams', 'id')],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'desc' => ['string','nullable'],
            'stadium' => ['string',],
            'referee' => ['required','string']
        ];

        return $data;
    }
}
