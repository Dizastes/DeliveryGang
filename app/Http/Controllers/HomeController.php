<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class HomeController extends Controller
{
    public function getData(Request $request)
    {
    	$foods = Food::all();
    	return view('home', ['items' => $foods]);
    }
}
