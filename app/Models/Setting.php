<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;
use App\Scopes\CompanyScope;

class Setting extends Model
{
    use HasFactory;
    use Metable;
    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->company_id = request()->user()->company_id;
            $model->save();
        });
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('id', 'desc');
    }
}
