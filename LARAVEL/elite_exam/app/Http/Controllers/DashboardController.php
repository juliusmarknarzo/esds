<?php

namespace App\Http\Controllers;

use App\Models\Artists;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        return view('dashboard');
    }
}