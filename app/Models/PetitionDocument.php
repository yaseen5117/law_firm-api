<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetitionDocument extends Model
{
	use SoftDeletes;

    protected $guarded=[];
    protected $dates = ['deleted_at'];
}
