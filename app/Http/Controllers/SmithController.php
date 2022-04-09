<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smith;
use App\Models\Favoritesmith;
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
        $data = Smith::where('name', '<>', NULL)->with('swords')->orderBy('view_count', 'DESC')->paginate(20);
        $smithService->generateSlugs($helperService);

        return view('smith.index', ['data' => $data]);
    }


    /**
     * Display a single instance of the resource.
     *
     * @return \Illuminate\Http\View
     */
    public function show(string $slug, SmithService $smithService)
    {
        $smith = Smith::where('slug', $slug)->with('swords')->first();//->with('swords')->first();
        $smith->view_count += 1;
        $smith->save();
        //$smithService->addOrGetCache('show_smiths', 3600, $smith);

        return view('smith.show', ['data' => $smith]);
    }

    /**
     * Display a single listing of the favorites resource.
     *
     * @return \Illuminate\Http\View
     */
    public function favorites()
    {
        $smiths = Favoritesmith::where('user_id', auth()->user()->id)->with('smith')->orderBy('created_at', 'DESC')->get();
        //dd($smiths);
        return view('smith.favorites', ['data' => $smiths]);
    }

    public function removeFavorite(int $id){
        $smithfav = Favoritesmith::where('user_id', auth()->user()->id)->where('smith_id', $id)->first();
        $smith = Smith::where('id', $id)->first('name');
        $smithfav->delete();
        toast()->success('Smith('. $smith->name .') removed from favorites!')->pushOnNextPage();
        unset($smith);
        unset($smithfav);
        return redirect()->route('favoritesmiths');
    }

    public function addFavorite(int $id)
    {
        $checkFav = Favoritesmith::where('user_id', auth()->user()->id)->where('smith_id', $id)->first();
        $smithdata = Smith::where('id', $id)->first('name');
        if(!$checkFav){
            $smith = new Favoritesmith;
            $smith->smith_id = $id;
            $smith->user_id = auth()->user()->id;
            $smith->save;
            toast()->success('Smith('. $smithdata->name .') added to favorites!')->pushOnNextPage();
        } else {
            toast()->warning('Smith('. $smithdata->name .') already in favorite list!')->pushOnNextPage();
        }

        return redirect()->route('indexsmiths');
    }

}
