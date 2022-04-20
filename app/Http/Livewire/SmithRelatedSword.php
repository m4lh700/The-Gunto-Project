<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sword;

class SmithRelatedSword extends Component
{

    public $sword;

    public function showSword(int $id)
    {
        $sword = Sword::where('id', $id)->first();
        return view('livewire.smith-related-sword-single', ['data' => $sword]);
    }

    public function render()
    {
        return view('livewire.smith-related-sword');
    }
}
