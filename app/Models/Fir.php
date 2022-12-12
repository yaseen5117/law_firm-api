<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FirStatus;
use App\Scopes\CompanyScope;

class Fir extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function status()
    {
        return $this->belongsTo(FirStatus::class, 'fir_status_id', 'id');
    }
    public function statute()
    {
        return $this->belongsTo(Statute::class, 'statute_id', 'id');
    }
    public function court()
    {
        return $this->belongsTo('App\Models\Court', 'court_id', 'id');
    }
}
