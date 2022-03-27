<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smith extends Model
{
    use HasFactory;

    protected $table = 'smiths';

    public function swords()
    {
      return $this->hasMany(Sword::class, 'smith_id', 'id');
    }

}
