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

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }

    public static function boot()
    {
        
        self::created(function($model){
            $model->update([
                'company_id'=>request()->user()->company_id
            ]);
            
        });
    }


}
