<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function favourites()
    {
        return $this->belongsTo(Favourite::class,);
    }  
}
