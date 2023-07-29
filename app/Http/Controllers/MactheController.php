<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatcheRequest;
use App\Http\Requests\UpdateMatcheRequest;
use App\Models\Matche;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MactheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('matches.index', ['matches' => Matche::with(['homeTeam','awayTeam','league','score'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatcheRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Matche $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matche $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatcheRequest $request, Matche $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matche $match)
    {
        //
    }

    public function matchesByDate(Request $request, $date)
    {
        $matches = Matche::whereDate('date', $date)->with('league', 'homeTeam', 'awayTeam', 'score')->orderBy('date')->get();
        return view('matches.index', ['matches' => $matches]);
    }
}
