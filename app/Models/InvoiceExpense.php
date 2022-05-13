<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceExpense extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_id','expense','amount'];

    public function invoice_expenses()
    {
        return $this->hasMany('App\Models\InvoiceExpense');
    }
    public function total()
    {
        $tax_amount = 0;
        $amount = $this->amount;
        if ($this->apply_tax && $this->tax_percentage>0) {
            $tax_amount = ($amount * $this->tax_percentage)/100;
        }
        return $total = $amount + $invoice_expenses->sum('amount') - $tax_amount;
    }
}
