<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Smith;
use App\Models\Favoritesmith AS FAV;
  use Illuminate\Database\Eloquent\Model;

class FavoriteSmith extends Component
{
    public $favorite;
    public $smith_id;
    public Model $model;

    public function favorite(int $smith_id)
    {
        $this->favorite = FAV::where('user_id', auth()->user()->id)->where('smith_id', $smith_id)->first();
        if(!$this->favorite){
            //Save fav
            $fav = new FAV;
            $fav->smith_id = $smith_id;
            $fav->user_id = auth()->user()->id;
            $fav->save();
            $this->emit('saved');
            $this->favorite = true;
        } else {
            $this->favorite->delete();
            $this->favorite = false;
        }

        return view('livewire.favorite-smith', ['favorite' => $this->favorite]);
    }



    public function render()
    {
        $this->favorite = FAV::where('user_id', auth()->user()->id)->where('smith_id', $this->smith_id)->first();
        return view('livewire.favorite-smith', ['favorite' => $this->favorite]);
    }
}
