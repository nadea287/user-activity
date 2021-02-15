<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function createToken(Request $request)
    {
        $token = $request->user()->createToken('authToken');

        return ['token' => $token->plainTextToken];
    }
}
