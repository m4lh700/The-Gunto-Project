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
}
