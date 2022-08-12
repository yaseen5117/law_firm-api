<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'paid_date'  => 'date:d/m/Y',
    ];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('display_order');
    }
}
