<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smith;
use App\Services\SmithService;
use App\Services\HelperService;
use view;
use Cache;

class SmithController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function index(SmithService $smithService, HelperService $helperService)
    {
        //$data = $smithService->indexCache('index_smiths', 3600);
        $data = Smith::where('name', '<>', NULL)->orderBy('view_count', 'DESC')->paginate(20);
        $smithService->generateSlugs($helperService);

        return view('smith.index', ['data' => $data]);
    }


    /**
     * Display a single instance of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function show(string $slug){
        $smith = Smith::where('slug', $slug)->first();//->with('swords')->first();
        $smith->view_count += 1;
        $smith->save();
        return view('smith.show', ['data' => $smith]);
    }
}
