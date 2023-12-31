<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Models\League;
use Nette\Utils\DateTime;

class AdminLeagueController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leagues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeagueRequest $request)
    {
        $attributes = $request->input();

        $originalDate = $attributes['founded_at'];
        $dateObj = DateTime::createFromFormat('m/d/Y', $originalDate);
        $date= $dateObj->format('Y-m-d');

        $attributes['slug'] = str_replace(' ', '-', $attributes['name']);
        $attributes['founded_at'] = $date;
        $attributes['logo'] = $request->file('logo')->store('leagues-logos');


        League::create($attributes);
        return redirect('/admin_dashboard/leagues')->with('success','New League has been created.');

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
    public function destroy(League $league)
    {
        $league->matches()->each(function ($match) {
            $match->score()->delete();
            $match->delete();
        });

        $league->teams()->update(['league_id' => null]);

        $league->delete();

        return back()->with('success', 'League Deleted');
    }

}
