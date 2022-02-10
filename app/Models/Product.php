<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $guarded = [];
    public function productUser()
    {
        return $this->hasOne(UserProduct::class,"product_id");
    }

    public function productContactDetail()
    {
        return $this->hasMany(LeadContactDetail::class,"product_id");
    }

}
