<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use App\Models\Location;
use App\Models\OperatingSystem;
use App\Models\Role;
use Illuminate\Http\Request;

class ApiActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $activity = Activity::with(['location', 'role', 'operatingSystem'])->get();

        return response()->json($activity);
    }

    public function create()
    {
        $locations = Location::all();
        $roles = Role::all();
        $operating_systems = OperatingSystem::all();

        return response()->json($locations, $roles, $operating_systems);
    }

    public function store(ActivityRequest $request)
    {
        $activity = auth()->user()->activities()->create([
            'user_id' => auth()->user()->id,
            'location_id' => $request->location,
            'role_id' => $request->role,
            'operating_system_id' => $request->operating_system,
            'name' => $request->name,
            'spent_time' => $request->spent_time,
            'date' => $request->date,
        ]);

        return response()->json($activity);
    }

}
