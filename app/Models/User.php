<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['is_admin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'created_at_formated_date','is_admin'
    ];

    public function getCreatedAtFormatedDateAttribute()
    {
        //return to_date($this->created_at,1);
        return $this->created_at;
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    public function products()
    {
        return $this->hasMany(UserProduct::class,"user_id");
    }
    public function servers()
    {
        return $this->morphMany(Serverable::class,'serverable');
        //return $this->hasMany(Serverable::class,"user_id");
    }
    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }
    public function contacts()
    {
        return $this->hasMany(Contact::class,"user_id");
    }
    public function supportServices()
    {
        return $this->hasMany(UserSupportService::class,"user_id");
    }
    public function notes()
    {
        return $this->hasMany(Note::class,"user_id");
    }

    public function getIsAdminAttribute()
    {
        return $this->hasRole(['admin']);
    }

}
