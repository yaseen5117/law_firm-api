<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitonOrderSheet extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'order_sheet_date'  => 'date:d/m/Y',
        'next_hearing_date'  => 'date:d/m/Y',
    ];


    public function petition()
    {
        return $this->belongsTo('App\Models\Petition');
    }
    public function order_sheet_types()
    {
        return $this->belongsTo(PetitionModuleType::class, "order_sheet_type_id");
    }
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->orderBy('display_order');
    }
}
