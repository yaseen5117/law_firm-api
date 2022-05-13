<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'created_at'  => 'date:d/m/Y',
        'due_date'  => 'date:d/m/Y',        
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\User','invoiceable_id');
    }
    public function invoice_meta()
    {
        return $this->hasOne('App\Models\InvoiceMeta');
    }
    public function invoice_expenses()
    {
        return $this->hasMany('App\Models\InvoiceExpense');
    }
}
