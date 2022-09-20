<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\CompanyScope;

class Court extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */

    protected static function booted()
    {
        //static::addGlobalScope(new CompanyScope);
    }
    public function petition_type()
    {
        return $this->belongsTo(PetitionType::class);
    }
}
