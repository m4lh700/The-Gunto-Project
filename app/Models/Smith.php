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
      return $this->hasMany(Sword::class, 'smith_id', 'id')->orderBy('id', 'DESC');
    }

    //Scopes
    public function scopeGetIndexSmiths($query){
      $query->where('name', '<>', NULL)->with('swords')->orderBy('view_count', 'DESC');
    }

    public function scopeGetByID($query, int $id){
      $query->where('id', $id);
    }

}
