<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\League;
use App\Models\User;
use Laravolt\Avatar\Facade as Avatar;
use Nette\Utils\DateTime;

class AdminUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $attributes = $request->input();
        unset($attributes['password_confirmation']);
        if ($request->role == User::PLAYER){
            $atkRate = $request->atkRate;
            $midRate = $request->midRate;
            $defRate = $request->defRate;
            $rating = intval(($atkRate + $midRate + $defRate) / 3);
            $attributes['rating'] = $rating;
        }

        $user = User::create($attributes);
        Avatar::create($request->name)->save(public_path('avatars/avatar-'. $user->id .'.png'));
        return redirect('/admin_dashboard/users')->with('success','New User has been created.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $attributes = $request->input();

        if($request->file('image') ?? false)
            $attributes['image'] = $request->file('image')->store('profile-images');


        if($user->role == User::PLAYER){
            $attributes['rating'] = intval(($attributes['atkRate'] + $attributes['midRate'] + $attributes['defRate']) / 3);
        }


        $user->update($attributes);

        return redirect(route('admin.users'))->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage .
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User Deleted');
    }

}
