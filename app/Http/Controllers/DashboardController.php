<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corousel;

class DashboardController extends Controller
{
    public function index()
    {	
    	$data['slides'] = Corousel::all();
     	return view('dashboard')->with($data);
    }
}
