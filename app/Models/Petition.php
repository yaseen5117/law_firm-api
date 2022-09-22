<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\CompanyScope;

class Petition extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['type_abrivation', 'petition_standard_title', 'petition_standard_title_with_petitioner'];
    protected $appends = ['petitioner_names', 'opponent_names', 'type_abrivation', 'petition_standard_title', 'petition_standard_title_with_petitioner', 'pdf_download_url', 'index_total', 'order_sheet_total'];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'institution_date'  => 'date:d/m/Y',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */

    protected static function booted()
    {
        static::addGlobalScope(new CompanyScope);
    }


    public function court()
    {
        return $this->belongsTo('App\Models\Court', 'court_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\PetitionType', 'petition_type_id', 'id');
    }
    public function lawyers()
    {
        return $this->hasMany('App\Models\PetitionLawyer');
    }

    public function case_status()
    {
        return $this->belongsTo('App\Models\PetitionStatus', 'status', 'id');
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
        return $this->belongsTo('App\Models\PetitionType', 'petition_type_id', 'id');
    }

    public function petition_judges()
    {
        return $this->hasMany('App\Models\PetitionJudge', 'petition_id', 'id');
    }

    public function petition_lawyers()
    {
        return $this->hasMany('App\Models\PetitionLawyer', 'petition_id', 'id');
    }
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->orderBy('display_order');
    }

    public function scopeWithRelations($query)
    {
        return $query->with('petitioners.user', 'opponents.user', 'court', 'lawyers.user.attachment', 'type', 'petition_indexes.attachments');
    }
    public function scopeWithRelationsIndex($query)
    {
        return $query->with('court', 'type');
    }

    public function getPetitionerNamesAttribute()
    {
        $str = "";
        foreach ($this->petitioners as $petitioner) {
            $str .= @$petitioner->user->name . ", ";
        }
        return rtrim($str, ", ");
    }

    public function getOpponentNamesAttribute()
    {
        $str = "";
        foreach ($this->opponents as $opponent) {
            $str .= @$opponent->user->name . ", ";
        }
        return rtrim($str, ", ");
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
        return $this->hasMany('App\Models\PetitionReplyParent', 'petition_id');
    }

    public function getTypeAbrivationAttribute()
    {
        if ($this->type) {
            return $this->type->abbreviation;
        }
    }
    public function getIndexTotalAttribute()
    {
        return $this->hasMany('App\Models\PetitionIndex')->count();
    }
    public function getOrderSheetTotalAttribute()
    {
        return $this->hasMany('App\Models\PetitonOrderSheet')->count();
    }

    public function getPetitionStandardTitleAttribute()
    {
        return $this->type_abrivation . " " . $this->case_no . "/" . $this->year . " " . $this->title;
    }

    public function getPetitionStandardTitleWithPetitionerAttribute()
    {
        return $this->type_abrivation . " " . $this->case_no . "/" . $this->year . " " . $this->petitioner_names . " " . $this->title;
    }
    public function petition_indexes()
    {
        return $this->hasMany('App\Models\PetitionIndex');
    }
    public function getPdfDownloadUrlAttribute()
    {
        return url("download_petition_pdf/" . +$this->id);
    }
    public function petition_ordersheets()
    {
        return $this->hasMany('App\Models\PetitonOrderSheet');
    }
    public function petition_oral_arguments()
    {
        return $this->hasMany('App\Models\OralArgument');
    }
    public function petition_naqal_forms()
    {
        return $this->hasMany('App\Models\PetitionNaqalForm');
    }
    public function petition_talbanas()
    {
        return $this->hasMany('App\Models\PetitionTalbana');
    }
    public function case_laws()
    {
        return $this->hasMany('App\Models\CaseLaw');
    }
    public function extra_documents()
    {
        return $this->hasMany('App\Models\ExtraDocument');
    }
    public function petition_synopsis()
    {
        return $this->hasMany('App\Models\PetitionSynopsis');
    }
    public function petition_Judgements()
    {
        return $this->hasMany('App\Models\Judgement');
    }
}
