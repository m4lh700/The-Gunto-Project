<?php

namespace App\Services;
use App\Models\Smith;
use App\Services\HelperService;
use Cache;

/**
 * [Description SmithService]
 */
class SmithService
{

  public function generateSlugs(HelperService $helperService)
  {
    $smiths = Smith::where('slug', NULL)->get();

    foreach($smiths as $smith){
        $smith = Smith::find($smith->id);
        $smith->slug = $helperService->createSlug($smith->name);
        $smith->save();
    }

    return;
  }


  public function indexCache(string $key, int $duration)
  {
    if(Cache::has('index_smiths')){
        return $data = Cache::get('index_smiths');
    } else {
        $data = Smith::where('name', '<>', NULL)->orderBy('view_count', 'DESC')->get();//with('swords')->get();
        Cache::add($key, $data, $seconds = $duration);
        return Cache::get($key);
    }
  }

  public function addOrGetCache(string $key, int $duration, object $data)
  {
    if(Cache::has($key)){
        return $data = Cache::get($key);
    } else {
        Cache::add($key, $data, $seconds = $duration);
        return Cache::get($key);
    }
  }


}
