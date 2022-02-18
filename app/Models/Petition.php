<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Petition extends Model
{
    use HasFactory;
	use SoftDeletes;

    protected $guarded=[];
    protected $appends=['petitioner_names'];
    protected $dates = ['deleted_at'];

    public function court()
    {
        return $this->belongsTo('App\Models\Court','court_id','id');
    }

    public function case_status()
    {
        return $this->belongsTo('App\Models\PetitionStatus','status','id');
    }

    public function petitioners()
    {
        //return $this->belongsTo('App\Models\User','petitioner_id','id');
        return $this->hasMany('App\Models\PetitionPetitioner');
    }

    public function petition_type()
    {
        return $this->belongsTo('App\Models\PetitionType','petition_type_id','id');
    }
    
    public function petition_judges()
    {
        return $this->hasMany('App\Models\PetitionJudge','petition_id','id');
    }

    public function petition_lawyers()
    {
        return $this->hasMany('App\Models\PetitionLawyer','petition_id','id');
    }
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function scopeWithRelations($query)
    {
        return $query->with('petitioners.user','court');
    }

    public function getPetitionerNamesAttribute()
    {
        $str="";
        foreach ($this->petitioners as $petitioner) {
            $str .= @$petitioner->user->name.", ";
        }

        return rtrim($str,", ");


    }
}
