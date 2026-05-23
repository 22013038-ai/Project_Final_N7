<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();

        $totalUsers = User::count();

        $totalRegistrations = Registration::count();

        $latestEvents = Event::latest()
            ->take(5)
            ->get();

        $latestRegistrations = Registration::latest()
            ->take(5)
            ->get();

        return view(
            'dashboard.index',
            compact(
                'totalEvents',
                'totalUsers',
                'totalRegistrations',
                'latestEvents',
                'latestRegistrations'
            )
        );
    }
}