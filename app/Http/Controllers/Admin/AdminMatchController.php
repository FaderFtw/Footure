<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Models\League;
use App\Models\Matche;
use DateTime;

class AdminMatchController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matches.create');
    }

    public function createNext()
    {
        request()->validate(['league_id' => 'required']);
        return view('matches.createNext', ['league' =>League::with(['teams'])->find(request()->input('league_id'))]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatchRequest $request)
    {
        $attributes = $request->validated();
        unset($attributes['dateOnly']);
        unset($attributes['time']);

        $date= date('Y-m-d H:i', strtotime($attributes['date']));

        $attributes['date']= $date;

        Matche::create($attributes);

        return redirect('/admin_dashboard/matches')->with('success','New Match has been created.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matche $match)
    {
        return view('matches.edit', ['match' => $match::with(['score'])]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Matche $match)
    {
        $attributes = $request->input();

        $match->update($attributes);

        return redirect(route('admin.matches'))->with('success', 'Match Updated');
    }

    /**
     * Remove the specified resource from storage .
     */
    public function destroy(Matche $matche)
    {
        $matche->score()->delete();
        $matche->delete();

        return back()->with('success', 'Match Deleted');
    }

}
