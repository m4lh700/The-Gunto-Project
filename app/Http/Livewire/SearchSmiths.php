<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Smith;

class SearchSmiths extends Component
{
    public $smith;
    public $searchResults = [];

    public function render()
    {
        if( strlen($this->smith) > 2 ) {
            $this->searchResults = Smith::select('name', 'id')->where('name', 'LIKE', '%' . $this->smith . '%')->where('name', '!=', $this->smith)->get();
        }

        return view('livewire.search-smiths', ['searchresults' => $this->searchResults]);
    }


    public function selectOption($name){
        $this->smith = $name;
    }
}
