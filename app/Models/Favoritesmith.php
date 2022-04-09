<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritesmith extends Model
{
    use HasFactory;

    protected $table = 'favoritesmiths';

    public function smith()
    {
        return $this->hasOne(Smith::class, 'id', 'smith_id');
    }

}
