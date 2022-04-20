<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smith;
use App\Models\Favoritesmith;
use App\Services\SmithService;
use App\Services\HelperService;
use view;
use Cache;
use Illuminate\Support\Facades\Log;

/**
 * SmithController
 */
class SmithController extends Controller
{
    /**
     * Index for Smiths(/smiths) request
     *
     * @param SmithService $smithService
     * @param HelperService $helperService
     *
     * @return \Illuminate\Http\View
     */
    public function index(SmithService $smithService, HelperService $helperService) : object
    {
        $data = Cache::remember('index_smiths' . request()->get('page'), 3600, function () {
            return Smith::where('name', '<>', NULL)->with('swords')->orderBy('view_count', 'DESC')->paginate(20);
        });

        $smithService->generateSlugs($helperService);

        return view('smith.index', ['data' => $data, 'metatitle' => NULL, 'metadescription' => NULL]);
    }

    /**
     * Show specific Smith based on slug (/smiths/{slug})
     *
     * @param string $slug
     * @param SmithService $smithService
     *
     * @return \Illuminate\Http\View
     */
    public function show(string $slug, SmithService $smithService) : object
    {
        $smith = Smith::where('slug', $slug)->with('swords')->first();
        $smith->view_count += 1;
        $smith->save();
        $nextSmith = Smith::where('id', $smith->id + 1)->first('slug');
        $previousSmith = Smith::where('id', $smith->id - 1)->first('slug');
        $previousSmith ? $prev = $previousSmith->slug : $prev = NULL;

        return view('smith.show', ['data' => $smith, 'nextsmith' => $nextSmith->slug, 'previoussmith' => $prev, 'metatitle' => $smith->name, 'metadescription' => NULL]);
    }

    /**
     * Show favorites list(/smiths/favarites), only if user is logged in(middleware)
     *
     * @return \Illuminate\Http\View
     */
    public function favorites() : object
    {
        $smiths = Favoritesmith::where('user_id', auth()->user()->id)->with('smith')->orderBy('created_at', 'DESC')->get();

        return view('smith.favorites', ['data' => $smiths, 'metatitle' => NULL, 'metadescription' => NULL]);
    }

    /**
     * Remove specific smith(/smiths/favorites/remove/{id}) from favorites for this user
     *
     * @param int $id
     *
     * @return object
     */
    public function removeFavorite(int $id) : object
    {
        try {
            $smithfav = Favoritesmith::where('user_id', auth()->user()->id)->where('smith_id', $id)->first();
            $smith = Smith::where('id', $id)->first('name');
            $smithfav->delete();
        } catch (Exception $e) {
            Log::critical($e->getMessage());
        }

        toast()->success('Smith('. $smith->name .') removed from favorites!')->pushOnNextPage();
        return redirect()->route('favoritesmiths');
    }

    /**
     * @param int $id
     *
     * @return object
     */
    public function addFavorite(int $id) : object
    {
        $checkFav = Favoritesmith::where('user_id', auth()->user()->id)->where('smith_id', $id)->first();
        $smithdata = Smith::where('id', $id)->first('name');

        if(is_null($checkFav)){
            $smith = new Favoritesmith;
            $smith->smith_id = $id;
            $smith->user_id = auth()->user()->id;
            $smith->save();
            toast()->success('Smith('. $smithdata->name .') added to favorites!')->pushOnNextPage();
        } else {
            toast()->warning('Smith('. $smithdata->name .') already in favorite list!')->pushOnNextPage();
        }

        return redirect()->back();
    }

}
