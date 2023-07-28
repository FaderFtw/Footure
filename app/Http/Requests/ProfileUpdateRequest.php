<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $data=[
            'name' => ['string', 'max:255'],
            'username' => ['string', 'min:3', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'age' => ['required', 'integer'],
            'image' => ['image', 'mimes:jpg,bmp,png,gif', 'dimensions:min_width=200,min_height=300']
        ];

        if ($this->user()->role == User::PLAYER){
            $data = $data + [
                'position' => [ 'string'],
                'atkRate' => ['required','integer',  'max:100' , 'min:5'],
                'midRate' => ['required','integer',  'max:100' , 'min:5'],
                'defRate' => ['required','integer',  'max:100' , 'min:5'],
            ];
        }
        return $data;
    }
}
