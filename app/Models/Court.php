<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function petition_type()
    {
        return $this->belongsTo(PetitionType::class);
    }
}
