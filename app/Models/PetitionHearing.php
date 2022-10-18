<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CompanyScope;

class PetitionHearing extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function petition()
    {
        return $this->belongsTo('App\Models\Petition');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'added_by');
    }
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
}
