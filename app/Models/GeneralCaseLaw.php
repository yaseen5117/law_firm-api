<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCaseLaw extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('id', 'desc');
    }
}
