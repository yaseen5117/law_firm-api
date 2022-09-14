<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCaseLaw extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['plain_content'];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('id', 'desc');
    }
    public function getPlainContentAttribute()
    {
        return strip_tags($this->content);
    }
}
