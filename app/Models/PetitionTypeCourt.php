<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionTypeCourt extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = [];

    public function petition_type()
    {
        return $this->belongsTo(PetitionType::class);
    }
    public function court()
    {
        return $this->belongsTo(Court::class, 'court_id');
    }
}
