<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FirStatus;

class FirStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    
}
