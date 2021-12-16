<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Petition extends Model
{
    use HasFactory;
	use SoftDeletes;

    protected $guarded=[];
    protected $dates = ['deleted_at'];

    public function court()
    {
        return $this->belongsTo('App\Models\Court','court_id','id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\User','client_id','id');
    }
}
