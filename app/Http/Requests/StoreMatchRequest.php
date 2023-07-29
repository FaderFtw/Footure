<?php

namespace App\Http\Requests;

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
        $combinedDateTime = request()->input('date') . ' ' . request()->input('time');

        return [
            'league_id' => ['required', 'exists:leagues,id'],
            'team_id_home' => ['required', 'different:team_id_away', 'exists:teams,id'],
            'team_id_away' => ['required', 'exists:teams,id'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'combined_date_time' => ['required', new AfterOrEqualCombinedDateTime($combinedDateTime)],
            'desc' => ['string', 'nullable'],
            'stadium' => ['string'],
            'referee' => ['required', 'string'],
        ];
    }
}
