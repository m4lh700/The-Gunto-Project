<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Smith;
use App\Models\Sword;
use Exception;
use view;
use Input;

/**
 * [Description SwordController]
 */
class SwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : object
    {
      $data = Sword::all();
      return view('sword.index', ['data' => $data]);
    }

    /**
     * @param integer $id
     *
     * @return [type]
     */
    public function show(?string $slug ,?int $id) : object
    {
      $data = Sword::where('id', $id)->first();
      $smith = Smith::where('id', $data->smith_id)->first();
      return view('sword.show', ['data' => $data, 'smith' => $smith]);
    }

    /**
     * @param string $slug
     *
     * @return [type]
     */
    public function submitSword(string $slug = NULL) : object
    {
      $slug ? $data = Smith::where('slug', $slug)->first() : $data = NULL;
      return view('sword.submit', ['data' => $data, 'metatitle' => NULL, 'metadescription' => NULL]);
    }

    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function store(Request $request) : object
    {
      try {
        if($request->slug){
          $smith = Smith::where('slug', $request->slug)->first(['id']);
        } else {
          $smith = Smith::where('name', 'LIKE', '%'. $request->smith_id .'%')->first(['id']);
        }

        $validate = $request->validate([
          'description' => 'max:255',
          'sword_type' => 'required'
        ]);

        $sword = Sword::create([
          'smith_id'          => $smith ? $smith->id : NULL,
          'active'            => 1,
          'description'       => $validate['description'],
          'sword_type'        => $validate['sword_type'],
          'user_id'           => auth()->user()->id
        ]);
        //Make new dashboard message for ppl the follow this smith
        toast()->success('Sword submitted, thank you!')->pushOnNextPage();
        return redirect()->route('dashboard');
      } catch (Exception $e) {
        Log::channel('slack')->warning('Form validation failed(sword submit)! :: '. $e->getMessage() );
        toast()->warning( $e->getMessage() )->pushOnNextPage();
        return redirect()->back()->withInput( $request->all() );
      }
    }

    public function mySwords()
    {
      $swords = Sword::where('user_id', auth()->user()->id)->with('smith')->get();
      return view('sword.index', ['data' => $swords]);
    }

}
