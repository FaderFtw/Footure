<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravolt\Avatar\Facade as Avatar;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $attributes = $request->input();


        if ($request->role == User::PLAYER){
            $atkRate = $request->atkRate;
            $midRate = $request->midRate;
            $defRate = $request->defRate;
            $rating = intval(($atkRate + $midRate + $defRate) / 3);
            $attributes['rating'] = $rating;
        }
        unset($attributes['password_confirmation']);

        $user = User::create($attributes);

        Avatar::create($request->name)->save(public_path('avatars/avatar-'. $user->id .'.png'));


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success','Your account has been created.');
    }
}
