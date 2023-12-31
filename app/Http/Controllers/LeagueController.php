<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Models\League;
use http\Env\Request;
use Nette\Utils\DateTime;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('leagues.index', ['leagues' => League::latest()->filter(request(['search']))
                ->with(['teams', 'matches'])
                ->orderBy('name')
                ->paginate(5)->withQueryString()
            ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        return view('leagues.show', ['league' => $league]);
    }

}
