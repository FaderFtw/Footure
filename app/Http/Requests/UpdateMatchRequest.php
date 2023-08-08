<?php

namespace App\Http\Requests;

use App\Rules\AfterOrEqualCombinedDateTime;
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
            'league_id' => ['required', Rule::exists('leagues', 'id')],
            'team_id_home' => ['required','different:team_id_away', Rule::exists('teams', 'id')],
            'team_id_away' => ['required', Rule::exists('teams', 'id')],
            'dateOnly' => ['required', 'date', 'exclude'],
            'time' => ['required', 'exclude'],
            'date' => ['required', strtotime($this->matche->date) <= strtotime(date('Y-m-d H:i')) ? '':new AfterOrEqualCombinedDateTime()],
            'desc' => ['string','nullable'],
            'stadium' => ['string','nullable'],
            'referee' => ['required','string'],
            'score_id' => ['nullable', Rule::exists('scores', 'id')]
        ];

        return $data;
    }

}
