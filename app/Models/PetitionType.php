<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionType extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = "petition_types";

    public function petition_type_courts()
    {
        return $this->hasMany(PetitionTypeCourt::class);
    }
    public function courts()
    {
        return $this->hasMany(Court::class);
    }
}
