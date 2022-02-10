<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $table = 'servers';
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime:m/d/Y h:i A',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function userServer()
    {
        return $this->hasOne(UserServer::class,"server_id");
    }
}
