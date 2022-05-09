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
    protected $appends=['petitioner_names','opponent_names'];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'institution_date'  => 'date:d/m/Y',        
    ];
    public function court()
    {
        return $this->belongsTo('App\Models\Court','court_id','id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\PetitionType','petition_type_id','id');
    }
    public function lawyers()
    {
        return $this->hasMany('App\Models\PetitionLawyer');
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

    public function opponents()
    {
        return $this->hasMany('App\Models\PetitionOpponent');
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
        return $this->morphMany(Attachment::class, 'attachmentable')->orderBy('display_order');
    }

    public function scopeWithRelations($query)
    {
        return $query->with('petitioners.user','opponents.user','court','lawyers','type');
    }

    public function getPetitionerNamesAttribute()
    {
        $str="";
        foreach ($this->petitioners as $petitioner) {
            $str .= @$petitioner->user->name.", ";
        }
        return rtrim($str,", ");
    }    

    public function getOpponentNamesAttribute()
    {
        $str="";
        foreach ($this->opponents as $opponent) {
            $str .= @$opponent->user->name.", ";
        }
        return rtrim($str,", ");
    }
    // public function getLawyerNamesAttribute()
    // {
    //     $str="";
    //     foreach ($this->lawyers as $lawyer) {
    //         $str .= @$lawyer->user->name.", ";
    //     }
    //     return rtrim($str,", ");
    // }

    public function petition_replies_parents()
    {
        return $this->hasMany('App\Models\PetitionReplyParent','petition_id');
    }
}
