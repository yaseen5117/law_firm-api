<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FirStatus;

class Fir extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(FirStatus::class);
    }



}
