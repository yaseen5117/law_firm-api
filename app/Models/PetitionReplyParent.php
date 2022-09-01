<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionReplyParent extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function petition_replies()
    {
        return $this->hasMany('App\Models\PetitionReply', 'petition_reply_parent_id');
    }
    public function petition()
    {
        return $this->belongsTo('App\Models\Petition', 'petition_id');
    }
}
