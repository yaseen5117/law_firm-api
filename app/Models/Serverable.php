<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serverable extends Model
{

    protected $guarded = [];
    use HasFactory;


    public function server()
    {
        return $this->belongsTo(Server::class);
        //return $this->hasMany(Serverable::class,"user_id");
    }
}
