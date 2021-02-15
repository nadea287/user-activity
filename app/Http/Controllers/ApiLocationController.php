<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class ApiLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $locations = Location::all();
        return response()->json($locations);
    }

    public function create()
    {
        //
    }

    public function store(CreateLocationRequest $request)
    {
        $location = Location::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return response()->json($location);
    }

    public function show(Location $location)
    {
        return response()->json($location);
    }

    public function edit(Location $location)
    {
        return response()->json($location);
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $data = $request->validated();
        $updated_location = $location->update($data);
        return response()->json($updated_location);
    }

    public function destroy(Location $location)
    {
        $location->delete();
    }
}
