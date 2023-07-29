<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Team;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user )
    {
        if ($user->role == User::PLAYER)  return view('players.show', ['player' => $user   ]);
        else abort(Response::HTTP_NOT_FOUND);
    }

}
