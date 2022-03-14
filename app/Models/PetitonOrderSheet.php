<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitonOrderSheet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function petition()
    {
        return $this->belongsTo('App\Models\Petition');

    }
    
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->orderBy('display_order');

    }
}
