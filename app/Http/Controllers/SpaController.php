<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function spa()
    {
    	return view('spa');
    }
}
