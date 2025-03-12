<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboard.adminDashboard');
    }
    public function anggotaDashboard()
    {
        return view('dashboard.anggotaDashboard');
    }
    public function userDashboard()
    {
        $stories = Status::all();
        return view('dashboard.userDashboard', compact('stories'));
    }
}