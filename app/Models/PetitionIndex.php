<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionIndex extends Model
{
    use HasFactory;

    protected $guarded=[];     

    public function petition()
    {
        return $this->belongsTo('App\Models\Petition');

    protected $guarded=[];   
    
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');

    }
}
