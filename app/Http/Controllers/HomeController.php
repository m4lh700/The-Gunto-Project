<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smith;
use App\Models\Favoritesmith;
use view;

class HomeController extends Controller
{
    public function index() : object
    {
        if(auth()->user()){
            $favoriteSmiths = Favoritesmith::where('user_id', auth()->user()->id)->get();
        } else {
            $favoriteSmiths = NULL;
        }

        return view('home', ['favoritesmiths' => $favoriteSmiths]);
    }
}
