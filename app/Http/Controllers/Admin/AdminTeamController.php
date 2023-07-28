<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use DateTime;


class AdminTeamController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $attributes = $request->input();

        $originalDate = $attributes['founded_at'];
        $dateObj = DateTime::createFromFormat('m/d/Y', $originalDate);
        $date= $dateObj->format('Y-m-d');

        $attributes['slug'] = str_replace(' ', '-', $attributes['name']);
        $attributes['founded_at'] = $date;
        $attributes['logo'] = $request->file('logo')->store('teams-logos');


        Team::create($attributes);
        return redirect('/admin_dashboard/teams')->with('success','New Team has been created.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('teams.edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $attributes = $request->input();

        if($attributes['founded_at'] ?? false){
            $attributes['founded_at'] = DateTime::createFromFormat('m/d/Y', $attributes['founded_at'])
                ->format('Y-m-d');
        }


        if($attributes['name'] ?? false)
            $attributes['slug'] = str_replace(' ', '-', $attributes['name']);


        if($request->file('logo') ?? false)
            $attributes['logo'] = $request->file('logo')->store('teams-logos');

        $team->update($attributes);

        return redirect(route('admin.teams'))->with('success', 'Team Updated');
    }

    /**
     * Remove the specified resource from storage .
     */
    public function destroy(Team $team)
    {
        $team->homeMatches()->each(function ($match) {
            $match->score()->delete();
            $match->delete();
        });

        $team->awayMatches()->each(function ($match) {
            $match->score()->delete();
            $match->delete();
        });

        $team->players()->update(['team_id' => null]);

        $team->delete();

        return back()->with('success', 'Team Deleted');
    }

}
