<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLeagueController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\AdminMatchController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\MactheController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth', 'adminOnly']], function () {
    Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin_dashboard');

    Route::get('/admin_dashboard/leagues', [AdminController::class, 'leagues'])->name('admin.leagues');
    Route::get('/admin_dashboard/teams', [AdminController::class, 'teams'])->name('admin.teams');
    Route::get('/admin_dashboard/matches', [AdminController::class, 'matches'])->name('admin.matches');
    Route::get('/admin_dashboard/users', [AdminController::class, 'users'])->name('admin.users');

    /*League Management*/
    Route::get('/admin_dashboard/leagues/create', [AdminLeagueController::class, 'create'])->name('league.create');
    Route::post('/admin_dashboard/leagues', [AdminLeagueController::class, 'store'])->name('league.store');
    Route::get('/admin_dashboard/leagues/{league:slug}/edit', [AdminLeagueController::class, 'edit'])->name('league.edit');
    Route::patch('/admin_dashboard/leagues/{league}', [AdminLeagueController::class, 'update'])->name('league.update');
    Route::delete('/admin_dashboard/leagues/{league}', [AdminLeagueController::class, 'destroy'])->name('league-destroy');

    /*Team Management*/
    Route::get('/admin_dashboard/teams/create', [AdminTeamController::class, 'create'])->name('team.create');
    Route::post('/admin_dashboard/teams', [AdminTeamController::class, 'store'])->name('team.store');
    Route::get('/admin_dashboard/teams/{team:slug}/edit', [AdminTeamController::class, 'edit'])->name('team.edit');
    Route::patch('/admin_dashboard/teams/{team}', [AdminTeamController::class, 'update'])->name('team.update');
    Route::delete('/admin_dashboard/teams/{team}', [AdminTeamController::class, 'destroy'])->name('team-destroy');

    /*Match Management*/
    Route::get('/admin_dashboard/matches/create', [AdminMatchController::class, 'create'])->name('match.create');
    Route::get('/admin_dashboard/matches/create/next', [AdminMatchController::class, 'createNext'])->name('match.createNext');
    Route::post('/admin_dashboard/matches', [AdminMatchController::class, 'store'])->name('match.store');
    Route::get('/admin_dashboard/matches/edit/{matche}', [AdminMatchController::class, 'edit'])->name('match.edit');
    Route::patch('/admin_dashboard/matches/{matche}', [AdminMatchController::class, 'update'])->name('match.update');
    Route::delete('/admin_dashboard/matches/{matche}', [AdminMatchController::class, 'destroy'])->name('match-destroy');


    /*User Management*/
    Route::get('/admin_dashboard/users/create', [AdminUserController::class, 'create'])->name('user.create');
    Route::post('/admin_dashboard/users', [AdminUserController::class, 'store'])->name('user.store');
    Route::get('/admin_dashboard/users/{user:username}/edit', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::patch('/admin_dashboard/users/{user:username}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/admin_dashboard/users/{user:username}', [AdminUserController::class, 'destroy'])->name('user-destroy');

});


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/leagues', [LeagueController::class, 'index'])->name('leagues');
    Route::get('/teams', [TeamController::class, 'index'])->name('teams');
    Route::get('/matches/{matche:date}', [MactheController::class, 'matchesByDate'])->name('matches');

    Route::get('/leagues/{league:slug}', [LeagueController::class, 'show'])->name('league');
    Route::get('/teams/{team:slug}', [TeamController::class, 'show'])->name('team');
    Route::get('/player/{user:username}', [UserController::class, 'show'])->name('player');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
