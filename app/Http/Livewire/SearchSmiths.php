<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Smith;

class SearchSmiths extends Component
{
    public $smith;
    public $searchResults;

    public function render()
    {
        if( strlen($this->smith) > 2 ) {
            $this->searchResults = Smith::select('name', 'id', 'view_count', 'stars')->where('name', 'LIKE', '%' . $this->smith . '%')->where('name', '!=', $this->smith)->with('swords')->orderBy('view_count', 'DESC')->get();
        }

        return view('livewire.search-smiths', ['searchresults' => $this->searchResults]);
    }


    public function selectOption($name){
        $this->smith = $name;
    }
}
