<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory;    
    use SoftDeletes;
    protected $guarded = [];
    public function provinces()
    {
        return $this->hasMany(Province::class );
    }
}
