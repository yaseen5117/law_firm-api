<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'issuance_date'  => 'date:d/m/Y',        
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'client_id');
    }     
}
