<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sword extends Model
{
    use HasFactory;

    protected $table = 'swords';
    protected $fillable = ['smith_id', 'active', 'description', 'sword_type', 'user_id'];

    public function smith()
    {
        return $this->hasOne(Smith::class, 'id', 'smith_id');
    }

}
