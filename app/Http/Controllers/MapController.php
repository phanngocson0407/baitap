<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showMap()
    {
        //hello
        return view('map');
    }
}
