<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $data=[
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:255' , 'min:3',Rule::unique('users','username')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country' => ['string'],
            'age' => ['required', 'integer'],
            'role' => ['required', 'integer', Rule::in([User::ADMIN,User::USER,User::PLAYER])]
        ];

        $role = $this->request->get('role');
        if ($role == User::PLAYER){
            $data = $data + [
                    'team_id' => [Rule::exists('teams','id')],
                    'position' => ['string'],
                    'atkRate' => ['integer',  'max:100' , 'min:5'],
                    'midRate' => ['integer',  'max:100' , 'min:5'],
                    'defRate' => ['integer',  'max:100' , 'min:5'],
                ];
        }

        return $data;
    }
}
