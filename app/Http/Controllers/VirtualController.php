<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VirtualController extends Controller
{
    public function index()
    {
        return view('virtual-tour');
    }
}
