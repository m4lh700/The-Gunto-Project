<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smith;
use App\Services\HelperService;
use Exception;
use view;
use Illuminate\Support\Facades\Log;

/**
 * SearchController
 */
class SearchController extends Controller
{
    /**
     * Index for search(/search) request
     *
     * @param Request $request
     * @param HelperService $helperService
     *
     * @return \Illuminate\Http\View
     * @throws Exception If error occurs
     */
    public function index(Request $request, HelperService $helperService) : object
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

            return view('search.index', ['data' => $data, 'metatitle' => NULL, 'metadescription' => NULL]);
        } catch (Exception $e) {
            Log::critical($e->getMessage()); //Send to Slack
        }
    }
}
