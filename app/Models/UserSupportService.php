<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSupportService extends Model
{
    use HasFactory;
    
    protected $table ='user_services';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function SupportService()
    {
        return $this->belongsTo(SupportService::class, 'service_id');
    }

}
