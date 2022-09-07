<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetitionHearing extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function petition()
    {
        return $this->belongsTo('App\Models\Petition');
    }
}
