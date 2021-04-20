<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponseTrait;

class TryController extends Controller
{
    use HttpResponseTrait;
    
    public function index()
    {
        return $this->resSuccess('index response');
    }

    public function success()
    {
        return $this->resSuccess('success response',['auth' => auth()->user()]);
    }

    public function fail()
    {
        return $this->resFail('fail response');
    }

    public function try()
    {
        return response()->json([
            'auth' => auth()->user(),
            'message' => 'dengan middleware'
        ]);
    }
}
