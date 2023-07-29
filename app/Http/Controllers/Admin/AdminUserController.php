<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Models\League;
use App\Models\User;
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




        User::create($attributes);
        return redirect('/admin_dashboard/leagues')->with('success','New User has been created.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(League $league)
    {
        return view('leagues.edit', ['league' => $league]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeagueRequest $request, League $league)
    {

        $attributes = $request->input();

        if($attributes['founded_at'] ?? false){
            $attributes['founded_at'] = DateTime::createFromFormat('m/d/Y', $attributes['founded_at'])
                ->format('Y-m-d');
        }


        if($attributes['name'] ?? false)
            $attributes['slug'] = str_replace(' ', '-', $attributes['name']);


        if($request->file('logo') ?? false)
            $attributes['logo'] = $request->file('logo')->store('leagues-logos');

        $league->update($attributes);

        return redirect(route('admin.leagues'))->with('success', 'League Updated');
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
