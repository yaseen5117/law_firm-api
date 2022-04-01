<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionReply extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts = [
        'date'  => 'date:d/m/Y',        
    ];
    
    public function petition_reply_parent()
    {
        return $this->belongsTo('App\Models\PetitionReplyParent');

    }
    
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->orderBy('display_order');

    }
}
