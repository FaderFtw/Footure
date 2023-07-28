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
        $atkRate = $midRate = $defRate = $position  = $rating= null;

        if ($request->role == User::PLAYER){
            $position = $request->position;
            $atkRate = $request->atkRate;
            $midRate = $request->midRate;
            $defRate = $request->defRate;
            $rating = intval(($atkRate + $midRate + $defRate) / 3);
        }


        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'age' => $request->age,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request-> role,
            'position' => $position,
            'rating' => $rating,
            'atkRate' => $atkRate,
            'midRate' => $midRate,
            'defRate' => $defRate,
        ]);

        Avatar::create($request->name)->save(public_path('avatars/avatar-'. $user->id .'.png'));


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success','Your account has been created.');
    }
}
