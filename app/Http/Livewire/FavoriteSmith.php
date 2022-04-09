<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Smith;
use App\Models\Favoritesmith AS FAV;
use Illuminate\Database\Eloquent\Model;
use Usernotnull\Toast\Concerns\WireToast;

class FavoriteSmith extends Component
{
    use WireToast;
    public $favorite;
    public $smith_id;
    public Model $model;

    public function favorite(int $smith_id)
    {
        $this->favorite = FAV::where('user_id', auth()->user()->id)->where('smith_id', $smith_id)->first();
        $toast = toast();
        if(!$this->favorite){
            //Save fav
            $fav = new FAV;
            $fav->smith_id = $smith_id;
            $fav->user_id = auth()->user()->id;
            $fav->save();
            $this->emit('saved');
            $this->favorite = true;
            $message = 'Added to favorites!';
            $toast->success($message)->push();
        } else {
            $this->favorite->delete();
            $this->favorite = false;
            $message = 'Removed from favorites!';
            $toast->danger($message)->push();
        }
        return view('livewire.favorite-smith', ['favorite' => $this->favorite]);
    }

    public function render()
    {
        if(auth()->user()){
            $this->favorite = FAV::where('user_id', auth()->user()->id)->where('smith_id', $this->smith_id)->first();
        } else {
            $this->favorite = false;
        }

        return view('livewire.favorite-smith', ['favorite' => $this->favorite]);
    }
}
