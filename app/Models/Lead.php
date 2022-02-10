<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table="leads";
    protected $guarded = [];

    public function contactDetails()
    {
        return $this->hasMany(LeadContactDetail::class,"lead_id");
    }
    
}
