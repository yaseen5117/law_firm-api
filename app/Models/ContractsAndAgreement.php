<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractsAndAgreement extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['plain_content'];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('display_order');
    }
    public function category()
    {
        return $this->belongsTo(ContractCategory::class, 'contract_category_id');
    }

    public function getPlainContentAttribute()
    {
        return strip_tags($this->content);
    }
}
