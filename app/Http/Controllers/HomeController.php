<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use view;

class HomeController extends Controller
{
    public function index() : object
    {
        return view('home');
    }
}
