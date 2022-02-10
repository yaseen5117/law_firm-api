<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportService extends Model
{
    use HasFactory;
    protected $table = 'support_services';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userService()
    {
        return $this->hasOne(UserSupportService::class,"service_id");
    }
}
