<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo('App\Models\User','invoiceable_id');
    }
    public function invoice_meta()
    {
        return $this->hasOne('App\Models\InvoiceMeta');
    }
}
