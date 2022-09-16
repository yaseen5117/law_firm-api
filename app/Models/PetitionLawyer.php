<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionLawyer extends Model
{
    use HasFactory;

    protected $fillable = ['petition_id', 'lawyer_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }
}
