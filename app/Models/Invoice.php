<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $appends = ['pdf_download_url'];
    protected $casts = [
        'created_at'  => 'date:d/m/Y',
        'due_date'  => 'date:d/m/Y',
        'paid_date'  => 'date:d/m/Y',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\InvoiceStatus', 'invoice_status_id');
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->orderBy('id', 'desc');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\User', 'invoiceable_id');
    }
    public function invoice_meta()
    {
        return $this->hasOne('App\Models\InvoiceMeta');
    }
    public function invoice_expenses()
    {
        return $this->hasMany('App\Models\InvoiceExpense');
    }
    public function total()
    {
        $tax_amount = 0;
        $amount = $this->amount;
        if ($this->apply_tax && $this->tax_percentage > 0) {
            $tax_amount = ($amount * $this->tax_percentage) / 100;
        }
        return $total = $amount + $this->invoice_expenses->sum('amount') - $tax_amount;
    }
    public function getPdfDownloadUrlAttribute()
    {
        return url("download_invoice_pdf/" . +$this->id);
    }
}
