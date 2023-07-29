<?php

namespace App\Http\Requests;

use App\Rules\AfterOrEqualCombinedDateTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
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
            'team_id_away' => ['required', Rule::exists('teams', 'id')],
            'dateOnly' => ['required', 'date', 'exclude'],
            'time' => ['required', 'exclude'],
            'date' => ['required', new AfterOrEqualCombinedDateTime()],
            'desc' => ['string','nullable'],
            'stadium' => ['string',],
            'referee' => ['required','string']
        ];

        return $data;
    }
}
