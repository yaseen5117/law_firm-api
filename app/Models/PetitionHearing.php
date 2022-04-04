<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionHearing extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function petition()
    {
        return $this->belongsTo('App\Models\Petition');

    }
}
