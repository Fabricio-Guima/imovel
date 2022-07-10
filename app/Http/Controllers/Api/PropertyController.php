<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
    }

    public function show()
    {
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
