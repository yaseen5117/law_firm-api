<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class Setting extends Model
{
    use HasFactory;
    use Metable;
    protected $guarded = [];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('id','desc');

    }
}
