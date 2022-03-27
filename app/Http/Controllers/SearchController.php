<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smith;
use App\Services\HelperService;
use Exception;
use view;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, HelperService $helperService)
    {

        try {
            if($request->smith){
                if($smith = Smith::where('name', 'LIKE', '%' . $request->smith . '%')->first()){
                    $slug = $helperService->createSlug($smith->name);
                    $smith->slug = $slug;
                    $smith->save();
                    return redirect()->route('showsmith', ['slug' => $slug]);
                } else {
                    $data = '';
                }
            }

            $data = '';

            return view('search.index', ['data' => $data]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
}
