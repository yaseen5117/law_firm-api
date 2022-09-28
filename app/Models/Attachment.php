<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CompanyScope;

class Attachment extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    protected static function booted()
    {
        //static::addGlobalScope(new CompanyScope);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            //$model->company_id = request()->user()->company_id;
            //$model->save();
        });
    }

    public function attachmentable()
    {
        return $this->morphTo();
    }
}
