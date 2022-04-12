<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /*protected $fillable = [
        'name',
        'email',
        'password',
    ];*/

    protected $guarded=[];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }     
    public function favourites()
    {
        return $this->hasMany(Favourite::class,);
    }  
    public function likes(){
        return $this->hasMany(Favourite::class, 'item_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class,);
    }
    # Use this to count the likes
    public function getLikeCountAttribute(){
        return $this->likes->count();
    }

    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    } 
    public function province()
    {
        return $this->belongsTo(City::class , 'province_id');
    } 
    public function region()
    {
        return $this->belongsTo(City::class , 'region_id');
    } 
    public function race()
    {
        return $this->belongsTo(DogType::class , 'race_type_id');
    }
    public function loveCount()
    {
        return $this->belongsTo(Favourite::class , 'item_id');
    } 
    public function moreLove()
    {
        
    }
    public function scopeWithRelations($query)
    {
        return $query->with('favourites');
    }
}
