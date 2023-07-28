<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matche;

class AdminMatchController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = $request->input();

        $originalDate = $attributes['founded_at'];
        $dateObj = DateTime::createFromFormat('m/d/Y', $originalDate);
        $date= $dateObj->format('Y-m-d');

        $attributes['slug'] = str_replace(' ', '-', $attributes['name']);
        $attributes['founded_at'] = $date;
        $attributes['logo'] = $request->file('logo')->store('matches-logos');


        Matche::create($attributes);
        return redirect('/admin_dashboard/matches')->with('success','New Matche has been created.');

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
