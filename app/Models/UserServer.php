<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserServer extends Model
{
    use HasFactory;
    protected $guarded = ['user_servers'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
