<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smith;
use App\Models\Sword;
use Exception;
use view;

class SwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('swords.index', ['data' => $data]);
    }

    public function submitSword(string $slug = NULL)
    {
      $slug ? $data = Smith::where('slug', $slug) : $data = NULL;
      return view('sword.submit', ['data' => $data, 'metatitle' => NULL, 'metadescription' => NULL]);
    }

}
