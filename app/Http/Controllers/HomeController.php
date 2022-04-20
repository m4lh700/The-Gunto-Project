<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use view;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\View
     * @ToDo make meta title and description dynamic
     */
    public function index() : object
    {
        return view('home', ['metatitle' => NULL, 'metadescription' => NULL]);
    }
}
