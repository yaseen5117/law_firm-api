<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadContactDetail extends Model
{
    use HasFactory;

    protected $table = 'leads_contact_details';
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function leadProducts()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
