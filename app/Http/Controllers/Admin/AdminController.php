<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_dashboard');
    }

    public function leagues()
    {
        return view('admin.manage-leagues');
    }

    public function teams()
    {
        return view('admin.manage-teams');
    }

    public function matches()
    {
        return view('admin.manage-matches');
    }
    public function users()
    {
        return view('admin.manage-users');
    }

}
