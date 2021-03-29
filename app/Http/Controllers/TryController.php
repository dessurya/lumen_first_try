<?php

namespace App\Http\Controllers;

class TryController extends Controller
{
    public function index()
    {
        return response()->json([
            'auth' => auth()->user(),
            'message' => 'tanpa middleware'
        ]);
    }

    public function try()
    {
        return response()->json([
            'auth' => auth()->user(),
            'message' => 'dengan middleware'
        ]);
    }
}
