<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionMeta extends Model
{
    use HasFactory;
    protected $table = 'petition_meta';
    protected $guarded = [];
    protected $casts = [
        'date'  => 'date:d/m/Y',
    ];

    public function petition()
    {
        return $this->belongsTo('App\Models\Petition');
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->orderBy('display_order');
    }
}
